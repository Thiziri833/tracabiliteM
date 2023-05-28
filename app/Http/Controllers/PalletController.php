<?php

namespace App\Http\Controllers;
use Milon\Barcode\DNS1D;


use App\Models\Pallet;
use App\Models\Product;
use App\Models\Production;
use App\Models\Printing;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Dompdf\Dompdf;





use DateTime;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pallets = Pallet::latest()->paginate(5);
        $currentDate = now();

        return view('pallets.index', compact('pallets','currentDate'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
 {
    

    $product = Product::findOrFail($request->product_id);
    $product->pallets()->create([

        // 'SSCC' => $request->SSCC,
        'datefab' => $request->datefab,
        'DLC' => $request->DLC,
        'quantiteplt' => $request->quantiteplt,
        'priting_id'  => $request->priting_id,
     ]);

    return redirect()->route('pallets.index')->with('success', 'Pallet created successfully');

  }
    /**
     * Display the specified resource.
     */
    public function show(Pallet $pallet)
    {
        $barcode = DNS1D::getBarcodeHTML($pallet->SSCC, 'C128',2.8,90);

         return view('pallets.show', compact('pallet', 'barcode'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pallet $pallet)
    {
        return view('pallets.edit',compact('pallet'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {

        $pallet = Pallet::find($id);


        $pallet->quantiteplt = $request->input('quantiteplt');

        $pallet->save();

        return redirect()->route('pallets.index')
                         ->with('success','Production updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $pallet_id)
    {

       $pallet = Pallet::findOrFail($pallet_id);

       $pallet->delete();

         return redirect()->route('pallets.index')
                         ->with('success','Product deleted successfully');

    }
    public function crudSsccCreate(Request $request, $printingId){
        $printingId = $request->input('priting_id');
        $quantity = $request->input('quantite');
        $quantity = $request->input('LOT');
        $printing = Printing::findOrFail($printingId);

    for ($i = 0; $i < $quantity; $i++) {
        $pallet = new Pallet();
         $pallet->SSCC = IdGenerator::generate(['table' => 'pallets', 'field' => 'SSCC', 'length' => 9, 'prefix' => '0', 'numbers_only' => true]);
         $pallet->datefab = $printing->production->dateprod;
        $pallet->product_id = $printing->production->product_id;
        $dluo=$printing->production->product->DLUO;
        $pallet->DLC = $pallet->datefab->addDays($dluo);
        // $pallet->DLC = $this->calculateDLC($printing->production->dateprod, $printing->production->product->DLU);
        $pallet->printing()->associate($printing);
        $pallet->save();
    }
     // Call the printing here    //
    return redirect()->route('pallets.index')->with('success', 'Palettes créées avec succès');
 }


 private function calculateDLC($datefab, $dlu)
 {
     $datefab = Carbon::parse($datefab);
     $dlu = intval($dlu);
     return $datefab->addDays($dlu)->format('Y-m-d');
 }



 public function generatePDF($id) {
     $pallet = Pallet::find($id);
     $barcode = DNS1D::getBarcodeHTML($pallet->SSCC, 'C128', 2.8, 90);

     $data = [
         'pallet' => $pallet,
         'barcode' => $barcode
     ];

     $html = view('pallets.pdf', $data)->render();

     $dompdf = new Dompdf();
     $dompdf->loadHtml($html);
     $dompdf->setPaper('a6', 'portrait'); // Définir le format du papier
     // (Optionnel) Configuration supplémentaire de Dompdf
     // $dompdf->setOptions([...]);

     $dompdf->render();

     $dompdf->stream('pallets.pdf');
 }



}



