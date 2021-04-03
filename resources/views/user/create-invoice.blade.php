@extends('layouts.user')
@section('page_name', 'Invoice')
@section('content')
@include('partials.errors')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/forms/select/select2.min.css') }}">
<!-- END: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/app-invoice.css') }}">
<style>
    .select2-container--default .select2-selection--single .select2-selection__arrow b{
        border-color:;
        border-style:unset!important;
        border-width:0!important;
        height:12px!important;
        left:0!important;
        margin-left:-4px!important;
    }
</style>

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Create Invoice</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/user/dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('/user/franchisee/invoices') }}">Invoices</a>
                                </li>
                                <li class="breadcrumb-item active">Create Invoice
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section class="invoice-add-wrapper">
                <div class="row invoice-add">
                    <!-- Invoice Add Left starts -->
                    <div class="col-xl-12 col-md-12 col-12">
                        <form method="post" action="{{ url('/user/franchisee/create-invoice') }}">
                            @csrf
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
                                                    <input class="form-control" onchange="FetchUserDetails($(this).val())" name="user_id" id="customer_id" placeholder="Customer Id" required />
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="customer-id">Customer Name <sup style="color:red">*</sup></label>
                                                    <input class="form-control" name="name" id="customer_name" placeholder="Customer Name" readonly/>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="customer-id">Mobile Number <sup style="color:red">*</sup></label>
                                                    <input class="form-control" name="mobile" id="mobile_number" placeholder="Mobile Number" readonly/>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="customer-id">Email <sup style="color:red">*</sup></label>
                                                    <input class="form-control" name="email" id="email" placeholder="Email" readonly/>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="customer-id">Address <sup style="color:red">*</sup></label>
                                                    <input class="form-control" name="address" id="address" placeholder="Address" readonly/>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="customer-id">City <sup style="color:red">*</sup></label>
                                                    <input class="form-control" name="city" id="city" placeholder="City" readonly/>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="customer-id">Postal Code<sup style="color:red">*</sup></label>
                                                    <input class="form-control" name="postal_code" id="postal_code" placeholder="Postal Code" readonly/>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="customer-id">Dist <sup style="color:red">*</sup></label>
                                                    <input class="form-control" name="dist" id="dist" placeholder="Dist" readonly/>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="customer-id">State <sup style="color:red">*</sup></label>
                                                    <input class="form-control" name="state" id="state" placeholder="State" readonly/>
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-group">
                                                    <label for="customer-id">Country <sup style="color:red">*</sup></label>
                                                    <input class="form-control" name="country" id="country" placeholder="Country" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <hr class="invoice-spacing" />
                                    <div class="row font-weight-bold h5">
                                        <div class="col-12 col-lg-3 col-md-3">
                                            Item
                                        </div>
                                        <div class="col-12 col-lg-2 col-md-2">
                                            Price
                                        </div>
                                        <div class="col-12 col-lg-1 col-md-1">
                                            Qty.
                                        </div>
                                        <div class="col-12 col-lg-1 col-md-1">
                                            GST %
                                        </div>
                                        
                                        <div class="col-12 col-lg-2 col-md-2">
                                            Tax Amount
                                        </div>
                                        <div class="col-12 col-lg-2 col-md-2">
                                            Net Amount
                                        </div>
                                        <div class="col-12 col-lg-1 col-md-1">
                                            Action
                                        </div>
                                    </div>

                                    <div class="row" id="invoice-items">
                                        
                                    </div>
                                </div>
                                <!-- Header ends -->

                                <!-- Product Details starts -->
                                <div class="card-body invoice-padding invoice-product-details">
                                    <form class="source-item">
                                        <div data-repeater-list="group-a">
                                            <div class="repeater-wrapper" data-repeater-item>
                                                <div class="row">
                                                    <div class="col-12 d-flex product-details-border position-relative pr-0">
                                                        <div class="row w-100 pr-lg-0 pr-1 py-2">
                                                            <div class="col-lg-3 col-12 mb-lg-0 mb-2 mt-lg-0 mt-2">
                                                                <p class="card-text col-title mb-md-50 mb-0">Products</p>
                                                                @php($products = App\Models\Product::where('user_id', Auth::user()->id)->get()->all())
                                                                <select class="invoiceto form-control" id="product_id" required>
                                                                    <option value="null" selected disabled>Select Product</option>
                                                                    @foreach($products as $product)
                                                                        <option value="{{$product->id}}">{{$product->name}}({{$product->product_code}})</option>
                                                                    @endforeach
                                                                </select>
                                                                <p class="invalid-feedback text-danger" id="productError" style="display:none!important;" role="alert">
                                                                    Please add product.!
                                                                </p>

                                                                <p class="invalid-feedback text-danger" id="stockError" style="display:none!important;" role="alert">
                                                                    You don't have enough stock.
                                                                </p>
                                                            </div>
                                                            <div class="col-lg-2 col-12 my-lg-0 my-2">
                                                                <p class="card-text col-title mb-md-2 mb-0">Price</p>
                                                                <input type="text" class="form-control product_price" id="price_id" value="" placeholder="0" readonly/>
                                                                <p class="invalid-feedback text-danger" id="priceError" style="display:none!important;" role="alert">
                                                                    Price could not be null.!
                                                                </p>
                                                            </div>
                                                            <div class="col-lg-1 col-12 my-lg-0 my-2">
                                                                <p class="card-text col-title mb-md-2 mb-0">Qty</p>
                                                                <input type="number" class="form-control" id="qty_id" value="0" placeholder="1" onkeyup="qtychanged()"/>
                                                                <p class="invalid-feedback text-danger" id="qtyError" style="display:none!important;" role="alert">
                                                                    Please add quantity.!
                                                                </p>
                                                            </div>
                                                            <div class="col-lg-2 col-12 my-lg-0 my-2">
                                                                <p class="card-text col-title mb-md-2 mb-0">GST %</p>
                                                                <input type="number" class="form-control" id="tax_id" value="0" placeholder="0" readonly/>                                                            
                                                            </div>                                                            
                                                            <div class="col-lg-2 col-12 my-lg-0 my-2">
                                                                <p class="card-text col-title mb-md-2 mb-0">Tax Amount</p>
                                                                <input type="number" class="form-control" id="tax_amt" value="0" placeholder="0" readonly/>                                                            
                                                            </div>
                                                            <div class="col-lg-2 col-12 mt-lg-0 mt-2">
                                                                <p class="card-text col-title mb-md-50 mb-0">Price</p>
                                                                <input type="text" class="form-control" id="price_net" value="" placeholder="0" readonly/>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-column align-items-center justify-content-between border-left invoice-product-actions py-50 px-25">
                                                            <i data-feather="x" class="cursor-pointer font-medium-3" data-repeater-delete></i>                                                       
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-12 px-0">
                                                <button type="button" class="btn btn-primary btn-sm btn-add-new" onclick="addItem()">
                                                    <i data-feather="plus" class="mr-25"></i>
                                                    <span class="align-middle">Add Item</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- Product Details ends -->

                                <!-- Invoice Total starts -->
                                <div class="card-body invoice-padding">
                                    <div class="row invoice-sales-total-wrapper">
                                        <div class="col-md-5 col-lg-5 col-12 order-md-1 order-2 mt-md-0 mt-3">
                                            @if(count($errors) > 0)
                                                <div class="alert alert-danger p-2">
                                                    <ul>
                                                    @foreach($errors->all() as $error)
                                                    <li>{{ $error }} </li>
                                                    @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-6 d-flex justify-content-end order-md-2 order-1">
                                            <div class="invoice-total-wrapper">
                                                <div class="invoice-total-item">
                                                    <p class="invoice-total-title">Subtotal:</p>
                                                    <p class="invoice-total-amount" id="subtotal_ids">0</p>
                                                </div>
                                                <hr class="my-50" />
                                                <div class="invoice-total-item">
                                                    <p class="invoice-total-title">Grand Total:</p>
                                                    <p class="invoice-total-amount" id="total_amt">0</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Invoice Total ends -->

                                <hr class="invoice-spacing mt-0" />

                                <div class="card-body invoice-padding py-0">
                                    <!-- Invoice Note starts -->
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary float-right">Create Invoice</button>
                                        </div>
                                    </div>
                                    <!-- Invoice Note ends -->
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Invoice Add Left ends -->
                </div>                
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->



<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('assets/vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
<!-- END: Page Vendor JS-->



<!-- BEGIN: Page JS-->
<script src="{{ asset('assets/js/scripts/pages/app-invoice.js') }}"></script>
<!-- END: Page JS-->

<script>
    function FetchUserDetails(id)
    {
        //calling ajax
        $.ajax({
        type:'get',
        url:'/get-user-details-for-invoice',
        data:"_token=d<?php echo csrf_token(); ?>&id="+id+"",
        success:function(response) 
        {
            if(response.status == 1)
            {
                var data = response.data;
                $('#customer_name').val(data.name);
                $('#customer_name').val(data.name);
                $('#mobile_number').val(data.mobile);
                $('#email').val(data.email);
                $('#address').val(data.address);
                $('#city').val(data.city);
                $('#dist').val(data.dist);
                $('#postal_code').val(data.postal_code);
                $('#state').val(data.state);
                $('#country').val(data.country);
            }
            else
            {
                $('#customer_name').val('');
                $('#customer_name').val('');
                $('#mobile_number').val('');
                $('#email').val('');
                $('#address').val('');
                $('#city').val('');
                $('#dist').val('');
                $('#postal_code').val('');
                $('#state').val('');
                $('#country').val('');
                alert(response.data);                
            }                              
        },
        error:function(error)
        {
            alert(response.data);//$('#sub_category_id').append('<option class="custom_option" value="" selected disabled>There is an error.</option>');
        }
        });
    }
    //Clear double space
    function clearmultispace(value)
    {
      var str = value;
      str = str.replace(/  +/g, ' ');
      return str;
    }

    var select2 = $('.invoiceto');
    var subtotal = 0;
    var count = 0;

    select2.change(function () {
    var id = $(this).val();
    //calling ajax
    $.ajax({
      type:'get',
      url:'/get-product-detail-by-id',
      data:"_token=d<?php echo csrf_token(); ?>&id="+id+"",
      success:function(response) 
      {
        var price = response.data.sell_price; 
        var gst = response.data.tax;
        var tax = ((price * gst) / 100);
        var net_prices = price + tax;

        $('#price_id').val(price);
        $('#tax_id').val(gst);
        $('#qty_id').val(1);
        $('#tax_amt').val(tax);
        $('#price_net').val(net_prices);
      },
      error:function(error)
      {
          
      }
    });
  });

    function addItem()
    {
        var product = clearmultispace($('#product_id option:selected').val());
        $.ajax({
            type:'get',
            url:'/get-product-detail-by-id',
            data:"_token=d<?php echo csrf_token(); ?>&id="+product+"",
            success:function(response) 
            {
                var stock = response.data.stock;
                addItemV(stock);
            },
            error:function(error)
            {
                
            }
        });
    }

    function addItemV(stock)
    {
        var parent = $('#invoice-items'),
        product = clearmultispace($('#product_id option:selected').val()), //string

        price = parseInt($('#price_id').val()),
        qty = parseInt($('#qty_id').val()),
        gst = parseInt($('#tax_id').val()),
        tax = parseInt($('#tax_amt').val()),
        net_price = parseInt($('#price_net').val()),
        
        row = count,
        next_row = row + 1;
        newRow = 'item'+ next_row,
        rowClass = "$('."+newRow+"')";

        if(product.length < 0)
            $('#productError').show();
        else if(price.length <= 0 | price <= 0)
            $('#priceError').show();
        else if(qty.length <= 0 | qty <= 0)
            $('#qtyError').show();
        else if(stock <= 0)
        {
            $('#stockError').show();
        }
        else
        {
            subtotal += net_price;
            var html = '<div class="col-12 col-lg-3 col-md-3 mt-1 '+newRow+'"><input type="text" class="form-control" name="product['+count+']" value="'+product+'" readonly></div><div class="col-12 col-lg-2 col-md-2 mt-1 '+newRow+'"><input type="text" class="form-control" name="price['+count+']" id="item_price_id'+row+'" value="'+price+'" readonly></div><div class="col-12 col-lg-1 col-md-1 mt-1 '+newRow+'"><input type="text" class="form-control" name="qty['+count+']" value="'+qty+'" readonly></div><div class="col-12 col-lg-1 col-md-1 mt-1 '+newRow+'"><input type="text" class="form-control" name="gst['+count+']" value="'+gst+'" readonly></div><div class="col-12 col-lg-2 col-md-2 mt-1 '+newRow+'"><input type="text" class="form-control" name="tax_amt['+count+']" value="'+tax+'" readonly></div><div class="col-12 col-lg-2 col-md-2 mt-1 '+newRow+'"><input type="text" class="form-control" name="net_price['+count+']" value="'+net_price+'" readonly></div><div class="col-12 col-md-1 col-lg-1 mt-1 '+newRow+'"><button onclick="'+rowClass+'.remove(); removeItem('+net_price+')" class="btn btn-danger">X</button></div>';
            parent.append(html);
            
            $('#price_id').val('');
            $('#qty_id').val('');
            $('#price_net').val('');
            $('#tax_amt').val('');
            $('#tax_id').val('');
            $('#productError').hide();
            $('#priceError').hide();
            $('#qtyError').hide();
            $('#stockError').hide();


            $('#subtotal_ids').text('₹'+subtotal+'.00');
            $('#total_amt').text('₹'+subtotal+'.00');
            count++;
        }
    }

    function qtychanged()
    {
        var price = parseInt($('#price_id').val()),
        qty = $('#qty_id').val() == '' ? 0 : parseInt($('#qty_id').val()),        
        gst = parseInt($('#tax_id').val()),
        tax = (price * gst / 100) * qty;
        price = price * qty;
        price = price + tax;
        if(qty != 0)
        {
            var net_price = $('#price_net').val(price);
        }
        else
        {
            var net_price = $('#price_net').val(0);
        }        
    }

    function removeItem(price)
    {
        subtotal -= price;        
        var text = '₹'+subtotal+'.00';
        $('#subtotal_ids').text(text);
        $('#total_amt').text(text);
    }
</script>
@endsection