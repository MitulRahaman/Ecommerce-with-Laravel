<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Catagory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\facades\Storage;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $products = Product::latest()->get();
        $catagories = DB::select('select * from catagories');
        return view('product.index', compact('products', 'catagories'));
    }

    public function index1($id)
    {
        $products = DB::table('products')->where('category', 'like', '%' .$id. '%')->get();
        $catagories = DB::select('select * from catagories');
        return view('product.index', compact('products', 'catagories'));
    }
        

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(auth()->user()->isAdmin)
        {
            $catagories = DB::select('select * from catagories');
            return view('product.create', compact('catagories'));
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $ext = $request->file('photo')->extension();
        $contents = file_get_contents($request->file('photo'));
        $filename = Str::random(25);
        $path = "products/$filename.$ext";
        Storage::disk('public')->put($path, $contents);

        $cat = [];
        foreach ($request->category as $x){ 
            $id = DB::table('catagories')
             ->select('id')
             ->where('name', $x)
             ->pluck('id');
             array_push($cat,$id);
        }

        $product = Product::create([
            'code' => $request->code,
            'name' => $request->name,
            'price' => $request->price,
            'category' => $cat,
            'photo' => "$path",
            'user_id' => auth()->id()
        ]);

        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        if(auth()->user()->isAdmin)
        {
            $catagories = DB::select('select * from catagories');
            return view('product.edit', compact(['product', 'catagories']));
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->except('photo', 'category'));


        if($request->category)
        {   
            $cat = [];
            foreach ($request->category as $x)
            { 
                $id = DB::table('catagories')
                ->select('id')
                ->where('name', $x)
                ->pluck('id');
                array_push($cat,$id);
            }
            $product->update(['category'=> $cat]);
        }

        if($request->file('photo'))
        {
            Storage::disk('public')->delete($product->photo);
            $ext = $request->file('photo')->extension();
            $contents = file_get_contents($request->file('photo'));
            $filename = Str::random(25);
            $path = "products/$filename.$ext";
            Storage::disk('public')->put($path, $contents);
            $product->update(['photo'=> $path]);
        }
        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if(auth()->user()->isAdmin)
        {
            $product->delete();
            return redirect(route('product.index'));
        }
        
    }
}
