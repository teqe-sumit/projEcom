<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->has('cart') ? session()->get('cart') : [];
        return view('front.cart', compact('cart'));
        
    }

    public function add(Request $request)
    {
        $product = Product::find($request->id);
        $cart = session()->has('cart') ? session()->get('cart') : [];

        if (array_key_exists($product->id, $cart)) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                'product' => $product,
                'quantity' => 1,
            ];
        }

        

    session(['cart' => $cart]);

    // Flash a message indicating the product has been added to the cart
    session()->flash('status', 'Product added to cart successfully!');

    return redirect()->route('cart.index');
        
    }

    public function update(Request $request, $id)
    {
        $quantity = $request->quantity;
        $cart = session()->get('cart');
        $cart[$id]['quantity'] = $quantity;
        session(['cart' => $cart]);

        return redirect()->route('cart.index');
    }

    public function remove($id)
    {
        $cart = session()->get('cart');
        unset($cart[$id]);
        session(['cart' => $cart]);

        session()->flash('message', ' Item Removed Successfully!');

        return redirect()->route('cart.index');
        
    }
}