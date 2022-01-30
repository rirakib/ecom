@extends('user.master')
@section('title','Order')
@section('user_content')
<div class="container" style="padding-top:100px; min-height:80vh">
    <div class="row">
        <div class="col-md-10 mx-auto">
            @if(session('stutus'))
                <h1 style="font-size:40px; color:green">{{session('stutus')}}</h1>
            @else
            <h1 style="font-size:40px">Order Page</h1>
            @endif
        </div>
    </div>
    @php 
    $vat = 5;
    $shipping = 30;
    $promo_price = 20;
    $userPromoCode = 20;
    $promoCode = 'a110';
    if($promoCode == $userPromoCode)
    {
    $total = $order->price + $vat + $shipping - $promo_price;
    }
    else{
    $total = $order->price + $vat + $shipping ;
    }

    @endphp
    <div class="row">
        <div class="col-md-5 mt-5">
            <form action="{{route('order.store',)}}" method="POST" class="forms-sample mb-3">
                @csrf
                <input type="hidden" value="{{$order->id}}" name="order_id">
                <div class="form-group mb-3">
                    <label for="title">Product Title</label>
                    <input type="text" value="{{$order->product_title}}" class="form-control" name="title" id="title">
                </div>
                <div class="form-group mb-3">
                    <label for="quantity">Product Quantity</label>
                    <input type="number" min="1" value="{{$order->product_quantity}}" class="form-control"
                        name="quantity" id="quantity">
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" value="{{auth()->user()->email}}" class="form-control" name="email" id="email">
                </div>
                <div class="form-group mb-3">
                    <label for="address">Address</label>
                    <input type="text" value="{{auth()->user()->address}}" class="form-control" name="address"
                        id="address">
                </div>
                <div class="form-group mb-3">
                    <label for="mobile">Mobile Number</label>
                    <input type="number" value="{{auth()->user()->mobile}}" class="form-control" name="mobile"
                        id="mobile">
                </div>
                <div class="form-group mb-3">
                    <input type="hidden" value="{{$total}}" class="form-control" name="price">
                </div>
                <h2 class="mb-3">Payment Method <span class="text-danger ml-1 ">Bkash</span></h2>
                <div class="form-group mb-3">
                    <label for="bikash_number">Bikash Number</label>
                    <input type="number" class="form-control" name="bikash_number" id="bikash_number">
                </div>
                <div class="form-group mb-3">
                    <label for="reffer_code">Reffer Code</label>
                    <input type="text" class="form-control" name="reffer_code" id="reffer_code">
                </div>

                <button class="btn btn-primary">Order</button>
            </form>
        </div>
        <div class="col-md-6 mx-auto mt-5">

            <h2 style="font-size:35px">Your Product</h2>
            <h2 style="font-size:25px; margin-top:40px">{{$order->product_title}}</h2>
            <p>Product quantity : {{$order->product_quantity}}</p>
            <p>Price : {{$order->price}}</p>
            <p>Vat : $ {{$vat}}</p>
            <p>Shipping : $ {{$shipping}} </p>
            <hr>

            <p>Total : $ {{$total}}</p>

            <h2 class="text-success" style="margin-top:50px; font-size:30px">Promo Code offer : ${{$promo_price}}</h2>
                <form action="{{route('promo')}}" method="post">
                    @csrf
                <div class="form-group mb-3">
                    <label for="reffer_code">Promo Code</label>
                    <input type="text" class="form-control" name="promo_code" id="promo_code">
                    <button type="submit" class="btn btn-warning mt-3">Submit</button>
                </div>
                </form>
            
        </div>
    </div>
</div>
@endsection