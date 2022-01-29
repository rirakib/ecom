<div class="latest-products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Latest Products</h2>
                        <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                @foreach($product as $data)
                <div class="col-md-4">
                    <div class="product-item">
                        <a href="#"><img src="{{asset('user/assets/images/product_01.jpg')}}" alt=""></a>
                        <div class="down-content">
                            <a href="#">
                                <h4>{{$data->title}}</h4>
                            </a>
                            <h6>${{$data->price}}</h6>
                            <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>
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
        </div>
    </div>