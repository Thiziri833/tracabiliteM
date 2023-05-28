<?php

namespace App\Http\Controllers;

use App\Models\Load;
use App\Http\Requests\StoreLoadRequest;
use App\Http\Requests\UpdateLoadRequest;

class LoadController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:load-list|load-create|load-edit|load-delete', ['only' => ['index','show']]);
         $this->middleware('permission:load-create', ['only' => ['create','store']]);
         $this->middleware('permission:load-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:load-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loads = Load::latest()->paginate(5);
        return view('loads.index',compact('loads'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLoadRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Load $load)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Load $load)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLoadRequest $request, Load $load)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Load $load)
    {
        //
    }
}
