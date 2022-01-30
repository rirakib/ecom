<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;

class HomeController extends Controller
{
    //
    public function redirect()
    {
        $userType = Auth::user()->userType;
        if($userType == 1)
        {
            return redirect()->route('dashboard');
        }
        else{
            
            return redirect()->route('home');
        }
    }

    public function index()
    {
        $user = auth::user();
        $count = Cart::where('name',$user->email)->count();
        $product = Product::orderBy('id','desc')->Paginate(3);
        return view('user.home.main',compact('product','count'));
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function search(Request $request)
    {
        $search = $request->search;
        if($search == '')
        {
            $product = Product::orderBy('id','desc')->Paginate(3);
        return view('user.home.main',compact('product'));
        }
        $product = Product::where('title','Like','%'.$search.'%')->get();
       
        return view('user.home.main',compact('product'));
        
    }
    public function cart(Request $request,$id)
    {
        if(Auth::id())
        {
            $user =auth()->user();
            $product = Product::find($id);
            $cart = new Cart;
            $cart->name = $user->email;
            $cart->mobile = $user->mobile;
            $cart->product_quantity = $request->product_quantity;
            $cart->price = $product->price * $cart->product_quantity;
            $cart->address = $user->address;
            $cart->product_title = $product->title;

            $cart->save();
            return redirect()->back();
        }
        else{
            return redirect()->route('login');
        }
    }
}