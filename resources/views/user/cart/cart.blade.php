@extends('user.master')
@section('title','cart')
@section('user_content')


    @include('user.component.header')


    
        <div class="container" style="padding-top: 100px; min-height:85vh">
            <div class="row">
                <div class="col-md-8 mx-auto mt-3 mb-3">
                    <h1 style="font-size: 3.5rem">Cart Page</h1>
                </div>
            </div>
            <div class="row">
                @if(DB::table('carts')->where('name',auth()->user()->email)->count() == 0)
                    <div class="col-md-10 mx-auto">
                    <h1 style="font-size:50px; font-weight:bold; color:teal; padding:50px 0px;">There have no cart</h1>
                    <a href="{{route('home')}}" class="btn btn-warning mt-5">Shopping Page</a>
                    </div>
                    
                @else
                <div class="col-md-10 mx-auto">

                    <div class="col-md-10 mx-auto mb-2">
                        <div class="card ">
                        <div class="row bg-dark p-2 cart-title-row">
                                <div class="col-md-3">
                                    <p class="text-center text-white">Title</p>
                                </div>
                                <div class="col-md-2">
                                    <p class="text-center text-white">Quantity</p>
                                </div>
                                <div class="col-md-2">
                                    <p class="text-center text-white">Price</p>
                                </div>
                                <div class="col-md-2">
                                    <p class="text-center text-white">Order</p>
                                </div>
                                <div class="col-md-3">
                                    <p class="text-center text-white">Delete</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($cart as $data)
                    <div class="col-md-10 mx-auto mb-2">
                        <div class="card p-3">
                        <div class="row  p-2 cart-title-row">
                                <div class="col-md-3">
                                    <p class="text-center">{{$data->product_title}}</p>
                                </div>
                                <div class="col-md-2">
                                    <p class="text-center">{{$data->product_quantity}}</p>
                                </div>
                                <div class="col-md-2">
                                    <p class="text-center">${{$data->price}}</p>
                                </div>
                                <div class="col-md-2">
                                    <p class="text-center"><a href="{{route('order',$data->id)}}" class="btn btn-primary">Order Now</a></p>
                                </div>
                                <div class="col-md-3">
                                    <p class="text-center">
                                        <form action="{{route('cart.destroy',$data->id)}}" method="POST">
                                            @csrf 
                                            <button type="submit" class="btn btn-warning">Delete</button>
                                        </form>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    @if(method_exists($cart,'links'))
        <div class="row mt-3">
            <div class="d-flex justify-content-center">
                {!! $cart->links() !!}
            </div>
        </div>
        @endif
                </div>
            </div>
        </div>
        @endif

       
@endsection