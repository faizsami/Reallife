@extends('layouts.site')
@section('content')
    <!-- START SECTION BANNER -->
<section class="bg_light_yellow breadcrumb_section background_bg bg_fixed bg_size_contain" data-img-src="{{ asset('/images/breadcrumb_bg.png') }}">
	<div class="container">
    	<div class="row align-items-center">
        	<div class="col-sm-12 text-center">
            	<div class="page-title">
            		<h1>Products</h1>
                </div>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/shop')}}">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Products</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION BANNER -->

<!-- START SECTION SHOP -->
<section>
	<div class="container">
    	<div class="row">
            @php($products = App\Models\Product::where('status', 0)->paginate(12))
            @foreach($products as $product)
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="product">
                        <div class="product_img">
                            <a href="#"><img src="{{ asset('uploads/products/'.$product->image) }}" alt="product_img1"/></a>
                            <div class="product_action_box">
                                <ul class="list_none pr_action_btn">
                                    <li>
                                        @if(Auth::check())
                                            <a href="{{ url('/user/add-to-cart/'.$product->id) }}">
                                                <i class="ti-shopping-cart"></i>
                                            </a>
                                        @else
                                            <a href="{{ url('/login') }}">
                                                <i class="ti-shopping-cart"></i>
                                            </a>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product_info">
                            <h6>
                                <a href="#">{{$product->name}}</a><br>
                                <small>{{substr($product->description, 0, 50)}}</small>
                            </h6>
                            {{-- <div class="rating">
                                <div class="product_rate" style="width:80%"></div>
                            </div> --}}
                            <span class="price">
                                <small class="text-danger">
                                    <sup>
                                        <del>
                                            ₹{{number_format($product->price, 2)}}
                                        </del>
                                    </sup>
                                </small>&nbsp;&nbsp;
                                ₹{{number_format($product->sell_price, 2)}}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-md-center">
            <div class="col-12 mt-3 mt-lg-4">
                {{$products->links()}}
            </div>
        </div>
    </div>
</section>
<!-- END SECTION SHOP -->

<!-- END SECTION NEWSLATTER -->
<section class="bg_light_green newslatter_wrap">
	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-lg-6 col-md-8 text-center">
                <div class="heading_s2 animation" data-animation="fadeInUp" data-animation-delay="0.02s">
                    <h2>Subscribe Our Newsletter</h2>
                </div>
                <p class="m-0 animation" data-animation="fadeInUp" data-animation-delay="0.03s">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                <div class="small_divider"></div> 
                <div class="newsletter_form animation" data-animation="fadeInUp" data-animation-delay="0.04s">
                    <form> 
                        <div class="rounded_input">
                           <input type="text" class="form-control" required="" placeholder="Enter your Email Address">
                        </div>
                        <button type="submit" title="Subscribe" class="btn btn-default" name="submit" value="Submit">subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="overlap_shape">
        <div class="ol_shape19">
            <div class="animation" data-animation="fadeInLeft" data-animation-delay="0.5s">
                <img data-parallax='{"y": 20, "smoothness": 20}' src="{{ asset('/images/shape34.png') }}" alt="shape34"/>
            </div>
        </div>
        <div class="ol_shape20">
            <div class="animation" data-animation="fadeInRight" data-animation-delay="0.5s">
                <img data-parallax='{"y": 20, "smoothness": 20}' src="{{ asset('/images/shape35.png') }}" alt="shape35"/>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION NEWSLATTER -->
@endsection