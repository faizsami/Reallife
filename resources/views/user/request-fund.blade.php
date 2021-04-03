@extends('layouts.user')
@section('page_name', 'Request Fund')
@section('content')
@include('partials.errors')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/pickers/pickadate/pickadate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugins/forms/pickers/form-pickadate.css') }}">
<!-- BEGIN: Content-->
<div class="app-content content ecommerce-application">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">

        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Request Money</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('/user/wallet') }}">Wallet</a>
                                </li>
                                <li class="breadcrumb-item active">Request Money
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>                    
            </div>
        </div><br>

        <div class="content-detached">
            <div class="content-body">

                <div class="container">
                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card mx-auto mt-5">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">Request Fund</h6>
                                    <form class="forms-sample" method="post" action="{{ url('/user/request-fund') }}">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Transaction Id</label>
                                            <div class="col-sm-9">
                                                <input type="id" class="form-control" id="transaction_id" name="transaction_id" placeholder="TXN00222222201" autocomplete="off" required>
                                                @if($errors->has('transaction_id'))
                                                    <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                        <strong>{{ $errors->first('transaction_id') }}</strong>
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Transaction Date</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="fp-default" name="transaction_date" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" required/>
                                                @if($errors->has('transaction_date'))
                                                    <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                        <strong>{{ $errors->first('transaction_date') }}</strong>
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">Amount</label>
                                            <div class="col-sm-9">
                                                <input type="text" maxlength="7" onkeypress="return isNumberKey(event)" class="form-control" name="amount" placeholder="Amount" required>
                                                @if($errors->has('amount'))
                                                    <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                        <strong>{{ $errors->first('amount') }}</strong>
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="text-center form-group row">
                                            <div class="col-sm-3 col-form-label"></div>
                                            <div class="col-sm-9">
                                                <button type="submit" id="sub_btn" class="btn btn-primary form-control">Request</button>
                                            </div>
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
</div>
<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('assets/vendors/js/pickers/pickadate/picker.js') }}"></script>
<script src="{{ asset('assets/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
<script src="{{ asset('assets/vendors/js/pickers/pickadate/picker.time.js') }}"></script>
<script src="{{ asset('assets/vendors/js/pickers/pickadate/legacy.js') }}"></script>
<script src="{{ asset('assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Page JS-->
<script src="{{ asset('assets/js/scripts/forms/pickers/form-pickers.js') }}"></script>
<!-- END: Page JS-->
<script>
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
</script>
@endsection