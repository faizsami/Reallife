@extends('layouts.main')
@section('page_name', 'My Directs')
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
                        <h2 class="content-header-title float-left mb-0">My Directs</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('/admin/tree') }}">TreeView</a>
                                </li>
                                <li class="breadcrumb-item active">My Directs
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
                                <h4 class="card-title"> Direct's List</h4>                                
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="directTable">
                                        <thead>
                                            <th>#</th>
                                            <th>User</th>
                                            <th>Contact</th>
                                            <th>Position</th>
                                            <th>Left Count</th>
                                            <th>right Count</th>
                                            <th>Left BV</th>
                                            <th>right BV</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>@php($i=1)
                                            @foreach($users as $user)
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td>
                                                        <div class="d-flex justify-content-left align-items-center">
                                                            <div class="avatar  mr-1">
                                                                <img src="{{ asset('/uploads/profiles/'.$user->personal->profile_image) }}" alt="Avatar" width="32" height="32">
                                                            </div>
                                                            <div class="d-flex flex-column">
                                                                <span class="emp_name text-truncate font-weight-bold">{{$user->user_name}}</span>
                                                                <small class="emp_post text-truncate text-muted">{{$user->user_id}}</small>
                                                                <small class="emp_post text-truncate text-muted">Joined: {{date('d M y', strtotime($user->created_at))}}</small>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-left align-items-center">
                                                            <div class="d-flex flex-column">
                                                                <span class="emp_name text-truncate font-weight-bold">{{$user->email}}</span>
                                                                <small class="emp_post text-truncate text-muted">{{$user->user_mobile}}, {{$user->personal->alternate_mobile}}</small>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{$user->binary->position == 0 ? 'Left' : 'Right'}}</td>
                                                    <td>{{$user->binary->left_count}}</td>
                                                    <td>{{$user->binary->right_count}}</td>
                                                    <td>{{$user->binary->left_bv}}</td>
                                                    <td>{{$user->binary->right_bv}}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a class="dropdown-toggle hide-arrow" data-toggle="dropdown">                                                                
                                                                <i data-feather='more-vertical'></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">                                                                
                                                                <a href="{{ url('/user/tree?id='.$user->user_id) }}" class="dropdown-item">
                                                                    <i data-feather='users'></i>
                                                                    Team View
                                                                </a>
        
                                                                <a href="{{ url('/user/my-direct?id='.$user->user_id) }}" class="dropdown-item">
                                                                    <i data-feather='git-pull-request'></i>
                                                                    Direct View
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
                                            <th>User</th>
                                            <th>Contact</th>
                                            <th>Position</th>
                                            <th>Left Count</th>
                                            <th>right Count</th>
                                            <th>Left BV</th>
                                            <th>right BV</th>
                                            <th>Action</th>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Basic table -->
        </div>
    </div>
</div>
<!-- END: Content-->


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
<script>
    $(document).ready(function() {
        $('#directTable').DataTable( {
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