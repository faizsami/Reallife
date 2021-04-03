@extends('layouts.main')
@section('page_name', 'Add Product')
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
                        <h2 class="content-header-title float-left mb-0">Add Product</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('/admin/products') }}">Products</a>
                                </li>
                                <li class="breadcrumb-item active">Add Product
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                            <form action="{{ url('/admin/add-product') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-12">
                                        <img class="img-thumbnail" height="250px" width="200px" src="{{ asset('uploads/products/product.png') }}" id="product_img"/>
                                        <div class="form-group text-center">
                                            <label for="file">Product Image<sup style="color:red;">*</sup></label><br>
                                            <label onclick="$('#product_img_uploader').trigger('click');" class="btn btn-sm btn-gradient-primary">Upload</label>
                                            <input type="file" id="product_img_uploader" name="image" hidden accept="image/*" />
                                            @if($errors->has('front_image'))
                                                <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                <strong>{{ $errors->first('front_image') }}</strong>
                                            </p>
                                            @endif
                                            @if($errors->has('image'))
                                                <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                    <strong>{{ $errors->first('image') }}</strong>
                                                </p>
                                            @endif
                                        </div>                                        
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-12">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="row">
                                                    <div class="col-10">
                                                        <div class="form-group">
                                                            <label class="control-label">Select Category</label>
                                                            <Select name="category_id" class="form-control" id="category_id">
                                                                <option value="null" selected disabled>Select Category</option>
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                                @endforeach
                                                            </Select>
                                                            @if($errors->has('category_id'))
                                                                <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                    <strong>{{ $errors->first('category_id') }}</strong>
                                                                </p>
                                                            @endif
                                                        </div>  
                                                    </div>
                                                    <div class="col-1">
                                                        <div class="form-controll">
                                                            <label class="control-label">&nbsp;</label>
                                                            <button onclick="event.preventDefault();" class="btn btn-gradient-primary" data-toggle="modal" data-target="#categorymodel"><i data-feather='plus'></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="row">
                                                    <div class="col-10">
                                                        <div class="form-group">
                                                            <label class="control-label">Sub Category</label>
                                                            <Select name="sub_category_id" class="form-control" id="sub_category_id">
                                                                <option value="null" selected disabled>Select Category</option>                                        
                                                            </Select>
                                                            @if($errors->has('sub_category_id'))
                                                                <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                    <strong>{{ $errors->first('sub_category_id') }}</strong>
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-1">
                                                        <div class="form-controll">
                                                            <label class="control-label">&nbsp;</label>
                                                            <a href="#" onclick="event.preventDefault();" data-toggle="modal" data-target="#subcategorymodel" class="btn btn-gradient-primary"><i data-feather='plus'></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Product Code</label>
                                                    <input type="text" onkeypress="return isAlphaKeysWithNumeric(event)" name="product_code" class="form-control" placeholder="Product Code">
                                                    @if($errors->has('product_code'))
                                                        <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                            <strong>{{ $errors->first('product_code') }}</strong>
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Product Name</label>
                                                    <input type="text" id="nameinput" name="name" onkeypress="return isAlphaKeys(event)" onkeyup="clearmultispace($(this).val(), $(this).attr('id'))" class="form-control" placeholder="Product Name">
                                                    @if($errors->has('name'))
                                                        <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Product Weight</label>
                                                    <input type="text" class="form-control" name="weight" maxlength="4" onkeypress="return isNumberKey(event)" placeholder="Product Weight (gram)">
                                                    @if($errors->has('weight'))
                                                        <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                            <strong>{{ $errors->first('weight') }}</strong>
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Product Price</label>
                                                    <input type="text" class="form-control" name="price" maxlength="10" onkeypress="return isNumberKey(event)" placeholder="Product Price">
                                                    @if($errors->has('price'))
                                                        <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                            <strong>{{ $errors->first('price') }}</strong>
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Sell Price</label>
                                                    <input type="text" class="form-control" name="sprice" maxlength="10" onkeypress="return isNumberKey(event,this)" placeholder="Sell Price">
                                                    @if($errors->has('price'))
                                                        <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                            <strong>{{ $errors->first('price') }}</strong>
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Add Stock</label>
                                                    <input type="number" name="stock" onkeypress="return isNumberKey(event)" class="form-control" placeholder="Add Stock">
                                                    @if($errors->has('stock'))
                                                        <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                            <strong>{{ $errors->first('stock') }}</strong>
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Product BV</label>
                                                    <input type="number" name="bv" onkeypress="return isNumberKey(event)" class="form-control" autocomplete="off" placeholder="Product BV">
                                                    @if($errors->has('bv'))
                                                        <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                            <strong>{{ $errors->first('bv') }}</strong>
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">Description</label>
                                                    <textarea name="description" class="form-control" autocomplete="off" rows="1" placeholder="Description"></textarea>
                                                    @if($errors->has('description'))
                                                        <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label">&nbsp;</label><br>
                                                    <button type="submit"  class="btn btn-gradient-primary float-right">
                                                        <i data-feather='plus'></i>
                                                        Add Product
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->


<!--BEGIN: Category Model -->
<div class="modal fade text-left" id="categorymodel" tabindex="-1" aria-labelledby="categorymodel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel33">Add Category</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form method="post" action="{{ url('/admin/add-categories') }}" id="addCategoryForm">
            @csrf
          <div class="modal-body">
            <label>Title: </label>
            <div class="form-group">
                <input type="text" id="cateNameID" onkeyup="clearmultispace($(this).val(), $(this).attr('id'))" onkeypress="return isAlphaKeysWithNumeric(event)" class="form-control" name="title" placeholder="Category Title" autocomplete="off" required>
                @if($errors->has('title'))
                    <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </p>
                @endif
                <p class="invalid-feedback text-danger" id="nameError" style="display:none!important;" role="alert">
                    <strong>Oops.! </strong> please enter category name.
                </p>
            </div>

            <label>GST(%): </label>
            <div class="form-group">
                <input type="text" id="gstCateID" onkeyup="checkforgst($(this).val())" onkeypress="return isNumberKey(event)" maxlength="2" class="form-control" name="gst" autocomplete="off" placeholder="GST">
                @if($errors->has('gst'))
                    <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                        <strong>{{ $errors->first('gst') }}</strong>
                    </p>
                @endif

                <p class="invalid-feedback text-danger" id="gstError" style="display:none!important;" role="alert">
                    <strong>Error.! </strong> please enter a valid GST.
                </p>
            </div>
            <label>HSN CODE: </label>
            <div class="form-group">
                <input type="text" id="hsnCatID" onkeypress="return isNumberKey(event)"  class="form-control" name="hsn" autocomplete="off" placeholder="HSN CODE">
                @if($errors->has('hsn'))
                    <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                        <strong>{{ $errors->first('hsn') }}</strong>
                    </p>
                @endif

                <p class="invalid-feedback text-danger" id="hsnError" style="display:none!important;" role="alert">
                    <strong>Oops.! </strong> please enter the HSN Code of product category.
                </p>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-primary waves-effect waves-float waves-light" onclick="event.preventDefault(); addCategory()">Add Category</button>
          </div>
        </form>
      </div>
    </div>
</div>
<!--END: Category Model -->

<!--BEGIN: Sub-category Model -->
<div class="modal fade text-left" id="subcategorymodel" tabindex="-1" aria-labelledby="subcategorymodel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel33">Add Sub-category</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form method="post" action="{{ url('/admin/add-sub-category') }}">
            @csrf
          <div class="modal-body">
            <label>Select Category: </label>
            <div class="form-group">
                @php
                    $categories = App\Models\Category::get()->all();
                @endphp
                <select name="category_id" class="form-control" required>
                    <option value="null" disabled>Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
                @if($errors->has('category_id'))
                    <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                        <strong>{{ $errors->first('category_id') }}</strong>
                    </p>
                @endif
            </div>

            <label>Title: </label>
            <div class="form-group">
                <input type="text" id="sub_Cate_idssf" onchange="notNull($(this).attr('id'))" maxlength="100" class="form-control" name="sub_category" autocomplete="off" placeholder="Sub Category">
                @if($errors->has('sub_category'))
                    <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                        <strong>{{ $errors->first('sub_category') }}</strong>
                    </p>
                @endif 

                <p class="invalid-feedback text-danger" id="subcaterror" style="display:none!important;" role="alert">
                    <strong>Error.! </strong> Text fields could not be null.
                </p>
            </div>
          </div>
          <div class="modal-footer">
            <button id="sub_btn_subcate" type="submit" class="btn btn-primary waves-effect waves-float waves-light" disabled>Add Sub Category</button>
          </div>
        </form>
      </div>
    </div>
</div>
<!--END: Sub-category Model -->
<script>
    function addCategory()
    {
        var form = $('#addCategoryForm'),
        name = $('#cateNameID'), 
        gst = $('#gstCateID'), 
        hsn = $('#hsnCatID'),
        nameError = $('#nameError'),
        gstError = $('#gstError'),
        hsnError = $('#hsnError');

        if(name.val().length <= 0)
        {
            nameError.show();
        }
        else if(gst.val().length <=0 || parseInt(gst.val()) > 28 || parseInt(gst.val()) < 0)
        {
            nameError.hide();
            gstError.show();
        }
       
        else
        {
            nameError.hide();
            gstError.hide();
            hsnError.hide();

            form.submit();
        }
    }

    $(document).ready(function () {
        $('#category_id').change(function() 
        {
            var id = $('#category_id').val();

            //calling ajax
            $.ajax({
            type:'get',
            url:'/get-sub-cat-by-cat-id',
            data:"_token=d<?php echo csrf_token(); ?>&id="+id+"",
            success:function(data) 
            {
                $('.custom_option').remove();
                var json = data;
                for (var key in json) 
                {
                    if (json.hasOwnProperty(key)) 
                    {                        
                        $('#sub_category_id').append('<option class="custom_option" value="'+json[key].id+'">'+json[key].title+'</option>');                        
                    }
                }               
            },
            error:function(error)
            {
                $('#sub_category_id').append('<option class="custom_option" value="" selected disabled>There is an error.</option>');
            }
            });
        });
    });


                //validating isnumber only
        function isNumberKey(evt,element){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57) && !(charCode == 46 || charCode == 8))
                 return false;
            else {
                    var len = $(element).val().length;
                    var index = $(element).val().indexOf('.');
                    if (index > 0 && charCode == 46) {
                        return false;
                    }
                    if (index > 0) {
                        var CharAfterdot = (len + 1) - index;
                    if (CharAfterdot > 3) {
                        return false;
                    }
                }

            }
                return true;
          }

      //only alphabets validation

      function isAlphaKeys(evt)
      {
        var regex = new RegExp("^[a-zA-Z ]+$");
            var str = String.fromCharCode(!evt.charCode ? evt.which : evt.charCode);
            if (regex.test(str)) {
              return true;
            }
            else
            {			
              return false;
            }
      }

      //alphabets with numeric validation

      function isAlphaKeysWithNumeric(evt)
      {
        var regex = new RegExp("^[a-zA-Z0-9 ]+$");
            var str = String.fromCharCode(!evt.charCode ? evt.which : evt.charCode);
            if (regex.test(str)) {
              return true;
            }
            else
            {			
              return false;
            }
      }

      function clearmultispace(value, id)
      {
          console.log(id);
        var str = value;
          str = str.replace(/  +/g, ' ');
          $('#'+id).val(str);
      }      

        //sub cat not null
        function notNull(id)
        {
            var value = $('#'+id).val();
            if(value === '')
            {
                $('#subcaterror').show();
                $('#sub_btn_subcate').attr('disabled', true);
            }
            else
            {
                $('#subcaterror').hide();
                $('#sub_btn_subcate').attr('disabled', false);
            }
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                $('#product_img').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]); // convert to base64 string
                }

            }

            $("#product_img_uploader").change(function() {
            readURL(this);
        });    
</script>
@endsection