@extends('layouts.main')
@section('page_name', 'Products')
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
<style>
    /* The switch - the box around the slider */
    .switch {
    position: relative;
    display: inline-block;
    width: 50px;
    height: 24px;
    }

    /* Hide default HTML checkbox */
    .switch input {
    opacity: 0;
    width: 0;
    height: 0;
    }

    /* The slider */
    .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgb(236, 0, 0);
    -webkit-transition: .4s;
    transition: .4s;
    }

    .slider:before {
    position: absolute;
    content: "";
    height: 16px;
    width: 16px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
    }

    input:checked + .slider {
    background-color: #0ae64ce1;
    }

    input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
    border-radius: 34px;
    }

    .slider.round:before {
    border-radius: 50%;
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
                        <h2 class="content-header-title float-left mb-0">Products</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('/admin/products') }}">Products</a>
                                </li>
                                <li class="breadcrumb-item active">Product's Lists
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
                                <h4 class="card-title"> Product's List</h4>
                                <a href="{{ url('/admin/add-product') }}" class="btn btn-primary float-right"><i data-feather='plus'></i> Add Product</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="productTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Cat.</th>
                                                <th>Sub-Cat.</th>
                                                <th>P. Code</th>
                                                <th>Name</th>
                                                <th>Weight</th>
                                                <th>Price</th>
                                                <th>Sell Price</th>
                                                <th>Stock</th>
                                                <th>BV</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($i=1)
                                            @foreach($products as $product)
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td>
                                                        <img src="{{ asset('uploads/products/'.$product->image) }}" class="rounded-circle" width="50px"/>
                                                    </td>
                                                            <td>{{$product->category->title}}</td>
                                                            <td>{{$product->sub_category->title}}</td>
                                                            <td>{{$product->product_code}}</td>
                                                            <td>{{$product->name}}</td>
                                                            <td>{{$product->weight}}</td>
                                                            <td>{{$product->price}}</td>
                                                            <td>{{$product->sell_price}}</td>
                                                            <td>{{$product->stock}}</td>
                                                            <td>{{$product->bv}}</td>
                                                            <td>
                                                                @if($product->status == 0)
                                                                    <label class="switch">
                                                                        <input type="checkbox" checked onchange="window.location = '{{ url('/admin/product-status/'.$product->id.'/1') }}'">
                                                                        <span class="slider round"></span>
                                                                    </label>
                                                                @else
                                                                    <label class="switch">
                                                                        <input type="checkbox" onchange="window.location = '{{ url('/admin/product-status/'.$product->id.'/0') }}'">
                                                                        <span class="slider round"></span>
                                                                    </label>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <a class="dropdown-toggle hide-arrow" data-toggle="dropdown">                                                                
                                                                        <i data-feather='more-vertical'></i>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a href="{{ url('/admin/edit-product/'.$product->id) }}" class="dropdown-item">
                                                                            <i data-feather='edit'></i>
                                                                            Edit
                                                                        </a>

                                                                        <a href="#" onclick="callmodal('{{$product->id}}', '{{$product->name}}', '{{$product->stock}}')" data-toggle="modal" data-target="#addstockmodel" class="dropdown-item">
                                                                            <i data-feather='plus-square'></i>
                                                                            Add Stock
                                                                        </a>

                                                                        <a href="{{ url('/admin/delete-product/'.$product->id) }}" class="dropdown-item">
                                                                            <i data-feather='trash-2'></i>
                                                                            Delete
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                
                                                            </td>
                                                        </tr>
                                                        @php($i++)
                                                    @endforeach
                                        </tbody>
                                        <tfoot>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Cat.</th>
                                            <th>Sub-Cat.</th>
                                            <th>P. Code</th>
                                            <th>Name</th>
                                            <th>Weight</th>
                                            <th>Price</th>
                                            <th>Sell Price</th>
                                            <th>Stock</th>
                                            <th>BV</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tfoot>
                                    </table>
                                </div>
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


<!-- BEGIN: Add Stock Model-->
<div class="modal fade text-left" id="addstockmodel" tabindex="-1" aria-labelledby="addstockmodel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel33">Add Stock</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form method="post" action="{{ url('/admin/add-product-stock') }}">
            @csrf

            <input type="hidden" value="" name="id" id="product_id_modal" hidden>
          <div class="modal-body">
            <label>Product: </label>
            <div class="form-group">
                <input type="text" id="product_name_modal" onchange="notNull($(this).attr('id'))" class="form-control" name="product_name_modal" autocomplete="off" placeholder="Product Name" readonly>                
            </div>

            <label>Available Stock: </label>
            <div class="form-group">
                <input type="text" id="product_stock_modal" onchange="notNull($(this).attr('id'))" class="form-control" name="product_stock_modal" autocomplete="off" placeholder="Available Stock" readonly>                
            </div>

            <label>Add Stock: </label>
            <div class="form-group">
                <input type="text" id="add_stock_modal" onchange="notNull($(this).attr('id'))" maxlength="100" class="form-control" name="add_stock" autocomplete="off" placeholder="Add Stock">
                @if($errors->has('add_stock'))
                    <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                        <strong>{{ $errors->first('add_stock') }}</strong>
                    </p>
                @endif 

                <p class="invalid-feedback text-danger" id="modal_error" style="display:none!important;" role="alert">
                    <strong>Error.! </strong> Text fields could not be null.
                </p>
            </div>
          </div>
          <div class="modal-footer">
            <button id="sub_btn_modal" type="submit" class="btn btn-primary waves-effect waves-float waves-light">Add Stock</button>
          </div>
        </form>
      </div>
    </div>
</div>
<!-- END: Add Stock Model-->


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
    function callmodal($id, $name, $stock)
    {
        $('#product_id_modal').val($id);
        $('#product_name_modal').val($name);
        $('#product_stock_modal').val($stock);
    }
</script>
<script>
    $(document).ready(function() {
        $('#productTable').DataTable( {
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
@endsection