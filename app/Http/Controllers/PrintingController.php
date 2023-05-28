<?php
 namespace App\Http\Controllers;

 use App\Models\Printing;
 use App\Models\Production;
 use App\Models\Pallet;

 use Illuminate\Http\Request;
 use Illuminate\Support\Str;
 use Illuminate\Support\Carbon;
use DateTime;


 use App\Http\Requests\StoreImpressionRequest;
 use App\Http\Requests\UpdateImpressionRequest;

 class PrintingController extends Controller
 {
     /**
      * Display a listing of the resource.
      */

     public function index()
     {
        $currentDate = now();

        $printings = Printing::latest()->paginate(5);
        return view('printings.index', compact('printings', 'currentDate'))
             ->with('i', (request()->input('page', 1) - 1) * 5);

            //  return view('printings.index', compact('printings', 'production' ,'currentDate'));

     }

     /**
      * Show the form for creating a new resource.
      */


    public function create(Production $production)
    {
        $currentDate = now()->toDateString();

        // return view('printings.create', compact('production'));
        $printing = new Printing();
        $user = auth()->user();

        return view('printings.create', compact('currentDate' ,'production','user'));

    }

     /**
      * Store a newly created resource in storage.
      */


public function store(Request $request)
{
    $validatedData = $request->validate([
        'production_id' => 'required|exists:productions,id',
        'quantite' => 'required|numeric',
        'date_inst' => 'required|date',
        'LOT' => 'required',

    ]);


    Printing::create($validatedData);
    $user = auth()->user();
    $date_inst = new DateTime($request->input('date_inst'));

    $production = Production::findOrFail($request->production_id);

    $printing = new Printing;
    $printing->production_id = $request->production_id;
    $printing->quantite = $request->quantite;
    $printing->date_inst = $request->date_inst;
    $printing->LOT = $request->LOT;
    $printing->user_id = $user->id; // Affecter l'ID de l'utilisateur courant au champ user_id

    $printing->save();
     // Créer les palettes à partir de l'impression
     for ($i = 1; $i <= $printing->quantite; $i++) {
        $pallet = new Pallet;
        $pallet->priting_id = $printing->id;
        $pallet->SSCC = 'SSCC' . Str::random(6); // Générer un NSSCC aléatoire

        $pallet->datefab = $printing->production->dateprod;
        // $pallet->DLC = $this->calculateDLC($printing->production->dateprod, $printing->production->product->DLU);
        $pallet->product_id = $printing->production->product_id;
        $dluo=$printing->production->product->DLUO;
        // $pallet->DLC = $pallet->datefab->addDays($dluo);
        $pallet->DLC = Carbon::parse($pallet->datefab)->addDays($dluo);

        // Autres champs de la palette à définir si nécessaire
        $pallet->save();
    }


    return redirect()->route('productions.show', $printing->production_id);

   }
     /**
      * Display the specified resource.
      */
     public function show(Printing $printing)
     {
       $production = $printing->production;
    //    return view('printings.show', compact('printing', 'production'));

       $pallets = Pallet::where('priting_id', $printing->id)->get();

        return view('printings.show',compact('printing',  'production','pallets'));


     }

     /**
      * Show the form for editing the specified resource.
      */
     public function edit(int $printing)
     {
         $productions = Production::all();
         // $printing = Printing::findOrFail($printing);
         // return view('printings.edit' ,compact('printing'));
         $printing = Printing::findOrFail($printing);
         return view('printings.edit', compact('printing', 'productions'));
     }

     /**
      * Update the specified resource in storage.
      */
     public function update(Request $request , $printing_id)
     {
         $production = Production::findOrFail($request->production_id);
         $production->Printings()->where('id',$printing_id)->update([
            'dateimp' => $request->dateimp,
            'quantite'=> $request->quantite,
            // 'LOT'=> $request->LOT,

           ]);
           return redirect()->route('printings.index')
           ->with('success','Production updated successfully');    }

     /**
      * Remove the specified resource from storage.
      */
     public function destroy(int $printing_id)
     {
        $printing = Printing::findOrFail($printing_id);

        // Vérifier s'il existe des printings associés à cette production
        if ($printing->pallets()->count() > 0) {
            return redirect()->route('printings.index')
                            ->with('error','Cannot delete production because it has associated printings');
        }

        // Supprimer la production s'il n'y a pas de printings associés
        $printing->delete();

        return redirect()->route('printings.index')
                        ->with('success','Production deleted successfully');

     }
 }
