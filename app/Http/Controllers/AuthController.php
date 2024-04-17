<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login(){

        return view('front.account.login');
    }



    public function register(){

        return view('front.account.register');

    }


    public function store(Request $request)

 
    {

        // dd($request->name,$request->phone,$request->email,$request->password);
     
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            //'phone' => 'required',
            'password' => 'required|min:3',
        ]);
        
        $user = new User;
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        //$user->phone = $validatedData['phone'];
        $user->password = bcrypt($validatedData['password']);
        
        $user->save();



        return redirect()->back()->with('success', 'User registered successfully!');
        echo('user created successfuly');
    }

//authenticates the user   

public function authenticate(Request $request){

    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required',
    ]);
    
    if ($validator->passes()) {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
        
            return redirect()->route('account.profile'); 

        } else {
            
            return redirect()->route('account.login')
                ->withInput($request->only('email'))
                ->with('error', 'Email or Password is incorrect');
        }

    } else {
      
        return redirect()->route('account.login')
            ->withErrors($validator)
            ->withInput($request->only('email'));
    }
}

public function profile(){
 
   return view('front.account.profile');
}

public function orders(){

    $Details = Payment::where('first_name', '=', auth()->user()->name)->
    where('email', '=', auth()->user()->email)
    
    ->get();
   
    return view('front.account.userOrders',['Details' => $Details]);
 }


public function logout(){
    Auth::logout();
    
     return redirect()->route('account.login')
     ->with('success','Logout Success');
}

public function checkout(){
    return view('front.checkout');
}
}