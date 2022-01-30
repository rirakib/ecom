<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    //
    public function orderView($id)
    {   
        $order = Cart::find($id);
        return view('user.order.order',compact('order'));
    }
    public function promo(Request $request){
        $promo_data = $request->promo_code;
        return view('user.order.order',compact('promo_data'));
    }

    public function store(Request $request)
    {
        $data= $request->all([
            'title','email','mobile','address','bikash_number','quantity','price','reffer_code'
        ]);
        Order::create($data);
        
        return redirect()->back()->with('stutus','Order Complete Successfully');
        
    }
}
