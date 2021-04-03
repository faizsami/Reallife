@extends('layouts.employee')
@section('page_name', 'Change Password')
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
                        <h2 class="content-header-title float-left mb-0">Change Password</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/employee/dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">{{ Auth::user()->user_name }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 grid-margin stretch-card mx-auto mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Change Password</h6>
                                <form class="forms-sample" method="post" action="{{ url('/employee/change-password') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">Current Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="password" placeholder="Current Password" autocomplete="off">
                                            @if($errors->has('password'))
                                                <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">New Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="new_password" autocomplete="off" placeholder="New Password">
                                            @if($errors->has('new_password'))
                                                <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                    <strong>{{ $errors->first('new_password') }}</strong>
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">Confirm Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" name="confirm_new_password" placeholder="Confirm Password">
                                            @if($errors->has('confirm_new_password'))
                                                <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                    <strong>{{ $errors->first('confirm_new_password') }}</strong>
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary ">Change Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->
@endsection