<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class ProductController extends Controller
{   
    // function for displaying category list while creating product
    public function create(){
        $categories = Category::pluck('name', 'id');
    return view('admin.products.create', compact('categories'));
        
    } 
    
    



public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required',
        'slug' => 'required',
        'description' => 'required',
        'price' => 'required',
        'compare_price' => 'required',
        'category_id' => 'required',
        'is_featured' => 'required|in:0,1',
        'sku' => 'required',
        'barcode' => 'required',
        'status' => 'required|in:0,1',
        // 'image' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    
    
// dd($request->all());
   
    $product = new Product($validatedData);

    
   

    if($product->save()){
        $productid= $product->id;
        $image = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            // move in folder
            $image->move(public_path('images'), $imageName);
            // Set image path and save it into database
            $image = 'images/' . $imageName;
           

        }
        $productImage = new ProductImage();
        $productImage->product_id= $productid;
        $productImage->image = $image;
        $productImage->sort_order = 1;
        $productImage->save();
    }

    return redirect()->route('products.index')->with('success', 'Product created successfully!');
}



public function index(Request $request)
{
    $query = $request->input('query');
    $categoriesQuery = Product::query();

    if ($query) {
        $categoriesQuery->where('title', 'LIKE', "%$query%");
    }

    $products = $categoriesQuery->paginate(5);

    return view('admin.products.index', ['products' => $products, 'query' => $query]);
}




    public function show($id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();
        }

        return redirect()->route('products.index')->with('error', ' product deleted!');
    }


    

    }
   

