@extends('layouts.user')
@section('page_name', 'Franchisee Wallet')
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
    <div class="app-content content ecommerce-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Franchisee Wallet</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ url('/user/franchisee/wallet') }}">Wallet</a>
                                    </li>
                                    <li class="breadcrumb-item active">Franchisee Wallet
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>                    
                </div>
                <div class="col-md-3 col-12">
                    <a href="#" onclick="event.preventDefault();" class="btn btn-primary float-right" data-toggle="modal" data-target="#sendFranchiseeRequest"><i data-feather='send'></i> Send Request</a>
                </div>
            </div><br>

            <div class="content-detached">
                <div class="content-body">
                    <!-- Line Area Chart Card -->
                    <div class="row">

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header flex-column align-items-start pb-0">
                                    <div class="avatar bg-light-danger p-50 m-0">
                                        <div class="avatar-content">
                                            <i data-feather="briefcase" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="font-weight-bolder mt-1">₹ {{$balance}}.00</h2>
                                    <p class="card-text">Wallet Balance</p>
                                </div>
                                <div id="line-area-chart-3"></div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header flex-column align-items-start pb-0">
                                    <div class="avatar bg-light-primary p-50 m-0">
                                        <div class="avatar-content">
                                            <i data-feather="credit-card" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="font-weight-bolder mt-1">₹ {{$creditedBalance}}.00</h2>
                                    <p class="card-text">Credited</p>
                                </div>
                                <div id="line-area-chart-1"></div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header flex-column align-items-start pb-0">
                                    <div class="avatar bg-light-success p-50 m-0">
                                        <div class="avatar-content">
                                            <i data-feather="shopping-bag" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="font-weight-bolder mt-1">₹ {{$debitedBalance}}.00</h2>
                                    <p class="card-text">Debited</p>
                                </div>
                                <div id="line-area-chart-2"></div>
                            </div>
                        </div>                        

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header flex-column align-items-start pb-0">
                                    <div class="avatar bg-light-warning p-50 m-0">
                                        <div class="avatar-content">
                                            <i data-feather="award" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="font-weight-bolder mt-1">₹ {{number_format(Auth::user()->wallet->profit, 2)}}</h2>
                                    <p class="card-text">Total Profit</p>
                                </div>
                                <div id="line-area-chart-4"></div>
                            </div>
                        </div>
                        
                    </div>
                    <!--/ Line Area Chart Card -->

                    <!--BEGIN: Franchisee Request Table -->
                    <section id="basic-datatable">
                        <div class="row">
                            <div class="col-12">
                                <div class="card p-1">
                                    <div class="card-header">
                                        <h4 class="card-title"> Franchisee Request History</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table" id="franchiseerequesthistoryTable">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Date</th>
                                                        <th>Transaction Id</th>
                                                        <th>Transaction Date</th>
                                                        <th>Amount</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php($i=count($fundrequests))
                                                    @php($id = '')
                                                    @php($name = '')
                                                    @php($amount = '')
                                                    @foreach($fundrequests as $fundrequest)
                                                        <tr>
                                                            <td>{{$i}}</td>
                                                            <td>{{$fundrequest->created_at}}</td>
                                                            <td>{{$fundrequest->transaction_id}}</td>
                                                            <td>{{$fundrequest->transaction_date}}</td> 
                                                            <td>{{$fundrequest->amount}}</td> 
                                                            <td>
                                                                @if($fundrequest->status == 0)
                                                                    <span class="badge badge-warning">Pending<span>
                                                                @elseif($fundrequest->status == 1)
                                                                    <span class="badge badge-success">Successed<span>
                                                                @elseif($fundrequest->status == 2)
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
                    <!--/END: Franchisee Request Table -->

                    <!--BEGIN: Transaction Table -->
                    <section id="basic-datatable">
                        <div class="row">
                            <div class="col-12">
                                <div class="card p-1">
                                    <div class="card-header">
                                        <h4 class="card-title"> Transaction History</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table" id="transactiontable">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Date</th>
                                                        <th>Description</th>
                                                        <th>Debit</th>
                                                        <th>Credit</th>
                                                        <th>Balance</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php($i=count($transactions))
                                                    @php($balance = 0)
                                                    @foreach($transactions as $transaction)
                                                        <tr>
                                                            <td>{{$i}}</td>
                                                            <td>{{$transaction->created_at}}</td>
                                                            <td>{{$transaction->title}}</td>
                                                            <td>
                                                                @if($transaction->type == 0)
                                                                    {{$transaction->amount}}.00
                                                                @else
                                                                    0.00
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($transaction->type == 1)
                                                                    {{$transaction->amount}}.00
                                                                @else
                                                                    0.00
                                                                @endif
                                                            </td>
                                                            <td>
                                                                    @if($transaction->type == 0)
                                                                        @php($balance = $balance - $transaction->amount)                                                                        
                                                                    @elseif($transaction->type == 1)
                                                                        @php($balance = $balance + $transaction->amount)
                                                                    @endif
                                                                    {{$balance}}.00
                                                            </td>
                                                        </tr>
                                                        @php($i--)
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <th>#</th>
                                                        <th>Date</th>
                                                        <th>Description</th>
                                                        <th>Debit</th>
                                                        <th>Credit</th>
                                                        <th>Balance</th>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--/END: Transaction Table -->

                </div>
            </div>
            
        </div>
    </div>
    <!-- END: Content-->

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
    <!-- END: Send Money Model-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('assets/js/scripts/cards/card-statistics.js') }}"></script>
    <!-- END: Page JS-->
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
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('assets/vendors/js/pickers/pickadate/picker.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/pickers/pickadate/picker.time.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/pickers/pickadate/legacy.js') }}"></script>
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
            $('#franchiseerequesthistoryTable').DataTable( {
                "order": [[ '1', "desc" ]],
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            } );

            $('#transactiontable').DataTable( {
                "order": [[ '1', "desc" ]],
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
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
        function callmodal($id, $name, $amount)
        {
            $('#toId').val($id);
            $('#nameId').val($name);
            $('#amountId').val($amount);
        }
    </script>

@endsection