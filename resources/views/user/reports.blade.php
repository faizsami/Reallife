@extends('layouts.user')
@section('page_name')
    {{$name}}
@endsection
@section('content')
@include('partials.errors')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/vendors.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/pickers/pickadate/pickadate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugins/forms/pickers/form-pickadate.css') }}">
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
                        <h2 class="content-header-title float-left mb-0">{{$name}}</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/user/dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">{{$name}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            @if($type == 'my_gen_bonus')
           <!--/ genartion Performance Bonus -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card p-1">
                            <div class="card-header">
                                <h4 class="card-title"> Generation Performance Bonus</h4>                   
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-6"></div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <form action="" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-4">
                                                <input type="text" id="fp-default" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" name="from" required>
                                            </div>
                                            <div class="col-4">
                                                <input type="text" id="fp-default" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" name="to" required>
                                            </div>
                                            <div class="col-4">
                                                <input type="submit" class="btn btn-gradient-primary" placeholder="Search" value="Search">
                                            </div>
                                    </form>
                                </div>
                            </div> 
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="bvReportTable">
                                        <thead>
                                            <th>#</th>
                                            <th>Date</th>                                           
                                            <th>Amount</th>
                                            <th>Order Id</th>
                                            <th>Rank</th>
                                            
                                        </thead>
                                        <tbody>
                                            @php($i=1)
                                            @foreach($reports as $report)
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td>{{ $report['created_at'] }}</td>
                                                   
                                                    <td>Rs.{{ $report['amount'] }}</td>
                                                    <td>{{ $report['order_id'] }}</td>
                                                    <td>{{ $report['rank'] }}</td>
                                                   
                                                </tr>
                                                @php($i++)
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <th>#</th>
                                            <th>Date</th>                                           
                                            <th>Amount</th>
                                            <th>Order Id</th>
                                            <th>Rank</th>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endif
            <!--/ genartion Performance Bonus -->
            @if($type == 'bv_report')
                <!-- BV REPORT -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card p-1">
                                <div class="card-header">
                                    <h4 class="card-title"> BV REPORT</h4>                   
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-6"></div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <form action="" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-4">
                                                    <input type="text" id="fp-default" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" name="from" required>
                                                </div>
                                                <div class="col-4">
                                                    <input type="text" id="fp-default" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" name="to" required>
                                                </div>
                                                <div class="col-4">
                                                    <input type="submit" class="btn btn-gradient-primary" placeholder="Search" value="Search">
                                                </div>
                                        </form>
                                    </div>
                                </div> 
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table" id="monthlyIncomeTable">
                                            <thead>
                                                <th>#</th>
                                                <th>Date</th>                                           
                                                <th>Order Id</th>
                                                <th>Item</th>
                                                <th>Qty</th>
                                                <th>BV</th>
                                            </thead>
                                            <tbody>
                                                @php($i=1)
                                                @foreach($reports as $report)
                                                    <tr>
                                                        <td>{{$i}}</td>
                                                        <td>{{ $report['date'] }}</td>
                                                        <td>{{ $report['order_id'] }}</td>
                                                        <td>{{ $report['item_name'] }}</td>
                                                        <td>{{ $report['qty'] }}</td>
                                                        <td>{{ number_format($report['bv'], 2) }}</td>
                                                    </tr>
                                                    @php($i++)
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <th>#</th>
                                                <th>Date</th>                                           
                                                <th>Order Id</th>
                                                <th>Items</th>
                                                <th>Qty</th>
                                                <th>BV</th>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ BV REPORT -->
            @endif

            @if($type == 'monthly_incentive')
                <!-- Monthly Incentive -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card p-1">
                                <div class="card-header">
                                    <h4 class="card-title">{{$name}}</h4>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-6"></div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <form action="" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-4">
                                                    <input type="text" id="fp-default" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" name="from" required>
                                                </div>
                                                <div class="col-4">
                                                    <input type="text" id="fp-default" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" name="to" required>
                                                </div>
                                                <div class="col-4">
                                                    <input type="submit" class="btn btn-gradient-primary" placeholder="Search" value="Search">
                                                </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table" id="monthlyIncentiveTable">
                                            <thead>
                                                <th>#</th>
                                                <th>Month</th>
                                               
                                                <th>Master Bonus</th>
                                                <th>S.Master Bonus</th>
                                                <th>Travel Fund Bonus</th>
                                                <th>Car Fund  Bonus</th>
                                                <th>House Fund Bonus</th>
                                                <th>Regal Fund Bonus</th>
                                                <th>Total Income</th>
                                            </thead>
                                            <tbody>
                                                @php($i=1)
                                                @foreach($reports as $report)
                                                @php($tb = $report->tb_total)
                                                @php($rp = $report->rp_total)
                                                @php($lb =  $report->lb_total)
                                                @php($cf =  $report->cf_total)
                                                @php($hf = $report->hf_total)
                                                @php($rf =  $report->rf_total)
                                                    <tr  class="odd">
                                                        <td>{{$i}}
                                                        </td>
                                                        <td>
                                                            <div class="media-body">
                                                                <h6 class="transaction-title text-dark">
                                                                    {{date('F Y', strtotime($report->created_at))}}
                                                                </h6>
                                                            </div>                                                        
                                                        </td>                                                   
                                                        <td>
                                                            <div class="media-body">
                                                                <h6 class="transaction-title text-dark">&#8377;
                                                                    {{number_format($report->tb_total, 2)}}
                                                                </h6>
                                                                <small class="text-danger"> {{$report->tb_value}}</small>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="media-body">
                                                                <h6 class="transaction-title text-dark">&#8377;{{number_format($rp, 2)}}</h6>
                                                                <small class="text-danger"> {{$report->rp_total}}</small>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="media-body">
                                                                <h6 class="transaction-title text-dark">&#8377;{{number_format($report->lb_total, 2)}}</h6>
                                                                <small class="text-danger"> {{$report->lb_value}}</small>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="media-body">
                                                                <h6 class="transaction-title text-dark">&#8377;{{number_format($report->cf_total, 2)}}</h6>
                                                                <small class="text-danger"> {{$report->cf_value}}</small>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="media-body">
                                                                <h6 class="transaction-title text-dark">&#8377;{{number_format($report->hf_total, 2)}}</h6>
                                                                <small class="text-danger"> {{$report->hf_value}}</small>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="media-body">
                                                                <h6 class="transaction-title text-dark">&#8377;{{number_format($report->rf_total, 2)}}</h6>
                                                                <small class="text-danger"> {{$report->rf_value}}</small>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="media-body">
                                                                <h4 class="transaction-title text-success">&#8377;{{ number_format($tb+$rp+$lb+$cf+$hf+$rf, 2)}}</h4>                                                           
                                                            </div>
                                                        </td>
                                                    </tr>                                                   
                                                    @php($i++)                                        
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <th>#</th>
                                                <th>Month</th>
                                                
                                                <th>Master Bonus</th>
                                                <th>S.Master Bonus</th>
                                                <th>Travel Fund Bonus</th>
                                                <th>Car Fund  Bonus</th>
                                                <th>House Fund Bonus</th>
                                                <th>Regal Fund Bonus</th>
                                                <th>Total Income</th>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Monthly Incentive -->
            @endif

            @if($type == 'monthly_incentive')
                <!-- Foundation Incentive -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card p-1">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        @if($type == 'monthly_incentive')
                                            Active Manager Bonus
                                        @endif
                                    </h4>
                                </div>                                
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table" id="foundationIncomeTable">
                                            <thead>
                                                <th>#</th>
                                                <th>Self BV</th>                                           
                                                <th>Group BV</th>
                                                <th>Bonus (Amount)</th>
                                            </thead>
                                            <tbody>
                                                @php($i = 1)
                                                @foreach($activeDirectors as $director)
                                                    <tr>
                                                        <td>{{$i}}</td>
                                                        <td>{{$director->self_bv}}</td>
                                                        <td>{{$director->group_bv}}</td>
                                                        <td>{{$director->bonus}}</td>
                                                    </tr>
                                                @endforeach                                                                                                                                         
                                            </tbody>
                                            <tfoot>
                                                <th>#</th>
                                                <th>Self BV</th>                                           
                                                <th>Group BV</th>
                                                <th>Bonus (Amount)</th>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Foundation Incentive -->
            @endif
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
<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('assets/vendors/js/pickers/pickadate/picker.js') }}"></script>
<script src="{{ asset('assets/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
<script src="{{ asset('assets/vendors/js/pickers/pickadate/picker.time.js') }}"></script>
<script src="{{ asset('assets/vendors/js/pickers/pickadate/legacy.js') }}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Page JS-->
<script src="{{ asset('assets/js/scripts/forms/pickers/form-pickers.js') }}"></script>
<!-- END: Page JS-->
<!-- BEGIN: Page JS-->
<script src="{{ asset('assets/js/scripts/tables/table-datatables-basic.js') }}"></script>
<!-- END: Page JS-->
<script>
    $(document).ready(function() {
        $('#foundationIncomeTable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            responsive: true
        } );

        $('#monthlyIncomeTable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            responsive: true
        } );

        $('#monthlyIncentiveTable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            responsive: true
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