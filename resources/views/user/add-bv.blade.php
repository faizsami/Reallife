@extends('layouts.user')
@section('page_name', 'Add BV')
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
                        <h2 class="content-header-title float-left mb-0">Add BV</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/user/dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Add BV
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
                    <div class="col-md-6 grid-margin stretch-card mx-auto mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Add BV</h6>
                                <form class="forms-sample" method="post" action="{{ url('/user/add-bv') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">Request To (ID)</label>
                                        <div class="col-sm-9">
                                            <input type="id" onchange="getName()" class="form-control" id="ref_id" name="id" placeholder="Request To" autocomplete="off" required>
                                            @if($errors->has('request_to'))
                                                <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                    <strong>{{ $errors->first('request_to') }}</strong>
                                                </p>
                                            @endif
            
                                            <p class="invalid-feedback text-danger" id="self_error" style="display:none!important;" role="alert">
                                                <strong>Error! </strong> Cannot send request to yourself.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">Request to (Name)</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="ref_provider" class="form-control" name="name" autocomplete="off" placeholder="Name" readonly>
                                            @if($errors->has('name'))
                                                <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">Amount</label>
                                        <div class="col-sm-9">
                                            <input type="text" maxlength="6" onkeypress="return isNumberKey(event)" class="form-control" name="amount" placeholder="Amount" required>
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
                                            <button type="submit" id="sub_btn" class="btn btn-primary form-control" disabled>Request</button>
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
<!-- END: Content-->



<script>
    function getName(){
      var id = $("#ref_id").val();
      var self_id = "{{ Auth::user()->user_id }}";
      if(id == 1)
      {
        $("#self_error").show();
        $("#sub_btn").attr('disabled', true);
      }
      else
      {
        $("#self_error").hide();
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
                $("#sub_btn").attr('disabled', false);
            }
            },
            error:function(error){
            $("#ref_provider").val("There is an error. Error code = "+error.status);
            $("#sub_btn").attr('disabled', true);
            }
        });
      }
    }
  </script>

@endsection