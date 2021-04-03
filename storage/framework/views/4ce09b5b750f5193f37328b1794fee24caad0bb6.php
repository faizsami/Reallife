
<?php $__env->startSection('page_name', 'All Members'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">View</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard')); ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="<?php echo e(url('admin/members')); ?>">All Members</a>
                                </li>
                                <li class="breadcrumb-item active"><?php echo e($user->user_id); ?> (<?php echo e($user->user_name); ?>)
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">            
            <!-- users edit start -->
            <section class="app-user-edit">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                    <i data-feather="user"></i><span class="d-none d-sm-block">Personal Details</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#information" aria-controls="information" role="tab" aria-selected="false">
                                    <i data-feather="briefcase"></i><span class="d-none d-sm-block">Bank Details</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" id="social-tab" data-toggle="tab" href="#social" aria-controls="social" role="tab" aria-selected="false">
                                    <i data-feather="user-check"></i><span class="d-none d-sm-block">Kyc Details</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" id="password-tab" data-toggle="tab" href="#password" aria-controls="password" role="tab" aria-selected="false">
                                    <i data-feather="lock"></i><span class="d-none d-sm-block">Change Password</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <!-- Account Tab starts -->
                            <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                <form method="post" action="<?php echo e(url('/admin/member/'.$user->id.'/update')); ?>" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <!-- users edit media object start -->
                                    <div class="media mb-2">
                                        <img src="<?php echo e(asset('/uploads/profiles/'.$user->personal->profile_image)); ?>" alt="users avatar" class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer" height="90" width="90" />
                                        <div class="media-body mt-2">
                                            <h4><?php echo e($user->user_name); ?></h4>
                                            <small><?php echo e($user->user_id); ?></small>
                                        </div>
                                    </div>
                                    <!-- users edit media object ends -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="username">User Id</label>
                                                <input type="text" class="form-control" value="<?php echo e($user->user_id); ?>" readonly/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" placeholder="Name" value="<?php echo e($user->user_name); ?>" name="name" id="name" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="email">E-mail</label>
                                                <input type="email" class="form-control" placeholder="Email" value="<?php echo e($user->email); ?>" name="email" id="email" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="company">Mobile</label>
                                                <input type="text" name="mobile" class="form-control" value="<?php echo e($user->user_mobile); ?>" required/>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="status">Status</label><br>
                                                <?php if($user->is_block == 0): ?>
                                                    <span class="badge badge-success">Active</span>
                                                <?php else: ?>
                                                    <span class="badge badge-danger">Blocked</span>
                                                <?php endif; ?>
                                            </div>
                                        </div>                                        
                                        <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                            <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Account Tab ends -->

                            <!-- Information Tab starts -->
                            <div class="tab-pane" id="information" aria-labelledby="information-tab" role="tabpanel">
                                <!-- Bank Detail Card -->
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Bank Details</h4>
                                        <div class="table-responsive">
                                            <form action="<?php echo e(url('admin/update-bank-details')); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="id" value="<?php echo e($user->id); ?>" hidden>
                                                <table class="table table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <td class="py-1">
                                                                <strong>Payee Name</strong>
                                                            </td>
                                                            <td>
                                                                <input class="form-control" name="payee_name" value="<?php echo e($user->bank->payee_name); ?>" required>
                                                                <?php if($errors->has('payee_name')): ?>
                                                                    <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                        <strong><?php echo e($errors->first('payee_name')); ?></strong>
                                                                    </p>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="py-1">
                                                                <strong>Account Type</strong>
                                                            </td>
                                                            <td>
                                                                <select class="form-control text-uppercase" name="account_type" >
                                                                    <?php if($user->bank->account_type != null): ?>
                                                                        <option value="<?php echo e($user->bank->account_type); ?>" selected><?php echo e($user->bank->account_type); ?></option>
                                                                    <?php endif; ?>
    
                                                                    <?php ( $accounts = array('Current', 'Savings')); ?>
                                                                    <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if($account != $user->bank->account_type): ?>
                                                                            <option value="<?php echo e($account); ?>"><?php echo e($account); ?></option>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                                <?php if($errors->has('account_type')): ?>
                                                                    <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                        <strong><?php echo e($errors->first('account_type')); ?></strong>
                                                                    </p>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="py-1">
                                                                Bank Name
                                                            </td>
                                                            <td>
                                                                <input class="form-control" name="bank_name" value="<?php echo e($user->bank->bank_name); ?>" required>
                                                                <?php if($errors->has('bank_name')): ?>
                                                                    <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                        <strong><?php echo e($errors->first('bank_name')); ?></strong>
                                                                    </p>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="py-1">
                                                                Account Number
                                                            </td>
                                                            <td>
                                                                <input class="form-control" name="account_number" value="<?php echo e($user->bank->account_number); ?>" required>
                                                                <?php if($errors->has('ifsc_code')): ?>
                                                                    <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                        <strong><?php echo e($errors->first('ifsc_code')); ?></strong>
                                                                    </p>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="py-1">
                                                                IFSC Code
                                                            </td>
                                                            <td>
                                                                <input class="form-control" name="ifsc_code" value="<?php echo e($user->bank->ifsc_code); ?>" required>
                                                                <?php if($errors->has('account_number')): ?>
                                                                    <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                        <strong><?php echo e($errors->first('account_number')); ?></strong>
                                                                    </p>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="py-1">
                                                                <strong>Branch Name</strong>
                                                            </td>
                                                            <td>
                                                                <input class="form-control" name="branch_name" value="<?php echo e($user->bank->branch_name); ?>" required>
                                                                <?php if($errors->has('branch_name')): ?>
                                                                    <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                        <strong><?php echo e($errors->first('branch_name')); ?></strong>
                                                                    </p>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>

                                                                                                              
                                                    </tbody>
                                                </table>
                                                <button type="submit" class="btn btn-gradient-primary float-right mt-2">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Bank Detail Card -->
                            </div>
                            <!-- Information Tab ends -->

                            <!-- Social Tab starts -->
                            <div class="tab-pane" id="social" aria-labelledby="social-tab" role="tabpanel">
                                <!-- KYC Detail Card -->
                                <div class="grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="card-title">Kyc Details</h6>
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                #
                                                            </th>
                                                            <th>
                                                                Document Name
                                                            </th>

                                                            <th>
                                                                Document Number
                                                            </th>
                                                            <th>
                                                                Status
                                                            </th>
                                                            <th>
                                                                Document Files
                                                            </th>
                                                            <th>
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php ($kycs = $user->kyc); ?>
                                                        <?php ($i=1); ?>

                                                        <?php $__currentLoopData = $kycs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kyc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td><?php echo e($i); ?></td>
                                                                <td><?php echo e($kyc->document_type); ?></td>
                                                                <td><?php echo e($kyc->document_number); ?></td>
                                                                <td>
                                                                    <?php if($kyc->status == 0): ?>
                                                                        <span class="badge badge-warning">Pending</span>
                                                                    <?php elseif($kyc->status == 1): ?>
                                                                        <span class="badge badge-success">Apporved</span>
                                                                    <?php else: ?>
                                                                        <span class="badge badge-danger">Failed</span>
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td>
                                                                    <img class="rounded-circle" src="<?php echo e(asset('uploads/documents/'.$kyc->front_image)); ?>" height="50px" style="cursor: pointer" onclick="window.open('<?php echo e(asset('uploads/documents/'.$kyc->front_image)); ?>', '_blank') ">
                                                                    <img class="rounded-circle" src="<?php echo e(asset('uploads/documents/'.$kyc->back_image)); ?>" height="50px" style="cursor: pointer" onclick="window.open('<?php echo e(asset('uploads/documents/'.$kyc->back_image)); ?>', '_blank') ">
                                                                </td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <a class="dropdown-toggle hide-arrow" data-toggle="dropdown">                                                                
                                                                            <i data-feather='more-vertical'></i>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right">                                                                            
                                                                            <a href="<?php echo e(url('/admin/member/kyc/'.$kyc->id.'/1')); ?>" class="dropdown-item">
                                                                                <i data-feather='eye'></i>
                                                                                Apporve
                                                                            </a>

                                                                            <a href="<?php echo e(url('/admin/member/kyc/'.$kyc->id.'/2')); ?>" class="dropdown-item">
                                                                                <i data-feather='eye'></i>
                                                                                Decline
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <!-- form -->
                                            <form class="forms-sample mt-4" action="<?php echo e(url('/admin/member/update-kyc/'.$user->id)); ?>" method="post" enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                                <div class="row">
                                                    <div class="form-group col-lg-3 col-mg-3">
                                                        <label for="document">Document Type<sup style="color:red;">*</sup></label>
                                                        <select class="form-control" name="document_type" required>
                                                            <option selected="" disabled="">Select your document</option>
                                                            <option>Aadhar Card</option>
                                                            <option>PAN Card</option>
                                                        </select>
                                                            <?php if($errors->has('document_type')): ?>
                                                                <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                    <strong><?php echo e($errors->first('document_type')); ?></strong>
                                                                </p>
                                                            <?php endif; ?>
                                                    </div>
            
                                                    <div class="form-group col-lg-3 col-mg-3">
                                                        <label for="document">Document No.<sup style="color:red;">*</sup></label>
                                                        <input type="text" class="form-control" name="document_number" placeholder="Document No." required>
                                                            <?php if($errors->has('document_number')): ?>
                                                                <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                    <strong><?php echo e($errors->first('document_number')); ?></strong>
                                                                </p>
                                                            <?php endif; ?>
                                                    </div>
                                                    
                                                    <div class="form-group col-lg-2 col-mg-2">
                                                        <label for="file">Document Front<sup style="color:red;">*</sup></label>
                                                        <label onclick="$('#front_image').trigger('click');" class="btn btn-sm btn-primary mb-75 mr-75">Upload</label>
                                                        <input type="file" id="front_image" name="front_image" hidden accept="image/*" />
                                                            <?php if($errors->has('front_image')): ?>
                                                                <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                    <strong><?php echo e($errors->first('front_image')); ?></strong>
                                                                </p>
                                                            <?php endif; ?>                                        
                                                    </div>
            
                                                    <div class="form-group col-lg-2 col-mg-2">
                                                        <label for="file">Document Back<sup style="color:red;">*</sup></label>
                                                        <label onclick="$('#back_image').trigger('click');" class="btn btn-sm btn-primary mb-75 mr-75">Upload</label>
                                                        <input type="file" id="back_image" name="back_image" hidden accept="image/*" />
                                                            <?php if($errors->has('back_image')): ?>
                                                                <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                    <strong><?php echo e($errors->first('back_image')); ?></strong>
                                                                </p>
                                                            <?php endif; ?>                                          
                                                    </div>
                                                    <div class="form-group col-lg-2 col-mg-2">
                                                        <label for="submit">&nbsp;</label> 
                                                        <button type="submit" class="form-control btn btn-primary mr-2">Update</button>
                                                    </div>
                                                </div>                                
                                            </form>
                                            <!--/ form -->
                                        </div>
                                    </div>
                                </div>
                                <!-- End Bank Detail Card -->
                            </div>
                            <!-- Social Tab ends -->
                              <!-- KYC Tab starts -->
                              <div class="tab-pane" id="password" aria-labelledby="password-tab" role="tabpanel">
                                <!-- KYC Detail Card -->
                                <div class="grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="card-title">Change Password</h6>
                                            <!-- form -->
                                            <form class="validate-form" method="post" action="<?php echo e(url('/admin/member/'.$user->id.'/password-change')); ?>">
                                                <?php echo csrf_field(); ?>
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="account-new-password">New Password</label>
                                                            <div class="input-group form-password-toggle input-group-merge">
                                                                <input type="password" id="account-new-password" name="new_password" class="form-control" placeholder="New Password" />
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text cursor-pointer">
                                                                        <i data-feather="eye"></i>
                                                                    </div>
                                                                </div>
                                                                <?php if($errors->has('new_password')): ?>
                                                                    <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                        <strong><?php echo e($errors->first('new_password')); ?></strong>
                                                                    </p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="account-retype-new-password">Retype New Password</label>
                                                            <div class="input-group form-password-toggle input-group-merge">
                                                                <input type="password" class="form-control" id="account-retype-new-password" name="confirm_new_password" placeholder="New Password" />
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text cursor-pointer"><i data-feather="eye"></i></div>
                                                                </div>
                                                                <?php if($errors->has('confirm_new_password')): ?>
                                                                    <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                        <strong><?php echo e($errors->first('confirm_new_password')); ?></strong>
                                                                    </p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary float-right">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <!--/ form -->
                                        </div>
                                    </div>
                                </div>
                                <!-- End Bank Detail Card -->
                            </div>
                            <!-- KYC Tab ends -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- users edit ends -->
        </div>
    </div>
</div>
<!-- END: Content-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel Project\regallife 11march\resources\views/admin/edit-user.blade.php ENDPATH**/ ?>