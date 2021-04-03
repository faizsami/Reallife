@extends('layouts.main')
@section('page_name', 'User Registration')
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
                      <h2 class="content-header-title float-left mb-0">Registration</h2>
                      <div class="breadcrumb-wrapper">
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a>
                              </li>
                              <li class="breadcrumb-item"><a href="{{ url('/admin/registration') }}">Registration</a>
                              </li>
                          </ol>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="content-body">            
        <div class="auth-wrapper auth-v2">
            <div class="auth-inner row m-0 ">  
                <!-- Register-->
                <div class="d-flex align-items-center auth-bg px-2 p-lg-5 mx-auto">
                  <div class="row">
                      <div class="col-12 px-xl-2 border border-primary p-2">
                          <h4 class="card-title mb-1 text-center mb-3 ">User Registration</h4>                              
                          <form class="auth-register-form mt-2" action="{{ url('/user-registration') }}" method="POST" id="registration-from">
                          @csrf
                         
                         
                              <div class="form-group">
                                  <label class="form-label" for="register-username">Full Name</label>
                                  <input class="form-control" id="full_name" type="text" maxlength="50" onkeyup="clearmultispace($(this).val(), $(this).attr('id'))" onkeypress="return isAlphaKey(event)" name="name" placeholder="Enter Full Name" tabindex="2" required/>
                                  @if($errors->has('name'))
                                  <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </p>
                                  @endif
                              </div>
                              <div class="form-group">
                                  <label class="form-label" for="register-email">Email</label>
                                  <input class="form-control" id="register-email" type="text" name="email" placeholder="neeraj@example.com" aria-describedby="register-email" tabindex="3" required/>
                                  @if($errors->has('email'))
                                  <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </p>
                                  @endif
                              </div>
                              <div class="row">
                              
                                <div class="form-group col-lg-8 lol-md-8">
                                    <label class="form-label" for="register-mobile">Mobile</label>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input class="form-control" maxlength="10" onkeypress="return isNumberKey(event)" type="text" name="mobile" placeholder="9998887777" tabindex="4" required/>
                                        @if($errors->has('mobile'))
                                          <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                              <strong>{{ $errors->first('mobile') }}</strong>
                                          </p>
                                        @endif
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                              

                             
                              </div><br>
                             
                              <button class="btn btn-primary btn-block" type="submit" id="sub_btn" tabindex="7" disabled onclick="event.preventDefault();requestFilter('registration-from', 'sub_btn', 'loading_spinner');">
                                <i class="fas fa-spinner fa-spin" style="display: none" id="loading_spinner"></i> Add User
                              </button>
                          </form>
                      </div>
                  </div>
              </div>
              <!-- /Register-->
            </div>
        </div>
      </div>
  </div>
</div>
*/
<!-- END: Content-->

@endsection