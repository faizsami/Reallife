@extends('layouts.user')
@section('page_name', 'Wallet')
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
    <div class="app-content content ecommerce-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Wallet</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ url('/user/wallet') }}">Wallet</a>
                                    </li>
                                    <li class="breadcrumb-item active">Wallet
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>                    
                </div>
                <div class="col-md-3 col-12">
                    <a href="{{ url('/user/request-fund') }}" data-toggle="tolltips" title="Request Money" class="btn btn-icon btn-primary mt-1 float-right" ><i data-feather='plus'></i> Request Money</a>
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
                                    <h2 class="font-weight-bolder mt-1">₹ {{number_format($balance, 2)}}</h2>
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
                                    <h2 class="font-weight-bolder mt-1">₹ {{number_format($creditedBalance, 2)}}</h2>
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
                                    <h2 class="font-weight-bolder mt-1">₹ {{number_format($debitedBalance, 2)}}</h2>
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
                                    <h2 class="font-weight-bolder mt-1">₹ {{number_format($reward, 2)}}</h2>
                                    <p class="card-text">Reward Balance</p>
                                </div>
                                <div id="line-area-chart-4"></div>
                            </div>
                        </div>
                        
                    </div>

                    <section id="basic-datatable">
                        <div class="row">
                            <div class="col-12">
                                <div class="card p-1">
                                    <div class="card-header">
                                        <h4 class="card-title"> Money Request History</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table" id="fundRequestTable">
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
                    <!--/END: Money/Fund Request Table -->

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
                                                                    {{number_format($transaction->amount,2)}}
                                                                @else
                                                                    0.00
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($transaction->type == 1)
                                                                    {{number_format($transaction->amount,2)}}
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
                                                                    {{number_format($balance,2)}}
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
    <div class="modal fade text-left" id="sendMoneyModel" tabindex="-1" aria-labelledby="sendMoneyModel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel33">Send Money</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <form method="post" action="{{ url('/user/send-money') }}">
                @csrf
                <div class="modal-body">
                    <label>To (Id): </label>
                    <div class="form-group">
                        <input type="text" id="toId" class="form-control" name="id" autocomplete="off" placeholder="Product Name" readonly>                
                    </div>

                    <label>To (Name): </label>
                    <div class="form-group">
                        <input type="text" id="nameId"  class="form-control" name="product_stock_modal" autocomplete="off" placeholder="Available Stock" readonly>                
                    </div>

                    <label>Amount: </label>
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
                    <button id="sub_btn_modal" type="submit" class="btn btn-primary waves-effect waves-float waves-light">Send Money</button>
                </div>
            </form>
        </div>
        </div>
    </div>
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

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('assets/js/scripts/tables/table-datatables-basic.js') }}"></script>
    <!-- END: Page JS-->
    <script>
        $(document).ready(function() {
            $('#transactiontable').DataTable( {
                "order": [[ '1', "desc" ]],
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );

            $('#fundRequestTable').DataTable( {
                "order": [[ '1', "desc" ]],
                dom: 'lBfrtip',
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
        function callmodal($id, $name, $amount)
        {
            $('#toId').val($id);
            $('#nameId').val($name);
            $('#amountId').val($amount);
        }
    </script>

@endsection