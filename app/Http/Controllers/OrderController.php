<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use Illuminate\Http\Request;





class OrderController extends Controller
{   


    public function show(){
        $Details = Payment::all();
        // return view('admin.orders.Orders',compact('Details'));
        return view('admin.orders.Orders',['Details' => $Details]);

    }
  
}


