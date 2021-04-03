@extends('layouts.employee')
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
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Franchisee Packages</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/employee/franchisee-packages') }}">Packages</a>
                                </li>
                                <li class="breadcrumb-item active">Packages's Lists
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
                                <h4 class="card-title"> Package's List</h4>
                                <a href="#" onclick="event.preventDefault();" data-toggle="modal" data-target="#addpackagemodal" class="btn btn-primary float-right"><i data-feather='plus'></i> Add Package</a>
                            </div>
                            <table class="table" id="franchisePackageTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Package Name</th>
                                        <th>Amount</th>
                                        <th>Extra Product (%)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)
                                    @foreach($packages as $package)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$package->name}}</td>
                                            <td>{{$package->amount}}</td>
                                            <td>{{$package->extra}}</td>
                                            <td>
                                                @if($package->status == 0)
                                                    <a href="{{ url('/employee/franchisee-package-status/'.$package->id.'/1') }}" class="text-danger" title="Inactive" data-toggle="tooltip"><i data-feather='eye-off'></i></a>
                                                @else
                                                    <a href="{{ url('/employee/franchisee-package-status/'.$package->id.'/0') }}" class="text-success" title="Active" data-toggle="tooltip"><i data-feather='eye'></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                        @php($i++)
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <th>#</th>
                                    <th>Package Name</th>
                                    <th>Amount</th>
                                    <th>Extra Product (%)</th>
                                    <th>Action</th>
                                </tfoot>
                            </table>
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
<div class="modal fade text-left" id="addpackagemodal" tabindex="-1" aria-labelledby="addpackagemodal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel33">Add Package</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form method="post" action="{{ url('/employee/add-franchisee-package') }}">
            @csrf            
          <div class="modal-body">
            <label>Package Name: </label>
            <div class="form-group">
                <input type="text" id="package_name_id" onchange="notNull($(this).attr('id'))" class="form-control" name="package_name" autocomplete="off" placeholder="Package Name" >                
            </div>

            <label>Package Amount: </label>
            <div class="form-group">
                <input type="text" id="package_amount_id" onchange="notNull($(this).attr('id'))" class="form-control" name="package_amount" autocomplete="off" placeholder="25000">                
            </div>

            <label>Extra %: </label>
            <div class="form-group">
                <input type="number" onkeypress="if(this.value.length >= 2) return false;" min="1" max="100" class="form-control" name="package_extra" placeholder="7">
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
            <button id="sub_btn_modal" type="submit" class="btn btn-primary waves-effect waves-float waves-light">Add Package</button>
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
        $('#franchisePackageTable').DataTable( {
            "order": [[ '1', "desc" ]],
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