<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()->isAdmin)
        {
            $admins = Admin::all();
            return view('admin.index', compact('admins'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(auth()->user()->isAdmin)
        {
            return view('admin.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
        if(auth()->user()->isAdmin)
        {
            $admin = Admin::create([
                'name' => $request->name,
                'email' => $request->email
            ]);
            return redirect(route('admin.index'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        if(auth()->user()->isAdmin)
        {
            return view('admin.show', compact('admin'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        if(auth()->user()->isAdmin)
        {
            $admin->delete();
            return redirect(route('product.index'));
        }
    }
}
