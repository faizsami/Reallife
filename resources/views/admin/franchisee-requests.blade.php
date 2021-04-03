@extends('layouts.main')
@section('page_name', 'Franchisee Requests')
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
                        <h2 class="content-header-title float-left mb-0">Franchisee Request</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('/admin/franchisee-request') }}">Requests</a>
                                </li>
                                <li class="breadcrumb-item active">Franchisee Requests
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
                                <h4 class="card-title"> Franchisee Requests</h4>                                
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="fundRequestTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>From (Id)</th>
                                                <th>From (Name)</th>
                                                <th>Transaction Id</th>
                                                <th>Transaction Date</th>
                                                <th>Package</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($i=count($list))
                                            @foreach($list as $req)
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td>{{$req->created_at}}</td>
                                                    <td>{{$req->user->user_id}}</td>
                                                    <td>{{$req->user->user_name}}</td>
                                                    <td>{{$req->transaction_id}}</td>
                                                    <td>{{$req->transaction_date}}</td>
                                                    <td>{{$req->franchisee_package->extra}} % extra ( {{$req->franchisee_package->name}} - ₹{{number_format($req->franchisee_package->amount, 2)}} )</td>
                                                    <td>
                                                        @if($req->status == 0)
                                                            <span class="badge badge-warning">Pending<span>
                                                        @elseif($req->status == 1)
                                                            <span class="badge badge-success">Successed<span>
                                                        @elseif($req->status == 2)
                                                            <span class="badge badge-danger">Failed<span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($req->status != 1)
                                                            <div class="btn-group">
                                                                <a class="dropdown-toggle hide-arrow" data-toggle="dropdown">                                                                
                                                                    <i data-feather='more-vertical'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a href="#" class="dropdown-item" data-toggle="modal" data-target="#sendMoneyModel" onclick="event.preventDefault(); callacceptmodal('{{ url('admin/accept-franchisee-request/'.$req->id) }}', '{{$req->transaction_id}}', '{{$req->transaction_date}}', '{{$req->franchisee_package->extra}} % extra ( {{$req->franchisee_package->name}} - ₹{{number_format($req->franchisee_package->amount, 2)}} )')">
                                                                        <i data-feather='check-square'></i>
                                                                        Accept
                                                                    </a>                                                                

                                                                    <a href="{{ url('/admin/decline-franchisee-request/'.$req->id) }}" class="dropdown-item">
                                                                        <i data-feather='trash-2'></i>
                                                                        Decline
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @php($i--)
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>From (Id)</th>
                                            <th>From (Name)</th>
                                            <th>Transaction Id</th>
                                            <th>Transaction Date</th>
                                            <th>Package</th>
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

<!-- BEGIN: Send Money Model-->
<div class="modal fade text-left" id="sendMoneyModel" tabindex="-1" aria-labelledby="sendMoneyModel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel33">Franchisee Request</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <form method="post" action="" id="modalForms">
            @csrf
            <div class="modal-body">
                <label>Transaction Id: </label>
                <div class="form-group">
                    <input type="text" id="tId" class="form-control" name="id" autocomplete="off" placeholder="Product Name" readonly>                
                </div>

                <label>Transaction Date: </label>
                <div class="form-group">
                    <input type="text" id="tDate"  class="form-control" name="product_stock_modal" autocomplete="off" placeholder="Available Stock" readonly>                
                </div>

                <label>Package: </label>
                <div class="form-group">
                    <input type="text" id="amountId" maxlength="100" class="form-control" name="amount" autocomplete="off" placeholder="Add Stock" readonly>
                    @if($errors->has('add_stock'))
                        <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                            <strong>{{ $errors->first('add_stock') }}</strong>
                        </p>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button id="sub_btn_modal" type="submit" class="btn btn-primary waves-effect waves-float waves-light">Accept</button>
            </div>
        </form>
    </div>
    </div>
</div>
<!-- END: Send Money Model-->

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
        $('#fundRequestTable').DataTable( {
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


    function callacceptmodal(url, txt, date, amt)
    {
        $('#tId').val(txt);
        $('#tDate').val(date);
        $('#amountId').val(amt);
        $('#modalForms').attr('action', url);
    }
</script>
@endsection