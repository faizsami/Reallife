@extends('layouts.main')
@section('page_name', 'Add Category')
@section('content')
@include('partials.errors')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h4 class="m-0 text-dark">Edit Sub-category</h4>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Sub-category</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container">
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card mx-auto mt-5">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Edit Sub-category</h6>
                    <form class="forms-sample" method="post" action="{{ url('/admin/edit-sub-category') }}">
                        @csrf
                        <input value="{{$sub->id}}" name="id" hidden>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Select Category</label>
                            <div class="col-sm-9">
                                <select name="category_id">
                                    <option value="{{ $sub->category->id }}" selected>{{ $sub->category->title }}</option>
                                    @foreach($categories as $category)
                                        @if($category->id != $sub->category->id)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @if($errors->has('category_id'))
                                    <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Sub-category</label>
                            <div class="col-sm-9">
                                <input type="text" maxlength="100" value="{{ $sub->title }}" class="form-control" name="sub_category" autocomplete="off" placeholder="Sub Category">
                                @if($errors->has('sub_category'))
                                    <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                        <strong>{{ $errors->first('sub_category') }}</strong>
                                    </p>
                                @endif                                
                            </div>
                        </div>
                        <div class="text-center form-group row">
                            <div class="col-sm-3 col-form-label"></div>
                            <div class="col-sm-9">
                                <button type="submit" id="sub_btn" class="btn btn-primary form-control">Update Sub-category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection