@extends('layouts.employee')
@section('page_name', 'All Members')
@section('content')
@include('partials.errors')

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">View</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/employee/dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('/employee/tree') }}">TreeView</a>
                                </li>
                                <li class="breadcrumb-item active">{{$user->user_id}} ({{$user->user_name}})
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">            
            <!-- users edit start -->
            <section class="app-user-edit">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                    <i data-feather="user"></i><span class="d-none d-sm-block">Personal Details</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#information" aria-controls="information" role="tab" aria-selected="false">
                                    <i data-feather="briefcase"></i><span class="d-none d-sm-block">Bank Details</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" id="social-tab" data-toggle="tab" href="#social" aria-controls="social" role="tab" aria-selected="false">
                                    <i data-feather="user-check"></i><span class="d-none d-sm-block">Kyc Details</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <!-- Account Tab starts -->
                            <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                <form method="post" action="{{ url('/employee/member/'.$user->id.'/update') }}" enctype="multipart/form-data">
                                    @csrf
                                    <!-- users edit media object start -->
                                    <div class="media mb-2">
                                        <img src="{{ asset('/uploads/profiles/'.$user->personal->profile_image) }}" alt="users avatar" class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer" height="90" width="90" />
                                        <div class="media-body mt-2">
                                            <h4>{{ $user->user_name }}</h4>
                                            <small>{{$user->user_id}}</small>
                                        </div>
                                    </div>
                                    <!-- users edit media object ends -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="username">User Id</label>
                                                <input type="text" class="form-control" value="{{$user->user_id}}" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" placeholder="Name" value="{{$user->user_name}}" name="name" id="name" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="email">E-mail</label>
                                                <input type="email" class="form-control" placeholder="Email" value="{{$user->email}}" name="email" id="email" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="company">Mobile</label>
                                                <input type="text" name="mobile" class="form-control" value="{{$user->user_mobile}}" required/>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="status">Status</label><br>
                                                @if($user->is_block == 0)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Blocked</span>
                                                @endif
                                            </div>
                                        </div>                                        
                                        <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                            <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Account Tab ends -->

                            <!-- Information Tab starts -->
                            <div class="tab-pane" id="information" aria-labelledby="information-tab" role="tabpanel">
                                <!-- Bank Detail Card -->
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Bank Details</h4>
                                        <div class="table-responsive">
                                            <form action="{{ url('/employee/update-bank-details') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$user->id}}" hidden>
                                                <table class="table table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <td class="py-1">
                                                                <strong>Payee Name</strong>
                                                            </td>
                                                            <td>
                                                                <input class="form-control" name="payee_name" value="{{$user->bank->payee_name}}" required>
                                                                @if($errors->has('payee_name'))
                                                                    <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                        <strong>{{ $errors->first('payee_name') }}</strong>
                                                                    </p>
                                                                @endif
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="py-1">
                                                                <strong>Account Type</strong>
                                                            </td>
                                                            <td>
                                                                <select class="form-control text-uppercase" name="account_type" >
                                                                    @if($user->bank->account_type != null)
                                                                        <option value="{{ $user->bank->account_type }}" selected>{{ $user->bank->account_type }}</option>
                                                                    @endif
    
                                                                    @php( $accounts = array('Current', 'Savings'))
                                                                    @foreach($accounts as $account)
                                                                        @if($account != $user->bank->account_type)
                                                                            <option value="{{ $account }}">{{ $account }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                                @if($errors->has('account_type'))
                                                                    <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                        <strong>{{ $errors->first('account_type') }}</strong>
                                                                    </p>
                                                                @endif
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="py-1">
                                                                Bank Name
                                                            </td>
                                                            <td>
                                                                <input class="form-control" name="bank_name" value="{{$user->bank->bank_name}}" required>
                                                                @if($errors->has('bank_name'))
                                                                    <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                        <strong>{{ $errors->first('bank_name') }}</strong>
                                                                    </p>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="py-1">
                                                                Account Number
                                                            </td>
                                                            <td>
                                                                <input class="form-control" name="account_number" value="{{$user->bank->account_number}}" required>
                                                                @if($errors->has('ifsc_code'))
                                                                    <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                        <strong>{{ $errors->first('ifsc_code') }}</strong>
                                                                    </p>
                                                                @endif
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="py-1">
                                                                IFSC Code
                                                            </td>
                                                            <td>
                                                                <input class="form-control" name="ifsc_code" value="{{$user->bank->ifsc_code}}" required>
                                                                @if($errors->has('account_number'))
                                                                    <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                        <strong>{{ $errors->first('account_number') }}</strong>
                                                                    </p>
                                                                @endif
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="py-1">
                                                                <strong>Branch Name</strong>
                                                            </td>
                                                            <td>
                                                                <input class="form-control" name="branch_name" value="{{$user->bank->branch_name}}" required>
                                                                @if($errors->has('branch_name'))
                                                                    <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                        <strong>{{ $errors->first('branch_name') }}</strong>
                                                                    </p>
                                                                @endif
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="py-1">
                                                                <strong>UPI Id</strong>
                                                            </td>
                                                            <td>
                                                                <input class="form-control" name="upi_id" value="{{$user->bank->upi_id}}" required>
                                                                @if($errors->has('upi_id'))
                                                                    <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                        <strong>{{ $errors->first('upi_id') }}</strong>
                                                                    </p>
                                                                @endif
                                                            </td>
                                                        </tr>                                                        
                                                    </tbody>
                                                </table>
                                                <button type="submit" class="btn btn-gradient-primary float-right mt-2">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Bank Detail Card -->
                            </div>
                            <!-- Information Tab ends -->

                            <!-- Social Tab starts -->
                            <div class="tab-pane" id="social" aria-labelledby="social-tab" role="tabpanel">
                                <!-- KYC Detail Card -->
                                <div class="grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="card-title">Kyc Details</h6>
                                            <div class="table-responsive">
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
                                                                Document Number
                                                            </th>
                                                            <th>
                                                                Status
                                                            </th>
                                                            <th>
                                                                Document Files
                                                            </th>
                                                            <th>
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php($kycs = $user->kyc)
                                                        @php($i=1)

                                                        @foreach($kycs as $kyc)
                                                            <tr>
                                                                <td>{{$i}}</td>
                                                                <td>{{$kyc->document_type}}</td>
                                                                <td>{{$kyc->document_number}}</td>
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
                                                                    <img class="rounded-circle" src="{{ asset('uploads/documents/'.$kyc->front_image) }}" height="50px" style="cursor: pointer" onclick="window.open('{{ asset('uploads/documents/'.$kyc->front_image) }}', '_blank') ">
                                                                    <img class="rounded-circle" src="{{ asset('uploads/documents/'.$kyc->back_image) }}" height="50px" style="cursor: pointer" onclick="window.open('{{ asset('uploads/documents/'.$kyc->back_image) }}', '_blank') ">
                                                                </td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <a class="dropdown-toggle hide-arrow" data-toggle="dropdown">                                                                
                                                                            <i data-feather='more-vertical'></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right">                                                                            
                                                                            <a href="{{ url('/employee/member/kyc/'.$kyc->id.'/1') }}" class="dropdown-item">
                                                                                <i data-feather='eye'></i>
                                                                                Apporve
                                                                            </a>

                                                                            <a href="{{ url('/employee/member/kyc/'.$kyc->id.'/2') }}" class="dropdown-item">
                                                                                <i data-feather='eye'></i>
                                                                                Decline
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                            <!-- form -->
                                            <form class="forms-sample mt-4" action="{{ url('/user/member/update-kyc/'.$user->id) }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="form-group col-lg-3 col-mg-3">
                                                        <label for="document">Document Type<sup style="color:red;">*</sup></label>
                                                        <select class="form-control" name="document_type" required>
                                                            <option selected="" disabled="">Select your document</option>
                                                            <option>Aadhar Card</option>
                                                            <option>PAN Card</option>
                                                        </select>
                                                            @if($errors->has('document_type'))
                                                                <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                    <strong>{{ $errors->first('document_type') }}</strong>
                                                                </p>
                                                            @endif
                                                    </div>
            
                                                    <div class="form-group col-lg-3 col-mg-3">
                                                        <label for="document">Document No.<sup style="color:red;">*</sup></label>
                                                        <input type="text" class="form-control" name="document_number" placeholder="Document No." required>
                                                            @if($errors->has('document_number'))
                                                                <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                    <strong>{{ $errors->first('document_number') }}</strong>
                                                                </p>
                                                            @endif
                                                    </div>
                                                    
                                                    <div class="form-group col-lg-2 col-mg-2">
                                                        <label for="file">Document Front<sup style="color:red;">*</sup></label>
                                                        <label onclick="$('#front_image').trigger('click');" class="btn btn-sm btn-primary mb-75 mr-75">Upload</label>
                                                        <input type="file" id="front_image" name="front_image" hidden accept="image/*" />
                                                            @if($errors->has('front_image'))
                                                                <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                    <strong>{{ $errors->first('front_image') }}</strong>
                                                                </p>
                                                            @endif                                        
                                                    </div>
            
                                                    <div class="form-group col-lg-2 col-mg-2">
                                                        <label for="file">Document Back<sup style="color:red;">*</sup></label>
                                                        <label onclick="$('#back_image').trigger('click');" class="btn btn-sm btn-primary mb-75 mr-75">Upload</label>
                                                        <input type="file" id="back_image" name="back_image" hidden accept="image/*" />
                                                            @if($errors->has('back_image'))
                                                                <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                    <strong>{{ $errors->first('back_image') }}</strong>
                                                                </p>
                                                            @endif                                          
                                                    </div>
                                                    <div class="form-group col-lg-2 col-mg-2">
                                                        <label for="submit">&nbsp;</label> 
                                                        <button type="submit" class="form-control btn btn-primary mr-2">Update</button>
                                                    </div>
                                                </div>                                
                                            </form>
                                            <!--/ form -->
                                        </div>
                                    </div>
                                </div>
                                <!-- End Bank Detail Card -->
                            </div>
                            <!-- Social Tab ends -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- users edit ends -->
        </div>
    </div>
</div>
<!-- END: Content-->

@endsection