@extends('layouts.main')
@section('page_name', 'My Tree')
@section('content')
@php
    function fetch_left_right($t, $id)
    {        
        if(App\Models\UserBinary::where('userid', $id)->exists())
        {
            $userbinary =  App\Models\UserBinary::where('userid', $id)->get()->first();
            if($t==0){  return $userbinary->left_side; }
            else{ return $userbinary->right_side; }
        }else{ return 2; }
    }
@endphp
<style>
    hr.style18 {
  height: 38px;
  border-style: solid;
  border-color: #8c8b8b;
  border-width: 1px 0 0 0;
  border-radius: 50px;
  width:50%;
  margin-top: 0px!important;
  margin-bottom: 0px!important;
}

.hori_line
{
    margin-bottom: 0px!important;
    width:1px!important;
    height:10px;
    background-color:#8c8b8b;
}

    </style>
<link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper ">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">TeamView</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('/admin/tree') }}">TeamView</a>
                                </li>
                                <li class="breadcrumb-item active">Tree
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- BEGIN: CONTENT -->
            <div class="container-fruid">
                <div class="row">
                    <div class="col-12 col-lg-9 col-md-9"></div>
                <div class="blog-search col-12 col-lg-3 col-md-3">
                    <div class="input-group input-group-merge">
                        <input type="text" class="form-control" onchange="window.location='/admin/tree?id='+$(this).val() " placeholder="Search here">
                        <div class="input-group-append">
                            <span class="input-group-text cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card profile-card-2">
                   
                </div>
                <div class="card-body" >
                
                @php ($id=[$users_id] )
                @php($parent_id = [$users_id])

                @for($i=0;$i<=3;$i++)
                    @php($temp_id_index=0)
                    @php($temp_parent_id_index=0)
                    @php($divide=pow(2,$i))                    
                    @php($p_id= '')
                    
                    <div class="row "style="min-width:1180px!important">
                        @for($d=0;$d<$divide;$d++)
                            <div class="col text-center">
                                @if($id[$d]=='0' or $id[$d]=='2')  
                                    @if($parent_id[$d][0] =='0' or $parent_id[$d][0] =='2')                         
                                        <img src="{{ asset('assets/images/Asset3.png') }}" class="image-fluid rounded-circle" style="width:50px;cursor:pointer;" >
                                        {{-- {{$parent_id[$d][0]}} --}}
                                        <br>
                                        Add user
                                        @if($i != 3)
                                            <hr class="hori_line"> 
                                            <hr class="style18">
                                        
                                        @endif
                                    @else
                                        <img src="{{ asset('assets/images/Asset3.png') }}" class="image-fluid rounded-circle" style="width:50px;cursor:pointer;" onclick="window.location='registration?id={{$parent_id[$d][0]}}&position={{$parent_id[$d][1]}}'">
                                        {{-- {{$parent_id[$d][0]}} --}}
                                        <br>
                                        Add user
                                        @if($i != 3)
                                            <hr class="hori_line"> 
                                            <hr class="style18">
                                        
                                        @endif
                                    @endif
                                @else
                                    @php ($sbv= App\Models\UserBinary::where('userid', $id[$d])->exists() == true ? App\Models\UserBinary::where('userid', $id[$d])->get()->first()->self_bv : '')
                                    @if ($sbv<500)
                                        <img src="{{ asset('assets/images/Asset1.png') }}" class="image-fluid rounded-circle" style="width:50px;cursor:pointer;" onclick="getUserDetails('{{$id[$d]}}')" data-toggle="modal" data-target="#dark"  title="View Details">
                                    @else
                                        <img src="{{ asset('assets/images/Asset2.png') }}" class="image-fluid rounded-circle" style="width:50px;cursor:pointer;" onclick="getUserDetails('{{$id[$d]}}')" data-toggle="modal" data-target="#dark"  title="View Details">
                                    @endif
                                    <br>
                                    <a href="?id={{$id[$d]}}"  data-toggle="tooltip" data-placement="bottom" title="View Teamview">{{$id[$d]}}</a><br>
                                
                                    {{ App\Models\User::where('user_id', $id[$d])->exists() == true ? App\Models\User::where('user_id', $id[$d])->get()->first()->user_name : ''}}
                                    @if($i != 3)
                                        <hr class="hori_line">
                                        <hr class="style18">                               
                                    @endif
                                    @php($p_id = $id[$d])
                                @endif 
                            </div>
                            @php($prtId=$id[$d])
                            
                            @for($t=0;$t < 2;$t++)
                                @php($temId[$temp_id_index]=fetch_left_right($t,$prtId))
                                @php($temp_id_index++)

                                @php($tempId[$temp_parent_id_index]= [$prtId, $t])
                                @php($temp_parent_id_index++)
                            @endfor                            
                        @endfor                        
                        @php($parent_id = $tempId)
                        @php($id=$temId)                        
                    </div>
               @endfor
                
                </div>
            </div>
            <div class="modal fade modal-dark text-left" id="dark" tabindex="-1" role="dialog" aria-labelledby="myModalLabel150" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="userid">User Id</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                           
                            <dl class="row">
                                <dt class="col-xl-4 text-center "><p class="text-success"><strong> Self BV = </strong> <span id="self_bv">20</span> </p>                               
                                    <dd class="col-xl-8 text-center"><p class="text-success"><strong> Joining Date = </strong> <span id="created_at">20</span> </p></dd>
                                <dt class="col-xl-4 text-center "><p class="text-primary"><strong> Left BV = </strong> <span id="left_bv">20</span> </p>                               
                                <dd class="col-xl-8 text-center"><p class="text-primary"><strong> Right BV = </strong> <span id="right_bv">20</span> </p></dd>
                                <dt class="col-xl-4 text-center "><p class="text-warning"><strong> Left Count = </strong> <span id="left_count">20</span> </p>                               
                                    <dd class="col-xl-8 text-center"><p class="text-warning"><strong> Right Count = </strong> <span id="right_count">20</span> </p></dd>
                            </dl>
                            
                            {{-- <p><strong> LEFT BV = </strong> <span id="left_bv">20</span> </p>
                            <p><strong> RIGHT BV = </strong> <span id="right_bv">20</span> </p>
                            <p><strong> SELF BV = </strong> <span id="self_bv">20</span> </p> --}}
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- END: CONTENT -->
            
        </div>
    </div>
</div>
<!-- END: Content-->
<br><br>

<script>
    function getUserDetails(id)
    {
        $.ajax({
        type:'get',
        url:'/get-user-details',
        data:"_token=d<?php echo csrf_token(); ?>&id="+id+"",
        success:function(data) 
        {
            $('#left_bv').text(data.left_bv);
            $('#right_bv').text(data.right_bv);
            $('#self_bv').text(data.self_bv);
            $('#left_count').text(data.left_count);
            $('#right_count').text(data.right_count);
            $('#userid').text(data.userid);
            $('#created_at').text(data.created_at);

            if (data.left_bv>data.right_bv)
        {
            $('#sright_bv').text(data.self_bv);
            $('#sleft_bv').text(0);
            
        }
        else if(data.left_bv<data.right_bv)
        {
            $('#sright_bv').text(0);
            $('#sleft_bv').text(data.self_bv);
        }
        else
        {
            $('#sright_bv').text(data.self_bv/2);
            $('#sleft_bv').text(data.self_bv/2);
            
        }
        },
        error:function(error)
        {
            $('#left_bv').text('error');
            $('#right_bv').text('error');
            $('#self_bv').text('error');
        }
      });
    }
</script>
@endsection