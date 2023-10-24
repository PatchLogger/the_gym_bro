<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\product;

use App\Models\Cart;

use App\Models\Order;


class HomeController extends Controller
{
    public function product_detail($id){
        $data=product::find($id);
        if(Auth::id())
        {
            $id=Auth::user()->id;
            $cart=Cart::where('user_id','=',$id)->get();
            $count = $cart->count();
            return view('all_products.product_detail',compact('data', 'count'));

        }
        
        return view('all_products.product_detail',compact('data'));
    }

    public function index(){
        return view('home.userpage');
    }

    public function add_cart(Request $request,$id){
        if(Auth::id()){
            $user=Auth::user();
            $product=product::find($id);
            $cart= new Cart;
            $cart->name=$user->name;
            $cart->phone=$user->phone;
            $cart->email=$user->email;
            $cart->address=$user->address;
            $cart->product_title=$product->title;
            if($product->discount_price){
                $cart->price=$product->discount_price * $request->quantity;

            }
            else{
            $cart->price=$product->price * $request->quantity;
            }
            $cart->product_image=$product->image;
            $cart->quantity=$request->quantity;
            $cart->product_id=$product->id;
            $cart->user_id=$user->id;
            $cart->save();
            return redirect()->back()->with('message','Product successfully added to cart.');
        }
        else{
            return redirect('login');
        }
    }

    public function your_cart(){
        if(Auth::id()){
        $add=Auth::user()->address;
        $id=Auth::user()->id;
        $cart=Cart::where('user_id','=',$id)->get();
        $count = $cart->count();
        return view('all_products.cart',compact('cart','count','add','id'));    
        }
        else{
            return redirect('login');
        }
    }

    public function redirect()
    {
        $data=product::all();
        $usertype=Auth::user()->usertype;
        
        if($usertype=='1')
        {
            return view('admin.admin');
        }
        else
        {
            $id=Auth::user()->id;
            $cart=Cart::where('user_id','=',$id)->get();
            $count = $cart->count();    
            return view('dashboard',compact('data', 'count'));
        }
    }

    public function remove_cart($id){
        $cart=Cart::find($id);
        $cart->delete();
        return redirect()->back()->with('message','Product Successfully Taken Out of Your Cart');
    }

    public function cod_order(){
        $user=Auth::user();
        $user_id=$user->id;
        $data=Cart::where('user_id','=',$user_id)->get();
        foreach($data as $data){
            $order= new Order;
            $order->name=$data->name;
            $order->phone=$data->phone;
            $order->email=$data->email;
            $order->address=$data->address;
            $order->user_id=$user->id;
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->product_image=$data->product_image;
            $order->quantity=$data->quantity;
            $order->product_id=$data->id;
            $order->delivery_status='PENDING';
            $order->payment_status='cash on delivery';
            $order->save();
            $cart_id=$data->id;
            $cart=Cart::find($cart_id);
            $cart->delete();
        }
        return redirect()->back()->with('message','Your Order Has Been Processed and Will Be Delivered Shortly.');
    }
    
    public function your_orders(){
        if(Auth::id()){
        $id = Auth::user()->id;
        $data =Order::where('user_id','=',$id)->get();
        $cart=Cart::where('user_id','=',$id)->get();
        $count = $cart->count();    
        return view('profile.your_orders',compact('data','count'));
        }
        else{
            return redirect('login');
        }
    }
    public function cancle_order($id){
        if(Auth::id()){
            $data=Order::find($id);
            $data->delivery_status='ORDER CANCLED';
            $data->save();
            return redirect()->back()->with('message','Your Order Has Been Successfully Cancelled');
        }
        else{
            return redirect('login');
        }
    }
}
