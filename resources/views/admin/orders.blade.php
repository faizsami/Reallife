@extends('layouts.main')
@section('page_name', 'Orders')
@section('content')
@include('partials.errors')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/vendors.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
<!-- END: Vendor CSS-->
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Orders</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('/admin/products') }}">Shoppings</a>
                                </li>
                                <li class="breadcrumb-item active">Order's Lists
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">            
            <!-- Basic table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card p-1">
                            <div class="card-header">
                                <h4 class="card-title"> Order's List</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table" id="orderTabledata">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Order</th>
                                            <th>Member</th>
                                            <th>Items</th>
                                            <th>Total Qty</th>
                                            <th>Price</th>
                                            <th>Payment Status</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i=count($orders))
                                        @foreach($orders as $order)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>
                                                    <div class="media-body">
                                                        <h6 class="transaction-title text-dark">{{ $order->order_id }}</h6>
                                                        <small>{{ $order->created_at }}</small>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="media-body">
                                                        <h6 class="transaction-title text-dark">{{ $order->user->user_name }}</h6>
                                                        <small>{{ $order->user->user_id }}</small><br>
                                                        @php($items = $order->items)
                                                        @php($productBV = 0)
                                                        @foreach($items as $item)
                                                            @php($temp = $item->product->bv * $item->qty)
                                                            @php($productBV += $temp)
                                                        @endforeach
                                                        <small><strong>Order BV: </strong>???{{ number_format($productBV, 2) }}</small>
                                                    </div>    
                                                </td>
                                                <td>{{ count($order->items) }}</td>
                                                <td>{{ $order->items()->sum('qty') }}</td>
                                                <td>
                                                    @php($amt = 0)
                                                    @php($tax = 0)
                                                    @foreach($order->items as $item)
                                                        @php($temp = $item->price * $item->qty)
                                                        @php($amt += $temp)
                                                        @php($tax += ($temp * $item->tax)/100)
                                                    @endforeach
                                                    ???{{ number_format(($amt + $tax), 2) }}
                                                </td>
                                                <td><p class="badge badge-success">Paid</p></td>
                                                <td>
                                                    <div class="media-body">
                                                        @if($order->status == 0)
                                                            <p class="badge badge-warning">Pending</p>
                                                        @elseif($order->status == 1)
                                                            <p class="badge badge-info">Dispatched</p>
                                                        @else
                                                            <p class="badge badge-success">Delivered</p>
                                                        @endif<br>
                                                        <small>
                                                            @if($order->type == '0')
                                                                By Admin
                                                            @elseif($order->type == 'local')
                                                             By Local Franchisee
                                                            
                                                            @else
                                                                By {{App\Models\User::where('user_id', $order->type)->get()->first()->user_name}}
                                                            @endif
                                                        </small><br>
                                                        <small>
                                                            {{$order->updated_at}}
                                                        </small>
                                                    </div>
                                                    
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a class="dropdown-toggle hide-arrow" data-toggle="dropdown">                                                                
                                                            <i data-feather='more-vertical'></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="#" onclick="event.preventDefault();callOrderItemViewer({{$order->id}});" data-toggle="modal" data-target="#orderItemViewer" class="dropdown-item">
                                                                <i data-feather='eye'></i>
                                                                View Items
                                                            </a>
                                                            <a href="{{ url('/user/orders/'.$order->id.'/print-invoice') }}" target="_blank" class="dropdown-item">
                                                                <i data-feather='download'></i>
                                                                Print Invoice
                                                            </a>

                                                            @if($order->status == 0)
                                                            <a href="{{ url('/admin/order-status/'.$order->id.'/1') }}" class="dropdown-item">
                                                                <i data-feather='gift'></i>
                                                                Dispatched
                                                            </a>
                                                            <a href="{{ url('/admin/order-status/'.$order->id.'/2') }}" class="dropdown-item">
                                                                <i data-feather='check-circle'></i>
                                                                Delivered
                                                            </a>
                                                            @elseif($order->status == 1)
                                                                <a href="{{ url('/admin/order-status/'.$order->id.'/2') }}" class="dropdown-item">
                                                                    <i data-feather='check-circle'></i>
                                                                    Delivered
                                                                </a>
                                                            @else

                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @php($i--)
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <th>#</th>
                                        <th>Order</th>
                                        <th>Member</th>
                                        <th>Items</th>
                                        <th>Total Qty</th>
                                        <th>Price</th>
                                        <th>Payment Status</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Basic table -->
        </div>
    </div>
</div>
<!-- END: Content-->


<!-- BEGIN: orderItemViewer Model-->
<div class="modal fade text-left" id="orderItemViewer" tabindex="-1" aria-labelledby="orderItemViewer" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">View Items</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">??</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover-animation" id="orderItemViewerTable">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Product Code</th>
                                <th>Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>
<!-- END: orderItemViewer Model-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/tables/datatable/responsive.bootstrap4.js') }}"></script>
<script src="{{ asset('assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/tables/datatable/jszip.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Page JS-->
<script src="{{ asset('assets/js/scripts/tables/table-datatables-basic.js') }}"></script>
<!-- END: Page JS-->

<script>
$(document).ready(function() {
    $('#orderTabledata').DataTable( {
        "order": [[ '0', "desc" ]],
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
    //add btn clas
    setTimeout(function() {
        $('.buttons-print').empty();
        $('.buttons-print').prepend("<i class='fas fa-print'></i><span> Print</span>");

        $('.buttons-pdf').empty();
        $('.buttons-pdf').prepend("<i class='fas fa-file-pdf'></i><span> PDF</span>");

        $('.buttons-excel').empty();
        $('.buttons-excel').prepend("<i class='fas fa-file-excel'></i><span> Excel</span>");

        $('.buttons-csv').empty();
        $('.buttons-csv').prepend("<i class='fas fa-file-csv'></i><span> CSV</span>");

        $('.buttons-copy').empty();
        $('.buttons-copy').prepend("<i class='fas fa-copy'></i><span> Copy</span>");

        $('.dt-button').attr('class', 'btn btn-gradient-primary bg-lighten-5 btn-sm mt-1');
    }, 0);
} );
</script>
<script>
    function callOrderItemViewer(order_id)
    {
        $('#orderItemViewerTable > tbody').empty();
        var url = '{{ asset('uploads/products') }}';

        //calling ajax
        $.ajax({
        type:'get',
        url:'/get-items-by-order-id',
        data:"_token=d<?php echo csrf_token(); ?>&order_id="+order_id+"",
        success:function(data) 
        {
            if(data.status == 1)
            {
                var json = data.data;
                for (var key in json) 
                {
                    if (json.hasOwnProperty(key)) 
                    {
                        //alert(json[key].product.name);
                        $('#orderItemViewerTable > tbody').append('<tr><td><img src="'+url+'/'+json[key].product.image+'" class="rounded-circle" width="50px"/></td><td>'+json[key].product.name+'</td><td>'+json[key].product.product_code+'</td><td>'+json[key].qty+'</td></tr>');
                    }
                } 
            }
            else
            {
                alert(data.status);
            }                              
        },
        error:function(error)
        {
            alert(data.status);//$('#sub_category_id').append('<option class="custom_option" value="" selected disabled>There is an error.</option>');
        }
        });
    }
</script>
@endsection