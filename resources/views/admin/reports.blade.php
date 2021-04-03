@extends('layouts.main')
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
            <!-- BV REPORT -->
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
            <!--/ BV REPORT -->
        @endif
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
                                        <table class="table" id="bvReportTable">
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
                                                        <td>
                                                            <div class="d-flex justify-content-left align-items-center">                                                                
                                                                <div class="d-flex flex-column">
                                                                    <span class="emp_name text-truncate font-weight-bold">{{$report['order_id']}}</span>
                                                                    <small class="emp_post text-truncate text-muted">{{$report['user_name']}}</small>
                                                                    <small class="emp_post text-truncate text-muted">{{$report['user_id']}}</small>
                                                                </div>
                                                            </div>
                                                        </td>
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
                                        <table class="table" id="monthlyIncentiveReportTable">
                                            <thead>
                                                <th>#</th>
                                                <th>Month</th>
                                                <th>Member</th>
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
                                                                <h6 class="transaction-title text-dark">
                                                                    {{$report->user->user_name}}
                                                                </h6>
                                                                <small class="text-danger"> {{$report->user->user_id}}</small>
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
                                                <th>Member</th>
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
                                            Active Director Bonus
                                        @endif
                                    </h4>
                                </div>                                
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table" id="activedirectorReportTable">
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

            @if($type == 'online_sell_report')
                <!-- Foundation Incentive -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card p-1">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        {{$name}}
                                    </h4>
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
                                        <table class="table" id="onlinesellReportTable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Order</th>
                                                    <th>User</th>
                                                    <th>Items</th>
                                                    <th>Total Qty</th>
                                                    <th>Price</th>
                                                    <th>Payment Status</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php($i=count($orders))
                                                @foreach($orders as $order)
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>
                                                            <div class="d-flex justify-content-left align-items-center">
                                                                <div class="d-flex flex-column">
                                                                    <span class="emp_name text-truncate font-weight-bold">{{$order->order_id}}</span>
                                                                    <small class="emp_post text-truncate text-muted">{{$order->created_at}}</small>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex justify-content-left align-items-center">
                                                                <div class="d-flex flex-column">
                                                                    <span class="emp_name text-truncate font-weight-bold">{{$order->user->user_name}}</span>
                                                                    <small class="emp_post text-truncate text-muted">{{$order->user->user_id}}</small>
                                                                </div>
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
                                                            ₹{{ $amt + $tax }}
                                                        </td>
                                                        <td><p class="badge badge-success">Paid</p></td>
                                                        <td>
                                                            @if($order->status == 0)
                                                                <p class="badge badge-warning">Pending</p>
                                                            @elseif($order->status == 1)
                                                                <p class="badge badge-info">Dispatched</p>
                                                            @else
                                                                <p class="badge badge-success">Delivered</p>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @php($i--)
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <th>#</th>
                                                <th>Order</th>
                                                <th>User</th>
                                                <th>Items</th>
                                                <th>Total Qty</th>
                                                <th>Price</th>
                                                <th>Payment Status</th>
                                                <th>Status</th>
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

            @if($type == 'business_centre_sell_report')
                <!-- Foundation Incentive -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card p-1">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        {{$name}}
                                    </h4>
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
                                        <table class="table" id="businesscentresellReportTable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Order</th>
                                                    <th>User</th>
                                                    <th>Centre</th>
                                                    <th>Items</th>
                                                    <th>Total Qty</th>
                                                    <th>Price</th>
                                                    <th>Payment Status</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php($i=count($orders))
                                                @foreach($orders as $order)
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>
                                                            <div class="d-flex justify-content-left align-items-center">
                                                                <div class="d-flex flex-column">
                                                                    <span class="emp_name text-truncate font-weight-bold">{{$order->order_id}}</span>
                                                                    <small class="emp_post text-truncate text-muted">{{$order->created_at}}</small>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex justify-content-left align-items-center">
                                                                <div class="d-flex flex-column">
                                                                    <span class="emp_name text-truncate font-weight-bold">{{$order->user->user_name}}</span>
                                                                    <small class="emp_post text-truncate text-muted">{{$order->user->user_id}}</small>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <div class="d-flex justify-content-left align-items-center">
                                                                <div class="d-flex flex-column">
                                                                    <span class="emp_name text-truncate font-weight-bold">
                                                                        @php($franchisee = App\Models\User::where('user_id', $order->type)->get()->first())
                                                                        {{$franchisee->user_name}}
                                                                    </span>
                                                                    <small class="emp_post text-truncate text-muted">{{$franchisee->user_id}}</small>
                                                                </div>
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
                                                            ₹{{ $amt + $tax }}
                                                        </td>
                                                        <td><p class="badge badge-success">Paid</p></td>
                                                        <td>
                                                            @if($order->status == 0)
                                                                <p class="badge badge-warning">Pending</p>
                                                            @elseif($order->status == 1)
                                                                <p class="badge badge-info">Dispatched</p>
                                                            @else
                                                                <p class="badge badge-success">Delivered</p>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @php($i--)
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <th>#</th>
                                                <th>Order</th>
                                                <th>User</th>
                                                <th>Centre</th>
                                                <th>Items</th>
                                                <th>Total Qty</th>
                                                <th>Price</th>
                                                <th>Payment Status</th>
                                                <th>Status</th>
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

            @if($type == 'total_sell_report')
                <!-- Foundation Incentive -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card p-1">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        {{$name}}
                                    </h4>
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
                                        <table class="table" id="totalsellReportTable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Order</th>
                                                    <th>User</th>
                                                    <th>Items</th>
                                                    <th>Total Qty</th>
                                                    <th>Price</th>
                                                    <th>Payment Status</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php($i=count($orders))
                                                @foreach($orders as $order)
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>
                                                            <div class="d-flex justify-content-left align-items-center">
                                                                <div class="d-flex flex-column">
                                                                    <span class="emp_name text-truncate font-weight-bold">{{$order->order_id}}</span>
                                                                    <small class="emp_post text-truncate text-muted">{{$order->created_at}}</small>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex justify-content-left align-items-center">
                                                                <div class="d-flex flex-column">
                                                                    <span class="emp_name text-truncate font-weight-bold">{{$order->user->user_name}}</span>
                                                                    <small class="emp_post text-truncate text-muted">{{$order->user->user_id}}</small>
                                                                </div>
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
                                                            ₹{{ $amt + $tax }}
                                                        </td>
                                                        <td><p class="badge badge-success">Paid</p></td>
                                                        <td>
                                                            @if($order->status == 0)
                                                                <p class="badge badge-warning">Pending</p>
                                                            @elseif($order->status == 1)
                                                                <p class="badge badge-info">Dispatched</p>
                                                            @else
                                                                <p class="badge badge-success">Delivered</p>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @php($i--)
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <th>#</th>
                                                <th>Order</th>
                                                <th>User</th>
                                                <th>Items</th>
                                                <th>Total Qty</th>
                                                <th>Price</th>
                                                <th>Payment Status</th>
                                                <th>Status</th>
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

            @if($type == 'gst_report')
                <!-- Foundation Incentive -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card p-1">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        {{$name}}
                                    </h4>
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
                                        <table class="table" id="gstReportTable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Invoice No.</th>
                                                    <th>User Name</th>
                                                    <th>Product Name</th>
                                                    <th>HSN Code</th>
                                                    <th>GST No</th>
                                                    <th>Price</th>
                                                    <th>Qty</th>
                                                    <th>GST %</th>
                                                    <th>Tax Amount</th>
                                                    <th>Net Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php($i=1)
                                                @foreach($orders as $order)
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>
                                                            {{ $order['invoice'] }}
                                                        </td>
                                                        <td>
                                                            {{ $order['user_name'] }}
                                                        </td>
                                                        <td>
                                                            {{ $order['name'] }}
                                                        </td>
                                                        <td>
                                                            {{ $order['hsn'] }}
                                                        </td>
                                                        <td>
                                                            {{ $order['gstno'] }}
                                                        </td>
                                                        <td>
                                                            ₹ {{ number_format($order['price'], 2) }}
                                                        </td>
                                                        <td>
                                                            {{ $order['qty'] }}
                                                        </td>
                                                        @php($company_state = App\Models\User::where('user_id', 'admin')->get()->first()->personal->state)
                                                        {{-- @php($user_state = $order['user_state']) --}}
                                                        @if($company_state !=  $order['user_state'])
                                                        <td class="py-1">
                                                            <span class="font-weight-bold">
                                                               IGST = {{$order['gst']}}%
                                                            </span>
                                                        </td>
                                                    @elseif($company_state !=  $order['user_state'] or  $order['user_state']=='')
                                                        <td class="py-1">
                                                            <span class="font-weight-bold">
                                                                CGST =  {{$order['gst']/2}}%
                                                            </span>
                                                       <br>
                                                            <span class="font-weight-bold">
                                                                SGST =   {{$order['gst']/2}}%
                                                            </span>
                                                        </td>
                                                    @endif
                                                        {{-- <td>
                                                            {{ $order['gst'] }}
                                                        </td> --}}
                                                        <td>
                                                            ₹ {{ number_format($order['tax'], 2) }}
                                                        </td>
                                                        <td>
                                                            ₹ {{ number_format($order['netAmount'], 2) }}
                                                        </td>
                                                    </tr>
                                                    @php($i++)
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <th>#</th>
                                                <th>Invoice No.</th>
                                                <th>User Name</th>
                                                <th>Product Name</th>
                                                <th>HSN Code</th>
                                                <th>GST No</th>
                                                <th>Price</th>
                                                <th>Qty</th>
                                                <th>GST %</th> 
                                                <th>Tax Amount</th>
                                                <th>Net Amount</th>
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

            @if($type == 'tds_report')
                <!-- Foundation Incentive -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card p-1">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        {{$name}}
                                    </h4>
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
                                        <table class="table" id="tdsReportTable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>PAN Card</th>
                                                    <th>Member</th>
                                                    <th>Mobile No.</th>
                                                    <th>Amount</th>
                                                    <th>TDS</th>
                                                    <th>Admin Charge</th>
                                                    <th>Net Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php($i=1)
                                                @foreach($requests; as $request)
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>
                                                            {{ $request->user->kyc()->where('document_type', 'PAN Card')->get()->first()->document_number }}
                                                        </td>
                                                        <td>
                                                            {{ $request->user->user_name }}
                                                        </td>
                                                        <td>
                                                            {{ $request->user->user_mobile }}
                                                        </td>
                                                        <td>
                                                            ₹ {{ number_format($request->amount, 2) }}
                                                        </td>
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
                                                    </tr>
                                                    @php($i++)
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <th>#</th>
                                                <th>PAN Card</th>
                                                <th>Member</th>
                                                <th>Mobile No.</th>
                                                <th>Amount</th>
                                                <th>TDS</th>
                                                <th>Admin Charge</th>
                                                <th>Net Amount</th>
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

            @if($type == 'team_report_gen')
                <!-- Foundation Incentive -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card p-1">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        {{$name}}
                                    </h4>
                                </div>  
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-6"></div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <form action="" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-3">
                                                    <input type="text" class="form-control" placeholder="USER ID" name="id" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text" id="fp-default" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" name="from" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text" id="fp-default" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" name="to" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="submit" class="btn btn-gradient-primary" placeholder="Search" value="Search">
                                                </div>
                                        </form>
                                    </div>
                                </div>                              
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table" id="teamReportTable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Order Id</th>
                                                    <th>Member</th>
                                                    <th>DP</th>
                                                    <th>BV</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php($i = count($orders))
                                                @foreach($orders as $order)
                                                    <tr>
                                                        <td>{{$i}}</td>
                                                        <td>{{$order['orderId']}}</td>
                                                        <td>
                                                            <div class="media-body">
                                                                <h6 class="transaction-title text-dark">{{$order['memberName']}}</h6>
                                                                <small>{{$order['memberId']}}</small>
                                                            </div>                                                            
                                                        </td>
                                                        <td>₹{{number_format($order['dp'], 2 )}}</td>
                                                        <td>₹{{number_format($order['bv'], 2 )}}</td>
                                                        <td>{{$order['date']}}</td>
                                                    </tr>
                                                    @php($i--)
                                                @endforeach
                                                
                                            </tbody>
                                            <tfoot>
                                                <th>#</th>
                                                <th>Order Id</th>
                                                <th>Member</th>
                                                <th>DP</th>
                                                <th>BV</th>
                                                <th>Date</th>
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

            @if($type == 'team_report_org')
                <!-- Foundation Incentive -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card p-1">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        {{$name}}- 1
                                    </h4>
                                </div>  
                                <div class="row">
                                    <div class="col-12 col-md-6 col-lg-6"></div>
                                    <div class="col-12 col-md-6 col-lg-6">
                                        <form action="" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-3">
                                                    <input type="text" class="form-control" placeholder="USER ID" name="id" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text" id="fp-default" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" name="from" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text" id="fp-default" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" name="to" required>
                                                </div>
                                                <div class="col-3">
                                                    <input type="submit" class="btn btn-gradient-primary" placeholder="Search" value="Search">
                                                </div>
                                        </form>
                                    </div>
                                </div>                              
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table" id="teamReportTable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Order Id</th>
                                                    <th>Member</th>
                                                    <th>DP</th>
                                                    <th>BV</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php($i = count($orders1))
                                                @foreach($orders1 as $order)
                                                    <tr>
                                                        <td>{{$i}}</td>
                                                        <td>{{$order['orderId']}}</td>
                                                        <td>
                                                            <div class="media-body">
                                                                <h6 class="transaction-title text-dark">{{$order['memberName']}}</h6>
                                                                <small>{{$order['memberId']}}</small>
                                                            </div>                                                            
                                                        </td>
                                                        <td>₹{{number_format($order['dp'], 2 )}}</td>
                                                        <td>₹{{number_format($order['bv'], 2 )}}</td>
                                                        <td>{{$order['date']}}</td>
                                                    </tr>
                                                    @php($i--)
                                                @endforeach
                                                
                                            </tbody>
                                            <tfoot>
                                                <th>#</th>
                                                <th>Order Id</th>
                                                <th>Member</th>
                                                <th>DP</th>
                                                <th>BV</th>
                                                <th>Date</th>
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

            @if($type == 'team_report_org')
                <!-- Foundation Incentive -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card p-1">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        {{$name}}- 2
                                    </h4>
                                </div>                              
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table" id="teamReportTableORG2">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Order Id</th>
                                                    <th>Member</th>
                                                    <th>DP</th>
                                                    <th>BV</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php($i = count($orders2))
                                                @foreach($orders2 as $order)
                                                    <tr>
                                                        <td>{{$i}}</td>
                                                        <td>{{$order['orderId']}}</td>
                                                        <td>
                                                            <div class="media-body">
                                                                <h6 class="transaction-title text-dark">{{$order['memberName']}}</h6>
                                                                <small>{{$order['memberId']}}</small>
                                                            </div>                                                            
                                                        </td>
                                                        <td>₹{{number_format($order['dp'], 2 )}}</td>
                                                        <td>₹{{number_format($order['bv'], 2 )}}</td>
                                                        <td>{{$order['date']}}</td>
                                                    </tr>
                                                    @php($i--)
                                                @endforeach
                                                
                                            </tbody>
                                            <tfoot>
                                                <th>#</th>
                                                <th>Order Id</th>
                                                <th>Member</th>
                                                <th>DP</th>
                                                <th>BV</th>
                                                <th>Date</th>
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
        $('#onlinesellReportTable').DataTable( {    
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        } );

        $('#businesscentresellReportTable').DataTable( {
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        } );

        $('#bvReportTable').DataTable( {
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        } );

        $('#monthlyIncentiveReportTable').DataTable( {
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        } );

        $('#activedirectorReportTable').DataTable( {
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        } );

        $('#totalsellReportTable').DataTable( {
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        } );

        $('#gstReportTable').DataTable( {
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        } );

        $('#tdsReportTable').DataTable( {
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        } );

        $('#teamReportTable').DataTable( {
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        } );

        $('#teamReportTableORG2').DataTable( {
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
@endsection