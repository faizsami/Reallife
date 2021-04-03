@extends('layouts.user')
@section('page_name', 'Profile')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Profile</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/user/dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ url('/user/profile') }}">Profile</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{Auth::user()->user_name}}
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div id="user-profile">
                    <!-- profile header -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card profile-header mb-2">
                                <!-- profile cover photo -->
                                <div class="profile_cover">
                                    {{-- <img class="card-img-top" src="{{ asset('assets/images/profile/user-uploads/timeline.jpg') }}" alt="User Profile Image" /> --}}
                                    <div class="profile_cover_bluer">
                                        <div class="position-absolute m-1" style="bottom:0;">
                                            <!-- profile picture -->
                                            <div class="profile-img-container d-flex align-items-center">
                                                <div class="profile-img">
                                                    <img src="{{ asset('uploads/profiles/'.Auth::user()->personal->profile_image) }}" class="rounded-circle img-fluid" style="max-height:100px" />
                                                </div>
                                                <!-- profile title -->
                                                <div class="profile-title ml-3 mt-5">
                                                    <h3 class="text-white">{{Auth::user()->user_name}}</h3>
                                                    <p class="text-white"><b>Id: {{Auth::user()->user_id}}</b></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ profile cover photo -->                                                                
                            </div>
                        </div>
                    </div>
                    <!--/ profile header -->

                    <!-- users edit start -->
                    <section class="app-user-edit">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-pills" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center active" id="personal-tab" data-toggle="tab" href="#personal" aria-controls="personal" role="tab" aria-selected="true">
                                            <i data-feather="user"></i><span class="d-none d-sm-block">Personal Details</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center" id="bank-tab" data-toggle="tab" href="#bank" aria-controls="bank" role="tab" aria-selected="false">
                                            <i data-feather="briefcase"></i><span class="d-none d-sm-block">Bank Details</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center" id="kyc-tab" data-toggle="tab" href="#kyc" aria-controls="kyc" role="tab" aria-selected="false">
                                            <i data-feather="user-check"></i><span class="d-none d-sm-block">Kyc Details</span>
                                        </a>
                                    </li>                                
                                </ul>                                
                                <div class="tab-content">
                                    <!-- personal Tab starts -->
                                    <div class="tab-pane active" id="personal" aria-labelledby="personal-tab" role="tabpanel">
                                        <!-- User Card starts-->
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-7">
                                                <div class="card user-card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-xl-6 col-lg-12 d-flex flex-column justify-content-between border-container-lg">
                                                                <div class="row">
                                                                    <div class="col-12 col-md-6 col-lg-6">
                                                                        <div class="mt-1">
                                                                            <p class="user-info-title"><i data-feather="user" class="mr-1"></i> User Id</p>
                                                                        </div>
                                                                        <div class="mt-2">
                                                                            <p class="user-info-title"><i data-feather="user" class="mr-1"></i> User Name</p>
                                                                        </div>
                                                                        <div class="mt-2">
                                                                            <p class="user-info-title"><i data-feather="user-check" class="mr-1"></i> Sponsor Id</p>
                                                                        </div>
                                                                        <div class="mt-2">
                                                                            <p class="user-info-title"><i data-feather="user-check" class="mr-1"></i> Sponsor Name</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-6">
                                                                        <div class="mt-1">
                                                                            <p class="badge badge-light-primary">{{Auth::user()->user_id}}</p>
                                                                        </div>
                                                                        <div class="mt-1">
                                                                            <p class="card-text">{{Auth::user()->user_name}}</p>
                                                                        </div>
                                                                        <div class="mt-1">
                                                                            <p class="badge badge-light-info">{{Auth::user()->sponser_id}}</p>
                                                                        </div>
                                                                        <div class="mt-1">
                                                                            <p class="badge badge-light-info">{{App\Models\User::where('user_id', Auth::user()->sponser_id)->get()->first()->user_name}}</p>
                                                                        </div>
                                                                    </div>                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-12 mt-2 mt-xl-0">
                                                                <div class="row">
                                                                    <div class="col-12 col-md-6 col-lg-6">
                                                                        <div class="mt-1">
                                                                            <p class="user-info-title"><i data-feather="repeat" class="mr-1"></i> Position</p>
                                                                        </div>
                                                                        <div class="mt-2">
                                                                            <p class="user-info-title"><i data-feather="mail" class="mr-1"></i> Email</p>
                                                                        </div>
                                                                        <div class="mt-2">
                                                                            <p class="user-info-title"><i data-feather="check" class="mr-1"></i> Status</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-6">
                                                                        <div class="mt-1">
                                                                            <p class="badge badge-light-warning">
                                                                                @if(Auth::user()->binary->position == 0)
                                                                                    Left
                                                                                @else
                                                                                    Right
                                                                                @endif
                                                                            </p>
                                                                        </div>
                                                                        <div class="mt-1">
                                                                            <p class="badge badge-light-success">{{Auth::user()->email}}</p>
                                                                        </div>
                                                                        <div class="mt-1">
                                                                            <p class="card-text">
                                                                                @if(Auth::user()->binary->self_bv < 500)
                                                                                    <span class="text-danger"> Not Active </span>
                                                                                @else
                                                                                    <span class="text-success"> Active </span>
                                                                                @endif
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><br>

                                                            <p class="text-info mt-2">Refferal Link: <a href="{{url('/register?id='.Auth::user()->user_id)}}">{{url('/register?id='.Auth::user()->user_id)}}</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /User Card Ends-->
                                        <!-- users edit Info form start -->
                                        <form class="form-validate">
                                            <div class="row mt-1">
                                                <div class="col-12">
                                                    <h5 class="mb-1">
                                                        <i data-feather="user" class="font-medium-4 mr-25"></i>
                                                        <span class="align-middle">Personal Information</span>
                                                    </h5>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="form-group">
                                                        <label for="birth">Gender</label>
                                                        <input id="birth" type="text" class="form-control birthdate-picker" value="{{ Auth::user()->personal->sex == '' ? 'NA' : Auth::user()->personal->sex}}" disabled/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="form-group">
                                                        <label for="birth">Birth date</label>
                                                        <input id="birth" type="text" class="form-control birthdate-picker" value="{{ Auth::user()->personal->dob == '' ? 'NA' : Auth::user()->personal->dob}}" placeholder="YYYY-MM-DD" disabled/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="form-group">
                                                        <label for="mobile">Mobile</label>
                                                        <input id="mobile" type="text" class="form-control" value="{{Auth::user()->user_mobile == '' ? 'NA' : Auth::user()->user_mobile}}" name="phone" disabled/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="form-group">
                                                        <label for="mobile">Alternate Mobile</label>
                                                        <input id="mobile" type="text" class="form-control" value="{{Auth::user()->personal->alternate_mobile == '' ? 'NA' : Auth::user()->personal->alternate_mobile}}" name="phone" disabled/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="form-group">
                                                        <label for="mobile">Nominee Name</label>
                                                        <input id="mobile" type="text" class="form-control" value="{{Auth::user()->personal->nominee_name == '' ? 'NA' : Auth::user()->personal->nominee_name}}" name="phone" disabled/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="form-group">
                                                        <label for="mobile">Nominee Mobile</label>
                                                        <input id="mobile" type="text" class="form-control" value="{{Auth::user()->personal->nominee_mobile == '' ? 'NA' : Auth::user()->personal->nominee_mobile}}" name="phone" disabled/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="form-group">
                                                        <label for="mobile">Nominee Relation</label>
                                                        <input id="mobile" type="text" class="form-control" value="{{Auth::user()->personal->nominee_relation == '' ? 'NA' : Auth::user()->personal->nominee_relation}}" name="phone" disabled/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="form-group">
                                                        <label for="gst">GST</label>
                                                        <input id="gst" type="text" class="form-control" value="{{Auth::user()->personal->gst == '' ? 'NA' : Auth::user()->personal->gst}}" name="gst" disabled/>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <h4 class="mb-1 mt-2">
                                                        <i data-feather="map-pin" class="font-medium-4 mr-25"></i>
                                                        <span class="align-middle">Address</span>
                                                    </h4>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="form-group">
                                                        <label for="address-1">Address</label>
                                                        <input id="address-1" type="text" class="form-control" value="{{Auth::user()->personal->address == '' ? 'NA' : Auth::user()->personal->address}}" name="address" disabled/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="form-group">
                                                        <label for="address-2">Dist</label>
                                                        <input id="address-2" type="text" class="form-control" value="{{Auth::user()->personal->dist == '' ? 'NA' : Auth::user()->personal->dist}}" disabled/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="form-group">
                                                        <label for="postcode">Postcode</label>
                                                        <input id="postcode" type="text" class="form-control" placeholder="597626" value="{{Auth::user()->personal->postal_code == '' ? 'NA' : Auth::user()->personal->postal_code}}" disabled/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="form-group">
                                                        <label for="city">City</label>
                                                        <input id="city" type="text" class="form-control" value="{{Auth::user()->personal->city == '' ? 'NA' : Auth::user()->personal->city}}" name="city" disabled/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="form-group">
                                                        <label for="state">State</label>
                                                        <input id="state" type="text" class="form-control" value="{{Auth::user()->personal->state == '' ? 'NA' : Auth::user()->personal->state}}" placeholder="Manhattan" disabled/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="form-group">
                                                        <label for="country">Country</label>
                                                        <input id="country" type="text" class="form-control" value="{{Auth::user()->personal->country == '' ? 'NA' : Auth::user()->personal->country}}" placeholder="United States" disabled/>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- users edit Info form ends -->
                                    </div>
                                    <!-- personal Tab ends -->

                                    <!-- bank Tab starts -->
                                    <div class="tab-pane" id="bank" aria-labelledby="bank-tab" role="tabpanel">
                                        <!-- Bank Detail Card -->
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Bank Details</h4>
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <tbody>
                                                            <tr>
                                                                <td class="py-1">
                                                                    <strong>Payee Name</strong>
                                                                </td>
                                                                <td>
                                                                    <strong>{{ Auth::user()->bank->payee_name == '' ? 'NA' : Auth::user()->bank->payee_name }}</strong>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="py-1">
                                                                    <strong>Account Type</strong>
                                                                </td>
                                                                <td>
                                                                    <strong>{{ Auth::user()->bank->account_type == '' ? 'NA' : Auth::user()->bank->account_type }}</strong>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="py-1">
                                                                    Bank Name
                                                                </td>
                                                                <td>
                                                                    {{ Auth::user()->bank->bank_name == '' ? 'NA' : Auth::user()->bank->bank_name }}
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="py-1">
                                                                    IFSC Code
                                                                </td>
                                                                <td>
                                                                    {{ Auth::user()->bank->ifsc_code == '' ? 'NA' : Auth::user()->bank->ifsc_code }}
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="py-1">
                                                                    <strong>Branch Name</strong>
                                                                </td>
                                                                <td>
                                                                    <strong>{{ Auth::user()->bank->branch == '' ? 'NA' : Auth::user()->bank->branch }}</strong>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="py-1">
                                                                    <strong>UPI Id</strong>
                                                                </td>
                                                                <td>
                                                                    <strong>{{ Auth::user()->bank->upi_id == '' ? 'NA' : Auth::user()->bank->upi_id }}</strong>
                                                                </td>
                                                            </tr>

                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Bank Detail Card -->
                                    </div>
                                    <!-- bank Tab ends -->

                                    <!-- kyc Tab starts -->
                                    <div class="tab-pane" id="kyc" aria-labelledby="kyc-tab" role="tabpanel">
                                        <!-- KYC Detail Card -->
                                        <div class="grid-margin stretch-card">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6 class="card-title">Kyc Details</h6>
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    #
                                                                </th>
                                                                <th>
                                                                    Document Name
                                                                </th>
                                                                <th>
                                                                    Status
                                                                </th>
                                                                <th>
                                                                    Document Files
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $kycs = Auth::user()->kyc;
                                                                $i=1;
                                                            @endphp

                                                            @foreach($kycs as $kyc)
                                                                <tr>
                                                                    <td>{{$i}}</td>
                                                                    <td>{{$kyc->document_type}}</td>
                                                                    <td>
                                                                        @if($kyc->status == 0)
                                                                            <span class="badge badge-warning">Pending</span>
                                                                        @elseif($kyc->status == 1)
                                                                            <span class="badge badge-success">Apporved</span>
                                                                        @else
                                                                            <span class="badge badge-danger">Failed</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <img class="rounded-circle" src="{{ asset('uploads/documents/'.$kyc->front_image) }}" width="10%">
                                                                        <img class="rounded-circle" src="{{ asset('uploads/documents/'.$kyc->back_image) }}" width="10%">
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Bank Detail Card -->
                                    </div>
                                    <!-- kyc Tab ends -->
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- users edit ends -->                    
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection