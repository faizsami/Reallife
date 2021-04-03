@extends('layouts.user')
@section('page_name', 'Add BV')
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
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/pickers/pickadate/pickadate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugins/forms/pickers/form-pickadate.css') }}">
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Franchisee Request</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/user/dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Request
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!--BEGIN: Money/Fund Request Table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card p-1">
                            <div class="card-header">
                                <h4 class="card-title"> Franchisee Request's History</h4>
                                <a href="#" onclick="event.preventDefault();" class="btn btn-primary" data-toggle="modal" data-target="#sendFranchiseeRequest"><i data-feather='send'></i> Send Request</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="franchiseerequesttable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>Transaction Id</th>
                                                <th>Transaction Date</th>
                                                <th>Package</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($i=count($list))
                                            @foreach($list as $req)
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td>{{$req->created_at}}</td>
                                                    <td>{{$req->transaction_id}}</td>
                                                    <td>{{$req->transaction_date}}</td>
                                                    <td>
                                                        {{$req->franchisee_package->extra}} % extra ( {{$req->franchisee_package->name}} - ₹{{number_format($req->franchisee_package->amount, 2)}} )
                                                    </td>
                                                    <td>
                                                        @if($req->status == 0)
                                                            <span class="badge badge-warning">Pending<span>
                                                        @elseif($req->status == 1)
                                                            <span class="badge badge-success">Successed<span>
                                                        @elseif($req->status == 2)
                                                            <span class="badge badge-danger">Failed<span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @php($i--)
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Transaction Id</th>
                                            <th>Transaction Date</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/END: Money/Fund Request Table -->
            
            <!-- BEGIN: Send Money Model-->
            <div class="modal fade text-left" id="sendFranchiseeRequest" tabindex="-1" aria-labelledby="sendFranchiseeRequest" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Franchisee Request</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    </div>                    
                    <form class="forms-sample" method="post" action="{{ url('/user/franchisee/requests') }}">
                        @csrf
                        <div class="modal-body">
                            <label>Transaction Id: </label>
                            <div class="form-group">
                                <input type="id" class="form-control" name="transaction_id" placeholder="TXN0022422010" autocomplete="off" required>
                                @if($errors->has('transaction_id'))
                                    <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                        <strong>{{ $errors->first('transaction_id') }}</strong>
                                    </p>
                                @endif
                            </div>
        
                            <label>Transaction Date: </label>
                            <div class="form-group">
                                <input type="text" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" id="fp-default" name="transaction_date" required>
                                @if($errors->has('transaction_date'))
                                    <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                        <strong>{{ $errors->first('transaction_date') }}</strong>
                                    </p>
                                @endif
                            </div>
        
                            <label>Franchisee Package: </label>
                            <div class="form-group">
                                <select class="form-control" name="package">
                                    <option value="" selected disabled>Select Package</option>
                                    @foreach($packages as $package)
                                        <option value="{{$package->id}}">Get {{$package->extra}} % extra ( {{$package->name}} - ₹{{number_format($package->amount, 2)}} )</option>
                                    @endforeach
                                </select>
                                @if($errors->has('package'))
                                    <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                        <strong>{{ $errors->first('package') }}</strong>
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button id="sub_btn_modal" type="submit" class="btn btn-primary waves-effect waves-float waves-light">Request</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
            <!-- END: Send Money Model-->
        </div>
    </div>
</div>
<!-- END: Content-->
<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('assets/vendors/js/pickers/pickadate/picker.js') }}"></script>
<script src="{{ asset('assets/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
<script src="{{ asset('assets/vendors/js/pickers/pickadate/picker.time.js') }}"></script>
<script src="{{ asset('assets/vendors/js/pickers/pickadate/legacy.js') }}"></script>
<script src="{{ asset('assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
<!-- END: Page Vendor JS-->
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

<!-- BEGIN: Page JS-->
<script src="{{ asset('assets/js/scripts/forms/pickers/form-pickers.js') }}"></script>
<!-- END: Page JS-->

<script>
    $(document).ready(function() {
        $('#franchiseerequesttable').DataTable( {
            "order": [[ '1', "desc" ]]
        } );
    } );        
</script>
@endsection