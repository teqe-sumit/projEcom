<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;


class FrontController extends Controller
{
    public function index(){
    
        $productShow = Product::all();
        $categories = Category::all();
        //return view('front.home', compact('categories'));
        

        return view('front.home',['categories' => $categories],['c' =>$productShow]);
    }

    



    public function about(){


        return view('front.about');

    }



    public function contact(){

        return view('front.contact');
        
    }


    
}


