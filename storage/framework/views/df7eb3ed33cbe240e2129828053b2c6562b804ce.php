
<?php $__env->startSection('page_name', 'Monthly Closing'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/css/vendors.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/css/pickers/flatpickr/flatpickr.min.css')); ?>">
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
                        <h2 class="content-header-title float-left mb-0">View Closing</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard')); ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/view-closing')); ?>">Closing</a>
                                </li>
                                <li class="breadcrumb-item active">View Closing
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="mr-auto">
                <div class="row justify-content-md-center">
                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h5 class="font-weight-bolder mb-0">&#8377;<?php echo e(number_format($tbpv[0], 2)); ?></h5>
                                    <p class="card-text">Master Bonus Value</p>
                                </div>
                                <div class="avatar bg-light-danger p-50 m-0">
                                    <div class="avatar-content">
                                        <i data-feather="award" class="font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h5 class="font-weight-bolder mb-0">&#8377;<?php echo e(number_format($rpbp[0], 2)); ?></h5>
                                    <p class="card-text">S.Master  Bonus Value</p>
                                </div>
                                <div class="avatar bg-light-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i data-feather="activity" class="font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h5 class="font-weight-bolder mb-0">&#8377;<?php echo e(number_format($lbpv[0], 2)); ?></h5>
                                    <p class="card-text">Traval Fund Value</p>
                                </div>
                                <div class="avatar bg-light-success p-50 m-0">
                                    <div class="avatar-content">
                                        <i data-feather="users" class="font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h5 class="font-weight-bolder mb-0">&#8377;<?php echo e(number_format($cfbv[0], 2)); ?></h5>
                                    <p class="card-text">Car Fund Value</p>
                                </div>
                                <div class="avatar bg-light-info p-50 m-0">
                                    <div class="avatar-content">
                                        <i data-feather="check-circle" class="font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h5 class="font-weight-bolder mb-0">&#8377;<?php echo e(number_format($hbpv[0], 2)); ?></h5>
                                    <p class="card-text">Home Fund Value</p>
                                </div>
                                <div class="avatar bg-light-warning p-50 m-0">
                                    <div class="avatar-content">
                                        <i data-feather="home" class="font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h5 class="font-weight-bolder mb-0">&#8377;<?php echo e(number_format($rf[0], 2)); ?></h5>
                                    <p class="card-text">Royal Fund Value</p>
                                </div>
                                <div class="avatar bg-light-warning p-50 m-0">
                                    <div class="avatar-content">
                                        <i data-feather="home" class="font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-12">
                <div class="card card-statistics">                   
                    <div class="card-body statistics-body">
                        <div class="row justify-content-md-center">
                            <div class="col-xl-2 col-md-4 col-sm-6 mb-2 mb-md-0">
                                <div class="media">
                                    <div class="avatar bg-light-primary mr-2">
                                        <div class="avatar-content">
                                            <i data-feather="trending-up" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="media-body my-auto">
                                        <h4 class="font-weight-bolder mb-0"><?php echo e($tbpv[1]); ?></h4>
                                        <p class="card-text font-small-3 mb-0">Total Master</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-4 col-sm-6 mb-2 mb-md-0">
                                <div class="media">
                                    <div class="avatar bg-light-info mr-2">
                                        <div class="avatar-content">
                                            <i data-feather="user" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="media-body my-auto">
                                        <h4 class="font-weight-bolder mb-0"><?php echo e($rpbp[1]); ?></h4>
                                        <p class="card-text font-small-3 mb-0">Total Super Master's</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-4 col-sm-6 mb-2 mb-sm-0">
                                <div class="media">
                                    <div class="avatar bg-light-danger mr-2">
                                        <div class="avatar-content">
                                            <i data-feather="box" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="media-body my-auto">
                                        <h4 class="font-weight-bolder mb-0"><?php echo e($lbpv[1]); ?></h4>
                                        <p class="card-text font-small-3 mb-0">Total Travel</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-4 col-sm-6 col-12">  
                                <div class="media">
                                    <div class="avatar bg-light-warning mr-2">
                                        <div class="avatar-content">
                                            <i data-feather="dollar-sign" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="media-body my-auto">
                                        <h4 class="font-weight-bolder mb-0"><?php echo e($cfbv[1]); ?></h4>
                                        <p class="card-text font-small-3 mb-0">Total Car Fund</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-4 col-sm-6">  
                                <div class="media">
                                    <div class="avatar bg-light-success mr-2">
                                        <div class="avatar-content">
                                            <i data-feather="check-square" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="media-body my-auto">
                                        <h4 class="font-weight-bolder mb-0"><?php echo e($hbpv[1]); ?></h4>
                                        <p class="card-text font-small-3 mb-0">Total Home Fund</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2 col-md-4 col-sm-6">  
                                <div class="media">
                                    <div class="avatar bg-light-success mr-2">
                                        <div class="avatar-content">
                                            <i data-feather="check-square" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="media-body my-auto">
                                        <h4 class="font-weight-bolder mb-0"><?php echo e($rf[1]); ?></h4>
                                        <p class="card-text font-small-3 mb-0">Total Royal </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Basic table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card p-1">
                            <div class="card-header">
                                <h4 class="card-title"> Monthly Bonus Income</h4>
                                <a href="" onclick="event.preventDefault()" data-toggle="modal" data-target="#closingModal" class="btn btn-gradient-primary float-right">Closing</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="monthlyIncomeTable">
                                        <thead>
                                            <th>#</th>
                                            <th>Member</th>                                           
                                            <th>Team Bonus</th>
                                            <th>RP. Bonus</th>
                                            <th>Leadership Bonus</th>
                                            <th>Car Fund  Bonus</th>
                                            <th>DHF. Bonus</th>
                                            <th>Royal fund Bonus</th>
                                            <th>Total Income</th>
                                        </thead>
                                        <tbody>
                                            <?php ($i=1); ?>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php ($tb=count($user->master()->whereMonth('created_at', config('global.closing_month'))->get()->all())); ?>
                                                <?php ($rpb = count($user->superMaster()->whereMonth('created_at', config('global.closing_month'))->where('smbp', '!=', 0)->get()->all())); ?>
                                                <?php ($lb = count($user->leadership()->whereMonth('created_at', config('global.closing_month'))->get()->all())); ?>
                                                <?php ($cfb = count($user->car()->whereMonth('created_at', config('global.closing_month'))->where('crp', '!=', 0)->get()->all())); ?>
                                                <?php ($hfb = count($user->home()->whereMonth('created_at', config('global.closing_month'))->where('hp', '!=', 0)->get()->all())); ?>
                                                <?php ($rfb = count($user->Royal()->whereMonth('created_at', config('global.closing_month'))->where('rp', '!=', 0)->get()->all())); ?>
                                                <?php ($total_bonus = $tb + $rpb + $lb + $cfb + $hfb + $rfb); ?>
                                                <?php if($total_bonus > 0): ?>
                                                    <tr  class="odd">
                                                        <td><?php echo e($user->id); ?>

                                                        </td>
                                                        <td>
                                                            <div class="media-body">
                                                                <h6 class="transaction-title text-dark"><?php echo e($user->user_id); ?></h6>
                                                                <small><?php echo e($user->user_name); ?></small>
                                                            </div>                                                        
                                                        </td>                                                   
                                                        <td>
                                                            <div class="media-body">
                                                                <h6 class="transaction-title text-dark">&#8377;<?php echo e(number_format($tbpv[0]*$tb, 2)); ?></h6>
                                                                <small class="text-danger"> <?php echo e($tb); ?></small>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="media-body">
                                                                <h6 class="transaction-title text-dark">&#8377;<?php echo e(number_format($rpbp[0]*$rpb, 2)); ?></h6>
                                                                <small class="text-danger"> <?php echo e($rpb); ?></small>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="media-body">
                                                                <h6 class="transaction-title text-dark">&#8377;<?php echo e(number_format($lbpv[0]*$lb, 2)); ?></h6>
                                                                <small class="text-danger">  <?php echo e($lb); ?></small>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="media-body">
                                                                <h6 class="transaction-title text-dark">&#8377;<?php echo e(number_format($cfbv[0]*$cfb, 2)); ?></h6>
                                                                <small class="text-danger">  <?php echo e($cfb); ?></small>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="media-body">
                                                                <h6 class="transaction-title text-dark">&#8377;<?php echo e(number_format($hbpv[0]*$hfb, 2)); ?></h6>
                                                                <small class="text-danger">  <?php echo e($hfb); ?></small>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="media-body">
                                                                <h6 class="transaction-title text-dark">&#8377;<?php echo e(number_format($rf[0]*$rfb, 2)); ?></h6>
                                                                <small class="text-danger">  <?php echo e($rfb); ?></small>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="media-body">
                                                                <h4 class="transaction-title text-success">&#8377;<?php echo e(number_format($rf[0]*$rfb + $hbpv[0]*$hfb+$cfbv[0]*$cfb+$lbpv[0]*$lb+$rpbp[0]*$rpb+$tbpv[0]*$tb,2)); ?></h4>                                                           
                                                            </div>
                                                        </td>
                                                    </tr>                                                    
                                                <?php ($i++); ?>                                            
                                                <?php endif; ?>                                            
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                        <tfoot>
                                            <th>#</th>
                                            <th>Member</th>                                           
                                            <th>Team Bonus</th>
                                            <th>RP. Bonus</th>
                                            <th>Leadership Bonus</th>
                                            <th>Car Fund  Bonus</th>
                                            <th>DHF. Bonus</th>
                                            <th>Royal fund Bonus</th>
                                            <th>Total Income</th>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Basic table -->

            <!-- Basic table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card p-1">
                            <div class="card-header">
                                <h4 class="card-title"> Member's List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="activeDirectorsTable">
                                        <thead >
                                            <th>#</th>
                                            <th>Member</th>                                            
                                            <th>Direct Count</th>
                                            <th>GBV</th>
                                            <th>SELF BV</th>
                                           
                                        </thead>
                                        <tbody><?php ($i=1); ?>
                                            <?php $__currentLoopData = $directors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr  class="table-warning">
                                                    <td><?php echo e($user->id); ?>

                                                    </td>
                                                    <td>
                                                        <div class="media-body">
                                                            <h6 class="transaction-title text-dark"><?php echo e($user->user->user_name); ?></h6>
                                                            <small><?php echo e($user->user->user_id); ?></small>
                                                        </div>                                                        
                                                    </td>
                                                    <td>
                                                        <div class="media-body">
                                                            <h6 class="transaction-title text-dark">
                                                                <?php echo e(count(App\Models\UserGeneration::where('sponser_id', $user->userid)->where('rank',4)->whereYear('rankupdate', '=', Carbon\Carbon::now()->subMonth(2)->format('Y'))->whereMonth('rankupdate', '=', Carbon\Carbon::now()->subMonth(2)->format('m'))->get()->all())); ?>                                                                
                                                            </h6>
                                                        </div>                                                        
                                                    </td>
                                                    <td>
                                                        <div class="media-body">
                                                            <h6 class="transaction-title text-dark">
                                                                ₹<?php echo e(number_format($user->group_bv, 2)); ?>

                                                            </h6>
                                                        </div>                                                        
                                                    </td>

                                                    <td>
                                                        <div class="media-body">
                                                            <h6 class="transaction-title text-dark">
                                                                ₹<?php echo e(number_format($user->self_bv, 2)); ?>

                                                            </h6>
                                                        </div>                                                        
                                                    </td>
                                                </tr>
                                            <?php ($i++); ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                        <tfoot>
                                            <th>#</th>
                                            <th>Member</th>                                           
                                            <th>Direct Count</th>
                                            <th>GBV</th>
                                            <th>SELF BV</th>
                                            
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
<!-- BEGIN: Closing Model-->
<div class="modal fade text-left" id="closingModal" tabindex="-1" aria-labelledby="closingModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel33">Closing</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <form method="post" action="<?php echo e(url('/admin/month-closing/')); ?>" id="closing-from">
            <?php echo csrf_field(); ?>
            <div class="modal-body">
                <label>1 Team Bonus Point Value: </label>
                <div class="form-group">
                    <input type="text" class="form-control" value="<?php echo e($tbpv[0]); ?>" name="tbpv" required>                
                </div>

                <label>1 Regular Performance Bonus Value: </label>
                <div class="form-group">
                    <input type="text" class="form-control" value="<?php echo e($rpbp[0]); ?>" name="rpbp" required>
                </div>

                <label>1 Leadership Bonus Value: </label>
                <div class="form-group">
                    <input type="text" class="form-control" value="<?php echo e($lbpv[0]); ?>" name="lbpv" required>                    
                </div>

                <label>1 Car Fund Bonus Value: </label>
                <div class="form-group">
                    <input type="text" class="form-control" value="<?php echo e($cfbv[0]); ?>" name="cfbv" required>                
                </div>

                <label>1 Dream Home Bonus Value: </label>
                <div class="form-group">
                    <input type="text" class="form-control" value="<?php echo e($hbpv[0]); ?>" name="hbpv" required>                
                </div>
                <label>Royal Fund Bonus Value: </label>
                <div class="form-group">
                    <input type="text" class="form-control" value="<?php echo e($rf[0]); ?>" name="rfbpv" required>                
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="submit_btn" class="btn btn-primary" onclick="event.preventDefault();requestFilter('closing-from', 'submit_btn', 'loading_spinner');">
                    <i class="fas fa-spinner fa-spin" style="display: none" id="loading_spinner"></i> Closing
                </button>
            </div>
        </form>
    </div>
    </div>
</div>
<!-- END: Closing Model-->

<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo e(asset('assets/vendors/js/tables/datatable/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendors/js/tables/datatable/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendors/js/tables/datatable/responsive.bootstrap4.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendors/js/tables/datatable/datatables.checkboxes.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendors/js/tables/datatable/datatables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendors/js/tables/datatable/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendors/js/tables/datatable/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendors/js/tables/datatable/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendors/js/tables/datatable/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendors/js/tables/datatable/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendors/js/pickers/flatpickr/flatpickr.min.js')); ?>"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Page JS-->
<script src="<?php echo e(asset('assets/js/scripts/tables/table-datatables-basic.js')); ?>"></script>
<!-- END: Page JS-->
<?php if(count($errors) > 0): ?>
<script>
    $('#closingModal').modal('show');
        // On load Toast
        setTimeout(function () {
        toastr['error'](
        '<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($error); ?> </li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>',
        'Error.!',
        {
            closeButton: true,
            tapToDismiss: true
        }
        );
    }, 1000);
</script>
<?php endif; ?>
<script>
    $(document).ready(function() {
        $('#monthlyIncomeTable').DataTable( {
            "order": [[ '1', "desc" ]],
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );

        $('#activeDirectorsTable').DataTable( {
            "order": [[ '1', "desc" ]],
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel Project\regallife 11march\resources\views/admin/view-closing.blade.php ENDPATH**/ ?>