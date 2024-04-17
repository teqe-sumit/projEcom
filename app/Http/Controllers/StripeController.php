<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Stripe;
use App\Models\Payment;
use Session;
class StripeController extends Controller
{
    /**
     * payment view
     */
    public function handleGet()
    {
        return view('home');
    }
  
   


    public function handlePost(Request $request)
    { 
       

        //dd($request);
        // Your existing code to handle payment
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $cart = session()->get('cart');
        $totalAmount = 0;
        $productTitles = []; // Array to store product titles


        foreach ($cart as $item) {
            $totalAmount += $item['product']->price * $item['quantity'];
            $productTitles[] = $item['product']->title; // Store product title
            
        }

        $charge=Stripe\Charge::create([
            "amount" => $totalAmount * 100, // Convert to cents
            "currency" => "inr",
            "source" => $request->stripeToken,
            "description" => "Test Payment for . Products: " . implode(", ", $productTitles)
        ]);
       // dd($ddd);

        // Create a new Payment instance
        $payment = new Payment();
        //hey chatgpt i want to add  product title can u do this 
        $payment->amount = $totalAmount;
        $payment->source =  $charge->id;;
        $payment->first_name = $request->first_name;
        $payment->last_name = implode(", ", $productTitles);
        $payment->email = $request->email;
        $payment->country = $request->country;
        $payment->address = $request->address;
        $payment->apartment = $request->apartment;
        $payment->city = $request->city;
        $payment->state = $request->state;
        $payment->zip = $request->zip;
        $payment->mobile = $request->mobile;

        // Save the payment details to the database
        $payment->save();
        
        return back()->with('success', 'Payment has been successfully processed.');
    }
}



















    // public function handlePost(Request $request)
    // {
    //     Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    //     // Get the cart from session
    //     $cart = session()->get('cart');
    //     $totalAmount = 0;

    //     // Calculate total amount based on items in cart
    //     foreach ($cart as $item) {
    //         $totalAmount += $item['product']->price * $item['quantity'];
    //     }

    //     $payment = new Payment();
    //     $payment->amount = $totalAmount; // Store the amount (in the original currency, not cents)
    //     $payment->source = $request->stripeToken;

    //     // Create Stripe charge with total amount
    //     Stripe\Charge::create ([
    //         "amount" => $totalAmount * 100, // Convert to cents
    //         "currency" => "inr",
    //         "source" => $request->stripeToken,
    //         "description" => "Making test payment." 
    //     ]);


    //     $payment = new Payment();
    //     $payment->amount = $totalAmount; // Store the amount (in the original currency, not cents)
    //     $payment->source = $request->stripeToken;

    //     Session()->flash('success', 'Payment has been successfully processed.');

    //     return back();
    // }
