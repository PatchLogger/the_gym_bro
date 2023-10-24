<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\product;

use App\Models\Cart;

use App\Models\Order;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StripeController extends Controller
{
    public function checkout()
    {

        $totalprice = 0;
        $productItems = [];
        $id = Auth::user()->id;
        $email = Auth::user()->email;
        $cart = Cart::where('user_id', '=', $id)->get();
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        foreach ($cart as $cart) {
            $totalprice = $totalprice + $cart->price;
            $total = $cart->price / $cart->quantity;
            $quantity = $cart->quantity;
            $two0 = "00";
            $unit_amount = "$total$two0";
            $productItems[] = [
                'price_data' => [
                    'product_data' => [
                        'name' => $cart->product_title,
                    ],
                    'currency'     => 'USD',
                    'unit_amount'  => $unit_amount,
                ],
                'quantity' => $quantity,
            ];
        }

        $checkoutSession = \Stripe\Checkout\Session::create([
            'line_items'            => [$productItems],
            'billing_address_collection' => 'required',
            'allow_promotion_codes' => false,
            'mode'                  => 'payment',
            'allow_promotion_codes' => false,
            'metadata'              => [
                'user_id' => $id
            ],
            'customer_email' => $email, //$user->email,
            'success_url' => route('success', [], true) . "?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url'  => route('cancle'),
        ]);
        $sessionId = $checkoutSession->id;
        return redirect()->away($checkoutSession->url);
    }

    public function cancle()
    {
        $add = Auth::user()->address;
        $id = Auth::user()->id;
        $cart = Cart::where('user_id', '=', $id)->get();
        $count = $cart->count();
        return view('all_products.cart', compact('cart', 'count', 'add', 'id'));
    }

    public function success(Request $request)
    {
        $sessionId = $request->query('session_id');
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        try {
            $stripeSession = \Stripe\Checkout\Session::retrieve($sessionId);
            if (!$stripeSession) {
                throw new NotFoundHttpException;
            }

            if ($stripeSession->payment_status === 'paid') {
                $user = Auth::user();
                $user_id = $user->id;
                $data = Cart::where('user_id', '=', $user_id)->get();
                foreach ($data as $data) {
                    $order = new Order;
                    $order->name = $data->name;
                    $order->phone = $data->phone;
                    $order->email = $data->email;
                    $order->address = $data->address;
                    $order->user_id = $user->id;
                    $order->product_title = $data->product_title;
                    $order->price = $data->price;
                    $order->product_image = $data->product_image;
                    $order->quantity = $data->quantity;
                    $order->product_id = $data->id;
                    $order->delivery_status = 'PENDING';
                    $order->payment_status = 'card payment';
                    $order->save();
                    $cart_id = $data->id;
                    $cart = Cart::find($cart_id);
                    $cart->delete();
                }
                return redirect('your_cart')->with('message', 'Your Order Has Been Processed and Will Be Delivered Shortly.');
            }

            return redirect('cancle');
        } 
        catch (\Exception $e) {
            throw new NotFoundHttpException();
        }
    }
}
