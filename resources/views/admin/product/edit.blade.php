@extends('admin.master')
@section('title','product')
@section('admin_content')

<div class="row">
    
    <div class="col-8 mx-auto grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h1 class="mb-4">Edit Product</h1>
                @if(session('stutus'))
                    <h2 class="text-success mt-2 mb-2">{{session('stutus')}}</h2>
                @endif
                <form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data" class="forms-sample mb-3">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" value="{{$product->title}}" class="form-control" name="title" id="title">
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" value="{{$product->price}}" min="0" class="form-control" name="price" id="price">
                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" value="{{$product->quantity}}" min="0" class="form-control" name="quantity" id="quantity">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="description" cols="30" style="min-height: 120px;">{{$product->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Product Image</label>
                        <input type="file" value="{{$product->image}}"  class="form-control" name="image" id="image">
                    </div>
                    
                    <button type="submit" class="btn btn-primary me-2 mt-4">Update Product</button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .form-control{
        color: #fff !important;
        background-color: #111 !important;
    }
</style>

@endsection