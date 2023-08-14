<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
use Stripe;


class HomeController extends Controller
{

    public function index()
    {
        $products= Product::paginate(6);

        return view('home.homepage', compact('products'));

    }



    public function redirect()
    {
        $usertype= Auth::user()->usertype;

        if($usertype == '1')
        {
            return view('admin.home');
        }
        else
        {
            $products= Product::paginate(6);

            return view('home.homepage', compact('products'));
        }
    }

     public function products_detail($id)
     {
        $product= Product::find($id);

        return view('home.products_details', compact('product'));

     }

     public function add_cart(Request $req, $id)
     {
        if(Auth::id())
       {
            $user= Auth::user();
            $products= Product::find($id);
            $carts= new Cart();
            $carts->name   = $user->name;
            $carts->email  = $user->email;
            $carts->phone  = $user->phone;
            $carts->address= $user->address;
            $carts->user_id= $user->id;

            $carts->product_title = $products->title;
            if($products->dis_price!= null)
            {
                $carts->price    = $products->dis_price*$req->quantity;

            }
            else
            {
                $carts->price    = $products->price*$req->quantity;
            }
            
            $carts->product_id    = $products->id;
            $carts->image         = $products->image;
            $carts->quantity      = $req->quantity;


            $carts->save();


            return redirect()->back();
          
       }
       else
       {
            return redirect('login');
       }
    }

    public function show_cart()
    {
        $id= Auth::id();
        
        $cart= cart::where('user_id','=',$id)->get();
        return view('home.show_cart', compact('cart'));
    }

    public function remove_cart($id)
    {
        $cart= Cart::find($id);

        $cart->delete();

        return redirect()->back()->with('message','Cart remove successfuly!');

    }

    public function cash_order()
    {
        $user= Auth::user();
        $userid= $user->id;
        $data= Cart::where('user_id','=',$userid)->get();

        foreach($data as $data)
        {
            $order= new Order();
            $order->name   = $data->name;
            $order->email  =$data->email;
            $order->phone  =$data->phone;
            $order->address  =$data->address;
            $order->user_id  =$data->user_id;

            $order->product_title  =$data->product_title;
            $order->quantity  =$data->quantity;
            $order->price  =$data->price;
            $order->image  =$data->image;
            $order->product_id  =$data->product_id;
            $order->payment_status ='cash on delivery';
            $order->delivery_status= 'processing';

            $order->save();

            $cart_id= $data->id;
            $cart= Cart::find($cart_id);
            $cart->delete();
            
        }

        return redirect()->back()->with('message',' We have recived your request. we will connect you soon!!! ');
 
    }

    
}
