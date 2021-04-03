@extends('layouts.employee')
@section('page_name', 'Withdraw Request')
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
                        <h2 class="content-header-title float-left mb-0">Withdraw Request</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/employee/withdraw-request') }}">Requests</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Withdraw Requests
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
                                <h4 class="card-title"> Withdraw Requests</h4>                                
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="fundRequestTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>Member</th>
                                                <th>Bank Name</th>
                                                <th>Branch</th>
                                                <th>IFSC Code</th>
                                                <th>Account Number</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($i=count($requests))
                                            @foreach($requests as $request)
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td>{{$request->created_at}}</td>
                                                    <td>
                                                        <div class="media-body">
                                                            <h6 class="transaction-title text-dark">{{$request->user->user_name}}</h6>
                                                            <small>({{$request->user->user_id}})</small>
                                                        </div>                                                        
                                                    </td>
                                                    <td>
                                                        <span class="text-uppercase">
                                                            {{$request->user->bank->bank_name}}
                                                        </span>
                                                    </td>

                                                    <td>
                                                        <span class="text-uppercase">
                                                            {{$request->user->bank->branch_name}}
                                                        </span>
                                                    </td>

                                                    <td>
                                                        <span class="text-uppercase">
                                                            {{$request->user->bank->ifsc_code}}
                                                        </span>
                                                    </td>

                                                    <td>
                                                        <span class="text-uppercase">
                                                            {{$request->user->bank->account_number}}
                                                        </span>
                                                    </td>
                                                    <td>₹{{number_format($request->amount, 2)}}</td>
                                                    <td>
                                                        @if($request->status == 0)
                                                            <span class="badge badge-warning">Pending<span>
                                                        @elseif($request->status == 1)
                                                            <span class="badge badge-success">Successed<span>
                                                        @elseif($request->status == 2)
                                                            <span class="badge badge-danger">Failed<span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($request->status != 1)
                                                            <div class="btn-group">
                                                                <a class="dropdown-toggle hide-arrow" data-toggle="dropdown">                                                                
                                                                    <i data-feather='more-vertical'></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a href="{{ url('/employee/withdraw-request/accept/'.$request->id) }}"  class="dropdown-item" >
                                                                        <i data-feather='check-square'></i>
                                                                        Accept
                                                                    </a>                                                                

                                                                    <a href="{{ url('/employee/withdraw-request/decline/'.$request->id) }}" class="dropdown-item">
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
                                            <th>Member</th>
                                            <th>Bank Name</th>
                                            <th>Branch</th>
                                            <th>IFSC Code</th>
                                            <th>Account Number</th>
                                            <th>Amount</th>
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