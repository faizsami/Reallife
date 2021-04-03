@extends('layouts.user')
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
                            <form class="auth-register-form mt-2" action="{{ url('/user-registration') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$id}}" name="pid" hidden />
                            <div class="row">
                                <div class="form-group col-lg-6 col-md-6">
                                <label for="exampleInputUsername1">Refferal Id</label>
                                <input value="{{Auth::user()->user_id}}" type="text" class="form-control" onkeypress=" return isAlphaNumericKey(event)" onchange="getName()" id="ref_id" name="refferal_id" autocomplete="false" placeholder="Enter Refferal Id" tabindex="2"  required readonly/>
                                @if($errors->has('refferal_id'))
                                    <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                    <strong>{{ $errors->first('refferal_id') }}</strong>
                                    </p>
                                @endif
                                </div>
    
                                <div class="form-group col-lg-6 col-md-6">
                                <label for="exampleInputUsername1">Refferal Provider</label>
                                <input value="{{App\Models\User::where('user_id', $id)->exists() ? App\Models\User::where('user_id', $id)->get()->first()->user_name : 'Invalid user id ('.$id.').'}}" type="text" class="form-control" id="ref_provider" name="ref_provider" autocomplete="off" placeholder="Refferal Provide" readonly>
                                </div>
                            </div>

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
                                <div class="col-lg-4 col-md-4 col-12">
                                    <label class="for-term-and-condition">Assign Customer</label>
                                    <div class="form-check form-check-flat form-check-primary">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="0" name="assign_customer" tabindex="5" {{ $position == 0 ? 'checked' : ''}} required>
                                        Left
                                    </label>                     
                                    </div>
        
                                    <div class="form-check form-check-flat form-check-primary">                            
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="1" name="assign_customer" tabindex="5" {{ $position == 1 ? 'checked' : ''}} required/>
                                        Right
                                    </label>                     
                                    </div>
                                    @if($errors->has('assign_customer'))
                                        <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                        <strong>{{ $errors->first('assign_customer') }}</strong>
                                        </p>
                                    @endif
                                </div>

                                <div class="form-group col-12 col-lg-8 col-md-8">
                                    <label class="for-term-and-condition">Terms & Conditions</label>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" id="register-privacy-policy" type="checkbox" name="terms_and_conditions" onchange="getName()" tabindex="6" required/>
                                        <label class="custom-control-label" for="register-privacy-policy">I agree to<a href="#">&nbsp;privacy policy & terms</a></label>
                                    </div>
                                </div>
                                </div><br>
                                @if(Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success!</strong> {{ Session::get('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>                          
                                {{ Session::forget('success')}}
                                @endif
                                @if(Session::has('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{ Session::get('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>  
                                {{ Session::forget('error')}}
                                @endif
                                <button class="btn btn-primary btn-block" type="submit" id="sub_btn" tabindex="7" disabled>Add User</button>
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
<!-- END: Content-->
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
              console.log(charCode);
              if(charCode == 43)
              {
                return true;
              }
              else
              {
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
                return true;
              }
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
@endsection