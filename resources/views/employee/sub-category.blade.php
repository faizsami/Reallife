@extends('layouts.employee')
@section('page_name', 'Sub Categories')
@section('content')
@include('partials.errors')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/vendors.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
<!-- END: Vendor CSS-->
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Sub-Categories</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/employee/products') }}">Products</a>
                                </li>
                                <li class="breadcrumb-item active">Sub-Categories Lists
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">            
            <!-- Basic table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card p-1">
                            <div class="card-header">
                                <h4 class="card-title"> Categories List</h4>
                                <a href="#" onclick="event.preventDefault();" data-toggle="modal" data-target="#categorymodel" class="btn btn-primary float-right"><i data-feather='plus'></i> Add Sub-Category</a>
                            </div>
                            <table class="table" id="subcatTable">
                                <thead>
                                    <th>#</th>
                                    <th>Sub-Cat Name</th>
                                    <th>Category Name</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>@php($i=1)
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$category->title}}</td>
                                            <td>{{$category->category->title}} </td>
                                            <td>{{$category->created_at}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="dropdown-toggle hide-arrow" data-toggle="dropdown">                                                                
                                                        <i data-feather='more-vertical'></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" onclick="event.preventDefault(); editcategory('{{ url('/employee/edit-sub-category/'.$category->id) }}', '{{$category->category->title}}', '{{$category->category->id}}', '{{$category->title}}')" data-toggle="modal" data-target="#categorymodeledit" class="dropdown-item">
                                                            <i data-feather='edit'></i>
                                                            Edit
                                                        </a>

                                                        <a href="{{ url('/employee/delete-sub-category/'.$category->id) }}" class="dropdown-item">
                                                            <i data-feather='trash-2'></i>
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @php($i++)
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Category GST</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Basic table -->
        </div>
    </div>
</div>
<!-- END: Content-->

<!--BEGIN: Category Model -->
<div class="modal fade text-left" id="categorymodel" tabindex="-1" aria-labelledby="categorymodel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel33">Add Sub-Category</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form method="post" action="{{ url('/employee/add-sub-category') }}">
            @csrf
          <div class="modal-body">
            <label>Select Category: </label>
            <div class="form-group">
                <select name="category_id" class="form-control">
                    <option value="null" selected disabled>Select Category</option>
                    @foreach($cats as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->title }}</option>
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
                <input type="text" maxlength="100" class="form-control" name="sub_category" autocomplete="off" placeholder="Sub Category">
                @if($errors->has('sub_category'))
                    <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                        <strong>{{ $errors->first('sub_category') }}</strong>
                    </p>
                @endif
            </div>
          </div>
          <div class="modal-footer">
            <button id="sub_btn_cate" type="submit" class="btn btn-primary waves-effect waves-float waves-light">Add Sub-Category</button>
          </div>
        </form>
      </div>
    </div>
</div>
<!--END: Category Model -->

<!--BEGIN: Edit Category Model -->
<div class="modal fade text-left" id="categorymodeledit" tabindex="-1" aria-labelledby="categorymodeledit" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel33">Edit Category</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form method="post" action="" id="editcategoryform">
            @csrf
          <div class="modal-body">
            <label>Select Category: </label>
            <div class="form-group">
                <select name="category_id" class="form-control" id="cateName_idedit">                   
                </select>
                @if($errors->has('category_id'))
                    <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                        <strong>{{ $errors->first('category_id') }}</strong>
                    </p>
                @endif
            </div>

            <label>Title: </label>
            <div class="form-group">
                <input id="categstedit" type="text" maxlength="100" class="form-control" name="sub_category" autocomplete="off" placeholder="Sub Category">
                @if($errors->has('sub_category'))
                    <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                        <strong>{{ $errors->first('sub_category') }}</strong>
                    </p>
                @endif
            </div>
          </div>
          <div class="modal-footer">
            <button id="sub_btn_cate" type="submit" class="btn btn-primary waves-effect waves-float waves-light">Update Sub-Category</button>
          </div>
        </form>
      </div>
    </div>
</div>
<!--END: Edit Category Model -->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/tables/datatable/responsive.bootstrap4.js') }}"></script>
<script src="{{ asset('assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/tables/datatable/jszip.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Page JS-->
<script src="{{ asset('assets/js/scripts/tables/table-datatables-basic.js') }}"></script>
<!-- END: Page JS-->

<!-- BEGIN: ON Page JS-->
<script>
    //validating isnumber only
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
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

      function checkforgst(value)
        {
            if(value > 28 || value < 0)
            {
                $('#gsterror').show();
                $('#sub_btn_cate').attr('disabled', true);
            }
            else
            {
                $('#gsterror').hide();
                $('#sub_btn_cate').attr('disabled', false);

            }
        }
    
    //Toggle edit form
    function editcategory(url, cat, cat_id, title)
    {
        var json = {!! json_encode($cats) !!};
        $('.selectCateedit').remove();
        $('#editcategoryform').attr('action', url);
        $('#cateName_idedit').append('<option class="selectCateedit" value="'+cat_id+'" selected>'+cat+'</option>');
        $('#categstedit').val(title);

        for (var key in json) 
        {
            if (json.hasOwnProperty(key)) 
            {                        
                $('#cateName_idedit').append('<option class="selectCateedit" value="'+json[key].id+'">'+json[key].title+'</option>');                        
            }
        }  
    }
</script>
<!-- END: ON Page JS-->
<script>
    $(document).ready(function() {
        $('#subcatTable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
        
        //add btn clas
        setTimeout(function() {
            $('.buttons-print').empty();
            $('.buttons-print').prepend("<i class='fas fa-print'></i><span> Print</span>");

            $('.buttons-pdf').empty();
            $('.buttons-pdf').prepend("<i class='fas fa-file-pdf'></i><span> PDF</span>");

            $('.buttons-excel').empty();
            $('.buttons-excel').prepend("<i class='fas fa-file-excel'></i><span> Excel</span>");

            $('.buttons-csv').empty();
            $('.buttons-csv').prepend("<i class='fas fa-file-csv'></i><span> CSV</span>");

            $('.buttons-copy').empty();
            $('.buttons-copy').prepend("<i class='fas fa-copy'></i><span> Copy</span>");

            $('.dt-button').attr('class', 'btn btn-gradient-primary bg-lighten-5 btn-sm mt-1');
        }, 0);
    } );
</script>
@endsection