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
        if(auth()->user()->isAdmin)
        {
            $catagories = Catagory::all();
            return view('catagory.index', compact('catagories'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(auth()->user()->isAdmin)
        {
            return view('catagory.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCatagoryRequest $request)
    {
        if(auth()->user()->isAdmin)
        {
            $catagory = Catagory::create([
                'name' => $request->name
            ]);
            return redirect(route('catagory.index'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Catagory $catagory)
    {
        if(auth()->user()->isAdmin)
        {
            return view('catagory.show', compact('catagory'));
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Catagory $catagory)
    {
        if(auth()->user()->isAdmin)
        {
            return view('catagory.edit', compact('catagory'));
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCatagoryRequest $request, Catagory $catagory)
    {
        if(auth()->user()->isAdmin)
        {
            $catagory->update($request->validated());
            return redirect(route('catagory.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Catagory $catagory)
    {
        if(auth()->user()->isAdmin)
        {
            $catagory->delete();
            return redirect(route('catagory.index'));
        }
    }
}
