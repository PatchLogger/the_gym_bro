<?php

namespace App\Http\Controllers;

use App\Models\User;    

use App\Models\product;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\Order;

class AdminController extends Controller
{
    
    public function manage_user(){
        
        $data=User::all();
        return view('admin.manage_user',compact('data'));   
    }
    public function ban_user($id){
        $data=User::find($id);
        $data->delete();
        return redirect()->back()->with('message','User account has been removed.');
    }
    public function remove_admin($id){
        $data=User::find($id);
        $data->usertype=0;
        $data->save();
        return redirect()->back()->with('message','Successfully reverted back to regular user.');
    }
    public function make_admin($id){
        $data=User::find($id);
        $data->usertype=1;
        $data->save();
        return redirect()->back()->with('message','Admin account activated successfully.');
    }
    public function add_products(){
        return view('admin.add_products');
    }
    public function adding_products(Request $request){
        $product=new product;
        $product->title=$request->title;
        $product->discription=$request->discription;
        $product->catagory=$request->catagory;
        $product->price=$request->price;
        $product->discount_price=$request->d_price;
        $product->quantity=$request->quantity;
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('products',$imagename);
        $product->image=$imagename;
        $product->save();
        return redirect()->back()->with('message','Product Added Successfully.');
    }
    public function manage_products() {
        $data=product::all();
        return view('admin.manage_products',compact('data'));
    }
    public function manage_product($id){
        $product=product::find($id);
        return view('admin.manage_product',compact('product'));
    }
    public function update_product(Request $request,$id){
        $product=product::find($id);
        $product->title=$request->title;
        $product->discription=$request->discription;
        $product->catagory=$request->catagory;
        $product->price=$request->price;
        $product->discount_price=$request->d_price;
        $product->quantity=$request->quantity;
        $image=$request->image;
        if($image){
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('products',$imagename);
        $product->image=$imagename;
        }
        $product->save();
        return redirect(url('/manage_products'))->with('message','Product Updated Successfully.');
    }
    public function remove_product($id){
        $product=product::find($id);
        $product->delete();
        return redirect(url('/manage_products'))->with('message','Product Deleted Successfully.');
    }
    public function admin_dashboard(){
        return view('admin.admin');
    }
    public function manage_orders(){

        $data = Order::all();
        return view('admin.manage_orders',compact('data'));

    }
    public function delivered($id){
        $data = Order::find($id);
        $data->delivery_status = 'DELIVERED';
        $data->save();
        return redirect()->back()->with('message','Order Successfully Marked as Delivered');
    }
}
