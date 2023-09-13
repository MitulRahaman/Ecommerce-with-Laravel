<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        if(auth()->user()->isAdmin)
        {
            $orders = Order::all();
            return view('navigation.order_status', compact('orders'));
        }
        else
        {
            $orders = Order::all()->where('user_email', auth()->user()->email);
            return view('navigation.order_status', compact('orders'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
        $allProduct = '';
        foreach($request->productName as $productName)
        {
            $allProduct = $allProduct .$productName. ", ";
        }
        $allProduct = rtrim($allProduct, ",");

        $total = 0;
        foreach($request->productPrice as $productPrice)
        {
            $total += $productPrice;
        }
        
        $order = Order::create([
            'totalPrice' => $total,
            'orderedProduct' => $allProduct,
            'user_id' => auth()->user()->id,
            'user_email' => auth()->user()->email,
        ]);

        $email = auth()->user()->email;
        DB::table('carts')->where('email', $email)->delete();
        
        return redirect()->back();
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('navigation.orderDetail', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        DB::table('orders')
            ->where('id', $order->id)
            ->update(['status' => $request->status]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect(route('order.index'));
    }

    public function addcart(Request $request, $id)
    {
        $title = DB::table('products')->where('id', $id)->first();

        $cart = Cart::updateOrCreate(
            [
                'name' => auth()->user()->name,
                'email' => auth()->user()->email,
                'product_title' => $title->name,
            ],
            [
                'product_quantity' => $request->quantity,
                'product_price' => "$title->price",
            ]);

        return redirect()->back()->with('message', 'added to cart successfully');
    }

    public function showcart()
    {
        $email = auth()->user()->email;
        $carts = DB::select('select * from carts where email = ?', [$email]);

        return view('navigation.showcart', compact('carts'));
    }

    public function deleteCart($id)
    {
        $data = cart::find($id);
        $data->delete();

        return redirect()->back();
    }
}
