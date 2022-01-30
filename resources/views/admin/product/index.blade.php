@extends('admin.master')
@section('title','product')
@section('admin_content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Bordered table</h4>
            <p class="card-description"> Add class <code>.table-bordered</code>
            </p>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th> Image </th>
                            <th> Name </th>
                            <th> Quantity </th>
                            <th> Price ($) </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product as $data)
                        <tr>
                            <td> <img src="{{asset('product/'.$data->image)}}" alt=""> </td>
                            <td> {{$data->title}} </td>
                            <td>
                                {{$data->quantity}}
                            </td>
                            <td>{{$data->price}}</td>
                            <td class="d-flex">
                                <span class="edit"><a href="{{route('product.edit',$data->id)}}" class="btn btn-primary mr-2">Edit</a></span>
                                <span class="delete">
                                    <form action="{{route('product.destroy',$data->id)}}" method="POST">
                                        @csrf 
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center">
    {!! $product->links() !!}
    </div>
@endsection