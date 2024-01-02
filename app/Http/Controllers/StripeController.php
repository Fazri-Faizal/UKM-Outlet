<?php /** @noinspection ALL */


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    
    public function checkout()
    {
        return view('checkout');
    }

    public function session()
    {
        $totprice = $_POST['totprice'];  
        $prodname = $_POST['prodname'];  
        $prodqty = $_POST['prodqty'];  
       
  

        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'myr',
                        'product_data' => [
                            'name' => $prodname,
                        ],
                        'unit_amount'  => $totprice*100,
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('success'),
            'cancel_url'  => route('checkout'),
        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {
        return view('order_success');
    }
}