<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//use App\Models\Payment;



class HomeController extends Controller
{
    public function index()
    {
        $tc = DB::table('categories')->count();
        $productCount = DB::table('products')->count();
        $totalOrder = DB::table('payments')->count();
        $totalSale = DB::table('payments')->sum('amount');
    
        return view('admin.dashboard', [
            'tc' => $tc,
            'c' => $productCount,
            'totalOrder' => $totalOrder,
            'totalSale' => $totalSale

        ]);
    }
    


    // public function index()
    // {

    //     $tc = DB::table('categories')->count();
    //     $productCount = DB::table('products')->count();
    //     $Details = DB::table('payments')->count();




    //     return view('admin.dashboard', ['tc' => $tc],['c' =>$productCount],['totalSale' =>$Details]);
        // $admin = Auth::guard('admin')->user();
        // echo 'welcome ' . $admin->name . ' <a href="' . route('admin.logout') . '">logout</a>';
   

    // public function prod()
    // {

    //     $productCount = DB::table('products')->count();


    //     return view('admin.dashboard', ['c' =>$productCount]);
    // }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
