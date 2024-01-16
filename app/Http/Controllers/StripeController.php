<?php /** @noinspection ALL */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session; // Make sure to import the Session facade

class StripeController extends Controller
{
    public function checkout()
    {
        return view('checkout');
    }

    public function session(Request $request) // Inject the Request object to access request data
    {
        $totprice = $request->input('totprice'); // It's better to use the Request object
        $prodname = $request->input('prodname');
        $prodqty = $request->input('prodqty');
        $deliverymethod = $request->input('deliverymethod');
        

        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'myr',
                        'product_data' => ['name' => $prodname,],
                        'unit_amount'  => $totprice * 100,
                    ],
                    'quantity'   => 1, // Updated to use the product quantity
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('success'),
            'cancel_url'  => route('checkout'),
        ]);

        // Flash data to the session so it's available after redirect
        Session::flash('totprice', $totprice); // Use Laravel's global session() helper or the Session facade

        return redirect()->away($session->url);
    }

    public function success(Request $request)
    {
        // Retrieve flash data from the session
        $totprice = Session::get('totprice'); // Or use the global session() helper

        // Pass the total price to the view
        return view('order_success', ['totprice' => $totprice]);
    }
}
