@extends('layouts.user')
@section('page_name', 'Admin Dashboard')
@section('content')
<style>
.blink_me {
  animation: blinker 1s linear infinite;
}

@keyframes blinker {
  50% {
    opacity: 0;
  }
}
</style>
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    @if(!$is_profile)
                        <!--BEGIN: Check Personal Details -->
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <div class="alert-body">
                                <a href="{{ url('/user/edit-profile')}} " class="text-danger"> Oops.! Incomplete profile. Dear {{Auth::user()->user_name}}, please complete your profile.</a>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <!--END: Check Personal Details -->
                    @endif
                    @if(!$is_bank)
                        <!--BEGIN: Check Bank Details -->
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <div class="alert-body">
                                <a href="{{ url('/user/edit-profile')}} " class="text-danger"> Oops.! Incomplete bank information. Dear {{Auth::user()->user_name}}, please provide your bank details.<a>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <!--END: Check Bank Details -->
                    @endif
                    @if(!$is_kyc)
                        <!--BEGIN: Check KYC Details -->
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <div class="alert-body">
                                <a href="{{ url('/user/edit-profile')}} " class="text-danger">  Oops.! Incomplete kyc. Dear {{Auth::user()->user_name}}, please provide your kyc documents & details.</a>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <!--END: Check KYC Details -->
                    @endif

                    @if($if_complete->status == 1)
                        <!--BEGIN: Check KYC Details -->
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <div class="alert-body">
                                {{$if_complete->msg}}
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <!--END: Check KYC Details -->
                    @endif                    
                    
                    @include('partials.news')
                    <div class="row match-height">
                        <!-- Medal Card -->
                        <div class="col-lg-3 col-md-3 col-12">
                            <div class="card">
                                <div class="card-header flex-column align-items-start pb-0">
                                    <div class="avatar bg-light-success p-50 m-0">
                                        <div class="avatar-content">
                                            <i data-feather="credit-card" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="font-weight-bolder mt-1">₹ {{number_format(Auth::user()->wallet->balance, 2)}}</h2>
                                    <p class="card-text">Wallet Balance</p>
                                </div>
                                <div id="line-area-chart-2"></div>
                            </div>
                        </div>
                        <!--/ Medal Card -->                        

                        <!-- Statistics Card -->
                        <div class="col-lg-9 col-md-9 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Statistics</h4>
                                    <div class="d-flex align-items-center">
                                        <p class="card-text font-small-2 mr-25 mb-0">Updated at {{date('d-m-Y h:i:s A')}}</p>
                                    </div>
                                </div>
                                <div class="card-body statistics-body">
                                    <div class="row">
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="media">
                                                <div class="avatar bg-light-primary mr-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="user" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">{{Auth::user()->binary->self_bv}}</h4>
                                                    <p class="card-text font-small-3 mb-0">Self B.V</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="media">
                                                <div class="avatar bg-light-info mr-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="corner-left-down" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">{{Auth::user()->binary->left_bv}}</h4>
                                                    <p class="card-text font-small-3 mb-0">Left B.V</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                            <div class="media">
                                                <div class="avatar bg-light-danger mr-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="corner-right-down" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">{{Auth::user()->binary->right_bv}}</h4>
                                                    <p class="card-text font-small-3 mb-0">Right B.V</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6 col-12">
                                            <div class="media">
                                                <div class="avatar bg-light-success mr-2">
                                                    <div class="avatar-content">
                                                        <i data-feather="users" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="media-body my-auto">
                                                    <h4 class="font-weight-bolder mb-0">{{Auth::user()->binary->right_bv + Auth::user()->binary->left_bv }}</h4>
                                                    <p class="card-text font-small-3 mb-0">Total B.V</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php($self_bv = Auth::user()->binary->left_bv+Auth::user()->binary->right_bv)
                                    @php($rank_user = 'Consumer')

                                    @if($self_bv > 75000)
                                        @php($rank_user = 'Manager')
                                    @elseif($self_bv > 28000)
                                        @php($rank_user = 'Supervisor')
                                    @elseif($self_bv > 7000)
                                        @php($rank_user = 'Advisor')
                                    @else
                                        @php($rank_user = 'Consumer')
                                    @endif


                                    <div class="mt-3">
                                        <span class="text-danger font-weight-bold">Congratulations.!</span> You are now {{ $rank_user == 'Advisor' ? 'an' : 'a'}} <span class="blink_me text-info">{{$rank_user}}.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Statistics Card -->
                    </div>

                    <div class="row match-height">
                        <!-- Medal Card -->
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar bg-light-danger p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="award" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="font-weight-bolder">{{count(Auth::user()->master()->get()->all())}}</h2>
                                    <p class="card-text">Director Bonus</p>
                                </div>
                            </div>
                        </div>
                        <!--/ Medal Card -->

                        <!-- Medal Card -->
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar bg-light-primary p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="activity" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="font-weight-bolder">{{count(Auth::user()->superMaster()->where('smbp', '!=', 0)->get()->all())}}</h2>
                                    <p class="card-text">Silver Director Bonus</p>
                                </div>
                            </div>
                        </div>
                        <!--/ Medal Card --> 
                        
                        <!-- Medal Card -->
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar bg-light-success p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="users" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="font-weight-bolder">{{count(Auth::user()->leadership()->get()->all())}}</h2>
                                    <p class="card-text">Gold Director Bonus</p>
                                </div>
                            </div>
                        </div>
                        <!--/ Medal Card -->  

                      
                        
                        <!-- Medal Card -->
                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar bg-light-warning p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="check-circle" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="font-weight-bolder">{{count(Auth::user()->car()->where('crp', '!=', 0)->get()->all())}}</h2>
                                    <p class="card-text">Diamond Director Bonus</p>
                                </div>
                            </div>
                        </div>
                        <!--/ Medal Card --> 
                          <!-- Medal Card -->
                          <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar bg-light-info p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="home" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="font-weight-bolder">{{count(Auth::user()->home()->where('hp', '!=', 0)->get()->all())}}</h2>
                                    <p class="card-text">Crown Director Bonus</p>
                                </div>
                            </div>
                        </div>
                        <!--/ Medal Card --> 

                        <div class="col-xl-2 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="avatar bg-light-warning p-50 mb-1">
                                        <div class="avatar-content">
                                            <i data-feather="check-circle" class="font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="font-weight-bolder">{{count(Auth::user()->Royal()->where('rp', '!=', 0)->get()->all())}}</h2>
                                    <p class="card-text">Universal Director Bonus</p>
                                </div>
                            </div>
                        </div>
                        <!--/ Medal Card --> 

                    </div>
                </section>
                <!-- Dashboard Ecommerce ends -->

                <div class="card p-1">
                    <div class="card-header">
                        <h4 class="card-title">
                            Regular Performance Bonus
                        </h4>
                    </div>                                
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
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
                                    @php($tb = $report->tb_value * $report->tb_total)
                                    @php($rp = $report->rp_value * $report->rp_total)
                                    @php($lb = $report->lb_value * $report->lb_total)
                                    @php($cf = $report->cf_value * $report->cf_total)
                                    @php($hf = $report->hf_value * $report->hf_total)
                                    @php($rf = $report->rf_value * $report->rf_total)
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
                                                        {{number_format($tb, 2)}}
                                                    </h6>
                                                    <small class="text-danger"> {{$report->tb_total}}</small>
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
                                                    <h6 class="transaction-title text-dark">&#8377;{{number_format($lb, 2)}}</h6>
                                                    <small class="text-danger"> {{$report->lb_total}}</small>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="media-body">
                                                    <h6 class="transaction-title text-dark">&#8377;{{number_format($cf, 2)}}</h6>
                                                    <small class="text-danger"> {{$report->cf_total}}</small>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="media-body">
                                                    <h6 class="transaction-title text-dark">&#8377;{{number_format($hf, 2)}}</h6>
                                                    <small class="text-danger"> {{$report->hf_total}}</small>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="media-body">
                                                    <h6 class="transaction-title text-dark">&#8377;{{number_format($rf, 2)}}</h6>
                                                    <small class="text-danger"> {{$report->rf_total}}</small>
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

                <div class="card p-1">
                    <div class="card-header">
                        <h4 class="card-title">
                            Active Manager Bonus
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
    </div>
    <!-- END: Content-->

    
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('assets/js/scripts/pages/dashboard-ecommerce.js') }}"></script>
    <!-- END: Page JS-->    
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('assets/js/scripts/cards/card-statistics.js') }}"></script>
    <!-- END: Page JS-->
@endsection