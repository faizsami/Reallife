@extends('layouts.user')
@section('page_name', 'Franchisee Wallet')
@section('content')
@include('partials.errors')
<!-- BEGIN: Content-->
<div class="app-content content ecommerce-application">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">

        <div class="content-header row">
            <div class="content-header-left col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Order</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('/user/franchisee/order') }}">Order</a>
                                </li>
                                <li class="breadcrumb-item active">Member Order
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>                    
            </div>
        </div>

        <div class="content-detached">
            <div class="content-body">
                @if($type == 'order')
                    <div class="container">
                        <div class="row mt-5">
                            <div class="col-md-6 grid-margin stretch-card mx-auto mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">Check Order</h6>
                                        <form class="forms-sample" method="post" action="{{ url('/user/franchisee/order') }}">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="" class="col-sm-3 col-form-label">Order Id</label>
                                                <div class="col-sm-9">
                                                    <input type="id" class="form-control" name="id" placeholder="Order Id" autocomplete="off" required>
                                                    @if($errors->has('id'))
                                                        <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                            <strong>{{ $errors->first('id') }}</strong>
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="text-center form-group row">
                                                <div class="col-sm-3 col-form-label"></div>
                                                <div class="col-sm-9">
                                                    <button type="submit" class="btn btn-primary form-control">Check Order</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if($type == 'delivered')
                    <!-- Invoice Add Left starts -->
                    <div class="col-xl-12 col-md-12 col-12">
                        <div class="card invoice-preview-card">
                            <!-- Header starts -->
                            <div class="card-header">
                                <h3>Customer Details</h3>
                            </div>
                            <div class="card-body invoice-padding pb-0">                                
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="customer-id">Customer Id <sup style="color:red">*</sup></label>
                                                <input class="form-control" name="user_id" value="{{$order->user->user_id}}" placeholder="Customer Id" readonly/>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="customer-id">Customer Name <sup style="color:red">*</sup></label>
                                                <input class="form-control" name="name" value="{{$order->user->user_name}}" placeholder="Customer Name"  readonly/>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="customer-id">Mobile Number <sup style="color:red">*</sup></label>
                                                <input class="form-control" name="mobile" value="{{$order->user->user_mobile}}" placeholder="Mobile Number" readonly/>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="customer-id">Email <sup style="color:red">*</sup></label>
                                                <input class="form-control" name="email" value="{{$order->user->email}}" placeholder="Email" readonly/>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="customer-id">Address <sup style="color:red">*</sup></label>
                                                <input class="form-control" name="address" value="{{$order->user->personal->address}}" placeholder="Address" readonly/>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="customer-id">City <sup style="color:red">*</sup></label>
                                                <input class="form-control" name="city" value="{{$order->user->personal->city}}" placeholder="City" readonly/>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="customer-id">Postal Code<sup style="color:red">*</sup></label>
                                                <input class="form-control" name="postal_code" value="{{$order->user->personal->postal_code}}" placeholder="Postal Code" readonly/>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="customer-id">Dist <sup style="color:red">*</sup></label>
                                                <input class="form-control" name="dist" value="{{$order->user->personal->dist}}" placeholder="Dist" readonly/>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="customer-id">State <sup style="color:red">*</sup></label>
                                                <input class="form-control" name="state" value="{{$order->user->personal->state}}" placeholder="State" readonly/>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="customer-id">Country <sup style="color:red">*</sup></label>
                                                <input class="form-control" name="country" value="{{$order->user->personal->country}}" placeholder="Country" readonly/>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-4">
                                            <div class="form-group">
                                                <label for="customer-id">Order Id <sup style="color:red">*</sup></label>
                                                <input class="form-control" name="orderid" value="{{$order->order_id}}" placeholder="OrderId" readonly/>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <hr class="invoice-spacing" />
                                <div class="table-responsive">
                                    <table class="table table-hover-animation" id="orderItemViewerTable">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Product Name</th>
                                                <th>Product Code</th>
                                                <th>Price</th>
                                                <th>Qty.</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($order->items as $item)
                                                <tr>
                                                    <td>
                                                        <img src="{{ asset('uploads/products/'.$item->product->image) }}" class="rounded-circle" width="50px"/>
                                                    </td>
                                                    <td>{{$item->product->name}}</td>
                                                    <td>{{$item->product->product_code}}</td>
                                                    <td>₹{{number_format(($item->price + $item->price * $item->tax/100)*$item->qty, 2)}}</td>
                                                    <td>{{$item->qty}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Header ends -->


                            <hr class="invoice-spacing mt-0" />

                            <div class="card-body invoice-padding py-0">
                                <!-- Invoice Note starts -->
                                <div class="row mb-3 mt-2">
                                    <div class="col-md-6 col-lg-6 col-12"></div>
                                    <div class="col-md-6 col-lg-6 col-12">
                                        <form method="post" action="{{ url('/user/franchisee/verify-otp-and-delivered') }}">
                                            @csrf
                                            <input type="hidden" value="{{$order->id}}" name="id" hidden>
                                            <div class="row">
                                                <div class="col-12 col-lg-7 col-md-7">
                                                    <input type="text" class="form-control" name="otp" placeholder="Unique Id" required>
                                                    @if($errors->has('otp'))
                                                        <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                            <strong>{{ $errors->first('otp') }}</strong>
                                                        </p>
                                                    @endif
                                                </div>
                                                <div class="col-12 col-lg-5 col-md-5">
                                                    <button type="submit" class="btn btn-primary float-right">Verify & Delivered</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Invoice Note ends -->
                            </div>
                        </div>
                    </div>
                    <!-- Invoice Add Left ends -->
                @endif
            </div>
        </div>
        
    </div>
</div>
<!-- END: Content-->    
@endsection