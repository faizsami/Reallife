@extends('layouts.user')
@section('page_name', 'Withdraw')
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
                <div class="content-header-left col-md-12 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Withdraw</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/login') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ url('/user/withdraw') }}">Withdraw</a>
                                    </li>
                                    <li class="breadcrumb-item active">Withdraw
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div><br>

            <div class="content-detached">
                <div class="content-body">
                    <!--BEGIN: Money/Fund Request Table -->
                    <section id="basic-datatable">
                        <div class="row">
                            <div class="col-12">
                                <div class="card p-1">
                                    <div class="card-header">
                                        <h4 class="card-title">Withdraw Request's</h4>
                                        <a href="#" data-toggle="modal" data-target="#sendWithdrawalRequest" class="btn btn-icon btn-primary mt-1 float-right" >
                                            <i data-feather='send'></i> 
                                            Request Withdraw
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table" id="fundRequestTable">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Date</th>
                                                        <th>Amount</th>
                                                        <th>TDS</th>
                                                        <th>Admin Charges</th>
                                                        <th>Net Amount</th>
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
                                                            <td>{{number_format($request->amount, 2)}}</td>
                                                            <td>
                                                                @php($tdss = App\Models\AdminSetting::get()->first()->tds/100)
                                                                @php($tds = $request->amount * $tdss)
                                                                {{number_format($tds, 2)}}
                                                            </td>
                                                            <td>
                                                                @php($ads = App\Models\AdminSetting::get()->first()->admin_charge/100)
                                                                @php($ad = $request->amount * $ads)
                                                                {{number_format($ad, 2)}}
                                                            </td>
                                                            <td>                                                                
                                                                {{number_format($request->amount - $tds - $ad, 2)}}
                                                            </td>
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
                                                                @if($request->status == 0)
                                                                    <a href="{{url('/user/withdraw/delete/'.$request->id)}}"  class="text-danger">
                                                                        <i data-feather='trash'></i>
                                                                    </a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @php($i--)
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <th>#</th>
                                                    <th>Date</th>
                                                    <th>Amount</th>
                                                    <th>TDS</th>
                                                    <th>Admin Charges</th>
                                                    <th>Net Amount</th>
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
                    <!--/END: Money/Fund Request Table -->

                </div>
            </div>
            
        </div>
    </div>
    <!-- END: Content-->

    <!-- BEGIN: Send Money Model-->
    <div class="modal fade text-left" id="sendWithdrawalRequest" tabindex="-1" aria-labelledby="sendWithdrawalRequest" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel33">Withdraw Request</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <form method="post" action="{{ url('/user/withdraw/request') }}" id="sendwithdrawRequest">
                @csrf
                <div class="modal-body">
                    <label>Wallet Balance: </label>
                    <div class="form-group">
                        <input type="text" id="balanceWallet" value="{{Auth::user()->wallet->balance}}" class="form-control" readonly/>
                        @if($errors->has('add_stock'))
                            <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                <strong>{{ $errors->first('add_stock') }}</strong>
                            </p>
                        @endif
                    </div>
                    <label>Withdraw Amount: </label>
                    <div class="form-group">
                        <input onkeypress="return isNumberKey(event)" type="text" id="amountId" maxlength="100" class="form-control" name="amount" required/>
                        <p class="invalid-feedback text-danger" style="display:none!important;" id="amtError" role="alert">
                            <strong>Oops.! </strong>Please enter valid amount.
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-6 col-md-9 col-lg-9 text-warning">
                            <span style="font-size:11px!important;"><strong><sup>*</sup>Note:</strong> Min withdrawal amount should be INR 500.00</span>
                        </div>
                        <div class="col-6 col-md-3 col-lg-3">
                            <button id="sub_btn_modal" class="btn btn-primary waves-effect waves-float waves-light" onclick="event.preventDefault();sendWithdraw()">Submit</button>
                        </div>
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
        function sendWithdraw()
        {
            var form = $('#sendwithdrawRequest'),
            balance = parseInt($('#balanceWallet').val()),
            amount = parseInt($('#amountId').val()),
            error = $('#amtError');

            if(balance >= amount && amount >= 500)
            {
                form.submit();
                error.hide(500);
            }
            else
            {
                error.hide(500);
                setTimeout(() => {
                    error.show(500);
                }, 100); 
            }
        }

        function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : evt.keyCode;            
            if (charCode > 31 && (charCode < 48 || charCode > 57))
            {
                return false;
                
            }
            else
            {
                return true;
            }
          }
    </script>
@endsection