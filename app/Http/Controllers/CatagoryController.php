<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use App\Http\Requests\StoreCatagoryRequest;
use App\Http\Requests\UpdateCatagoryRequest;

class CatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catagories = Catagory::all();
        return view('catagory.index', compact('catagories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('catagory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCatagoryRequest $request)
    {
        $catagory = Catagory::create([
            'name' => $request->name
        ]);
        return redirect(route('catagory.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Catagory $catagory)
    {
        return view('catagory.show', compact('catagory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Catagory $catagory)
    {
        return view('catagory.edit', compact('catagory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCatagoryRequest $request, Catagory $catagory)
    {
        $catagory->update($request->validated());
        return redirect(route('catagory.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Catagory $catagory)
    {
        $catagory->delete();
        return redirect(route('catagory.index'));
    }
}
