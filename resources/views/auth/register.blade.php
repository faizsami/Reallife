<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Regal Life India">
    <meta name="keywords" content="Regal Life India">
    <meta name="author" content="TechInspire">
    <title>Register Page - Regal Life India</title>
    <link rel="apple-touch-icon" href="{{ asset('assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/vendors.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/themes/bordered-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/page-auth.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/all.css') }}"><!-- FontAwesome CSS-->
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static   menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v2">
                    <div class="auth-inner row m-0">
                        <!-- Brand logo--><a class="brand-logo" href="javascript:void(0);">                            
                            <h2 class="brand-text text-primary ml-1">
                              Regal Life India
                              </h2>
                        </a>
                        <!-- /Brand logo-->
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-6 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="{{ asset('assets/images/pages/register-v2.svg') }}" alt="Register V2" /></div>
                        </div>
                        <!-- /Left Text-->
                        <!-- Register-->
                        <div class="d-flex col-lg-6 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h4 class="card-title mb-1">Adventure starts here 🚀</h4>
                                <p class="card-text mb-2">Make your app management easy and fun!</p>                                
                                <form class="auth-register-form mt-2" action="{{ url('/user-registration') }}" method="POST" id="registration-from">
                                  @csrf
                                  <input type="hidden" value="" name="pid" hidden />
                                  <div class="row">
                                    @php($id = '')
                                    @php($name_user = '')
                                    @php($auto = 0)
                                    @if(Session::has('refferal'))
                                      @php($id = Session::get('refferal'))
                                      @php($name_user = Session::get('refferal_name'))
                                      @php(Session::forget('refferal'))
                                      @php(Session::forget('refferal_name'))
                                      @php($auto = 1)
                                    @endif
                                    <div class="form-group col-lg-6 col-md-6">
                                      <label for="exampleInputUsername1">Refferal Id</label>
                                      <input type="text" class="form-control" onkeypress=" return isAlphaNumericKey(event)" onchange="getName()" value="{{$id}}" id="ref_id" name="refferal_id" autocomplete="false" placeholder="Enter Refferal Id" tabindex="2"  {{$auto == 0 ? 'autofocus' : 'readonly' }} required/>
                                      @if($errors->has('refferal_id'))
                                        <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                          <strong>{{ $errors->first('refferal_id') }}</strong>
                                        </p>
                                      @endif
                                    </div>
          
                                    <div class="form-group col-lg-6 col-md-6">
                                      <label for="exampleInputUsername1">Refferal Provider</label>
                                      <input type="text" class="form-control" id="ref_provider" name="ref_provider" value="{{$name_user}}" autocomplete="off" placeholder="Refferal Provide" readonly>
                                    </div>
                                  </div>

                                    <div class="form-group">
                                        <label class="form-label" for="register-username">Full Name</label>
                                        <input class="form-control" id="full_name" type="text" maxlength="50" onkeyup="clearmultispace($(this).val(), $(this).attr('id'))" onkeypress="return isAlphaKey(event)" name="name" placeholder="Enter Full Name" tabindex="2" {{$auto == 1 ? 'autofocus' : '' }} required/>
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
                                      <div class="form-group col-lg-4 lol-md-4">
                                        <label class="form-label" for="register-mobile">Country Code</label>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <select class="form-control" name="country_code">
                                              @php($countries = App\Models\Country::get()->all())
                                              @foreach($countries as $country)
                                                <option value="{{ '+'.$country->phonecode }}" {{$country->phonecode == 91 ? 'selected' : ''}}>{{ '(+'.$country->phonecode.')'.$country->name }}</option>
                                              @endforeach
                                            </select>
                                            @if($errors->has('country_code'))
                                              <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                <strong>{{ $errors->first('country_code') }}</strong>
                                              </p>
                                            @endif
                                        </div>
                                      </div>
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
                                      <div class="col-lg-4 col-md-4">
                                        <label class="for-term-and-condition">Assign Customer</label>
                                        <div class="form-check form-check-flat form-check-primary">
                                          <label class="form-check-label">
                                              <input type="radio" class="form-check-input" value="0" name="assign_customer" tabindex="5">
                                              Left
                                          </label>                     
                                        </div>
              
                                        <div class="form-check form-check-flat form-check-primary">                            
                                          <label class="form-check-label">
                                              <input type="radio" class="form-check-input" value="1" name="assign_customer" tabindex="5" required/>
                                              Right
                                          </label>                     
                                        </div>
                                          @if($errors->has('assign_customer'))
                                            <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                              <strong>{{ $errors->first('assign_customer') }}</strong>
                                            </p>
                                          @endif
                                      </div>

                                      <div class="form-group col-8">
                                        <label class="for-term-and-condition">Terms & Conditions</label>
                                          <div class="custom-control custom-checkbox">
                                              <input class="custom-control-input" id="register-privacy-policy" type="checkbox" name="terms_and_conditions" onchange="getName()" tabindex="6" required/>
                                              <label class="custom-control-label" for="register-privacy-policy">I agree to<a href="#">&nbsp;privacy policy & terms</a></label>
                                          </div>
                                      </div>
                                    </div><br>
                                    @if(Session::has('success'))
                                      <div class="alert alert-success alert-dismissible fade show p-1" role="alert">
                                        <strong>Success!</strong> {{ Session::get('success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>                          
                                      {{ Session::forget('success')}}
                                    @endif
                                    @if(Session::has('error'))
                                    <div class="alert alert-danger alert-dismissible fade show p-1" role="alert">
                                      <strong>Error!</strong> {{ Session::get('error') }}
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>  
                                      {{ Session::forget('error')}}
                                    @endif
                                    <button class="btn btn-primary btn-block" type="submit" id="sub_btn" tabindex="7" onclick="event.preventDefault();requestFilter('registration-from', 'sub_btn', 'loading_spinner');" disabled>
                                      <i class="fas fa-spinner fa-spin" style="display: none;" id="loading_spinner"></i> Register
                                    </button>
                                </form>
                                <p class="text-center mt-2"><span>Already have an account?</span><a href="{{ route('login') }}"><span>&nbsp;Sign in instead</span></a></p>
                                {{-- <div class="divider my-2">
                                    <div class="divider-text">or</div>
                                </div>
                                <div class="auth-footer-btn d-flex justify-content-center"><a class="btn btn-facebook" href="javascript:void(0)"><i data-feather="facebook"></i></a><a class="btn btn-twitter white" href="javascript:void(0)"><i data-feather="twitter"></i></a><a class="btn btn-google" href="javascript:void(0)"><i data-feather="mail"></i></a><a class="btn btn-github" href="javascript:void(0)"><i data-feather="github"></i></a></div> --}}
                            </div>
                        </div>
                        <!-- /Register-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('assets/js/scripts/pages/page-auth-register.js') }}"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>

<script>
  function getName(){
    var id = $("#ref_id").val();
    $.ajax({
      type:'get',
      url:'/get-user-by-id',
      data:"_token=d<?php echo csrf_token(); ?>&id="+id+"",
      success:function(data) {
        $("#ref_provider").val(data.name);
        if(data.status != 1)
        {
          $("#sub_btn").attr('disabled', true);
        }
        else
        {
          if($("#register-privacy-policy").is(':checked'))
          {
            $("#sub_btn").attr('disabled', false);
            isValidEmail($("#register-email").val());
          }
          else
          {
            $("#sub_btn").attr('disabled', true);
          }
        }
      },
      error:function(error){
        $("#ref_provider").val("There is an error. Error code = "+error.status);
        $("#sub_btn").attr('disabled', true);
      }
    });
  }

    //validating isnumber only
    function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }

    //only alphabets validation

    function isAlphaKey(e)
    {
      var regex = new RegExp("^[a-zA-Z ]+$");
          var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
          if (regex.test(str)) {
            return true;
          }
          else
          {			
            return false;
          }
    }

    //Only Alphabets and numeric keys
    function isAlphaNumericKey(e)
      {
        var regex = new RegExp("^[a-zA-Z0-9]+$");
            var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
            if (regex.test(str)) {
              return true;
            }
            else
            {			
              return false;
            }
      }

    //validating email
    function isValidEmail(email)
    {
      //var email = "sdfsd";//$(this).val();
      if(!isValidEmailAddress(email))
      {
        $('#email_error').show();
        $("#sub_btn").attr('disabled', true);
      }
      else
      {
        $('#email_error').hide();
        getName();
      }
    }
    function isValidEmailAddress(emailAddress) {
        var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
        return pattern.test(emailAddress);
    };

    function clearmultispace(value, id)
    {
      var str = value;
      str = str.replace(/  +/g, ' ');
      $('#'+id).val(str);
    }

    function isSpace(evt)
    {
      var charCode = (evt.which) ? evt.which : evt.keyCode
            if (charCode == 32)
                return false;
            return true;
    }
</script>
<script>
  function requestFilter(form, btn, spinner)
  {
      $('#'+btn).attr('disabled', true);
      $('#'+spinner).show();
      setTimeout(() => {
          $('#'+form).submit();
      }, 0);                        
  }
</script>
@include('partials.errors')
</body>
<!-- END: Body-->

</html>