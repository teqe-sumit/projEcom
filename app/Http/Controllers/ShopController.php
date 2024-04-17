<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function single_product($title) {


        
        // dd($title);

      $product = Product::where('title', $title)->first();

     if ($product == null) {
         abort(404);
      }

    
    return view('front.product', ['product' => $product]);
}

}
