<div class="latest-products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Latest Products</h2>
                    <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
                    <form action="{{route('search')}}" method="POST"  class="forms-sample mb-3">
                        @csrf
                        <div class="form-group search-group">
                            <input type="search"  class="form-control search-product" name="search" placeholder="Search product" id="price">
                            <button class="btn btn-success">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            @foreach($product as $data)
            <div class="col-md-4">
                <div class="product-item">
                    <a href="#"><img src="{{asset('product/'.$data->image)}}" alt=""></a>
                    <div class="down-content">
                        <a href="#">
                            <h4>{{$data->title}}</h4>
                        </a>
                        <h6>${{$data->price}}</h6>
                        <p>{{$data->description}}</p>
                        <ul class="stars">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                        <span>Reviews (24)</span>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        @if(method_exists('product','link'))
        <div class="row">
            <div class="d-flex justify-content-center">
                {!! $product->links() !!}
            </div>
        </div>
        @endif
    </div>
</div>

<style>
    .product-item img {
        height: 150px;
        width: 100%;
        object-fit: cover;
        object-position: center;
    }
    .search-product{
        width: 220px;
    }
    .search-group{
        float: right;
        display: flex;
    }
</style>