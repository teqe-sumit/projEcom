<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;

class ProductImageController extends Controller
{
    public function create($productId)
    {
        $product = Product::findOrFail($productId);
        return view('product.images.create', compact('product'));
    }

   
      
    
    public function store(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    
    $imageName = time().'.'.$request->image->extension();  
    $request->image->move(public_path('images'), $imageName);
    
    $productImage = new ProductImage();
    $productImage->product_id = $request->product_id; 
    $productImage->image_path = 'images/' . $imageName; 
    $productImage->save();
    
   
 
    return redirect()->route('products.index')->with('success', 'Product image uploaded successfully!');
}

}
