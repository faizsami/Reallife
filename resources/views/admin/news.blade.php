@extends('layouts.main')
@section('page_name', 'News')
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
                        <h2 class="content-header-title float-left mb-0">News</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin/news') }}">News</a>
                                </li>
                                <li class="breadcrumb-item active">News
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
                    <div class="col-md-6 grid-margin stretch-card mx-auto mt-1">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Update News</h6>
                                <form class="forms-sample" method="post" action="{{ url('/admin/news') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label">News</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="news" rows="10"  required>{{ $news->news }}</textarea>
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
                                    <div class="text-center form-group row">
                                        <div class="col-sm-3 col-form-label"></div>
                                        <div class="col-sm-9">
                                            <button type="submit" id="sub_btn" class="btn btn-primary form-control">Update</button>
                                            <button type="submit" onclick="event.preventDefault()" class="btn btn-warning form-control mt-1">Disable</button>
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