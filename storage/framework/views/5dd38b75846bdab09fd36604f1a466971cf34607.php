
<?php $__env->startSection('page_name', 'Edit Profile'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/css/pickers/pickadate/pickadate.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/css/pickers/flatpickr/flatpickr.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/plugins/forms/pickers/form-flat-pickr.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/plugins/forms/pickers/form-pickadate.css')); ?>">
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Edit Profile</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard')); ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/edit-profile')); ?>">Profile</a>
                                </li>
                                <li class="breadcrumb-item active"> Edit Profile
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- account setting page -->
            <section id="page-account-settings">
                <div class="row">
                    <!-- left menu section -->
                    <div class="col-md-3 mb-2 mb-md-0">
                        <ul class="nav nav-pills flex-column nav-left">
                            <!-- general -->
                            <li class="nav-item">
                                <a class="nav-link active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                    <i data-feather="user" class="font-medium-3 mr-1"></i>
                                    <span class="font-weight-bold">General</span>
                                </a>
                            </li>
                            <!-- END: general -->

                            <!-- bank details -->
                            <li class="nav-item">
                                <a class="nav-link" id="account-pill-bank" data-toggle="pill" href="#account-vertical-bank" aria-expanded="false">
                                    <i data-feather="briefcase" class="font-medium-3 mr-1"></i>
                                    <span class="font-weight-bold">Bank Details</span>
                                </a>
                            </li>
                            <!-- END:  bank details -->

                            <!-- kyc details -->
                            <li class="nav-item">
                                <a class="nav-link" id="account-pill-kyc" data-toggle="pill" href="#account-vertical-kyc" aria-expanded="false">
                                    <i data-feather="user-check" class="font-medium-3 mr-1"></i>
                                    <span class="font-weight-bold">KYC Details</span>
                                </a>
                            </li>
                            <!-- END: kyc details -->

                            <!-- change password -->
                            <li class="nav-item">
                                <a class="nav-link" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                                    <i data-feather="lock" class="font-medium-3 mr-1"></i>
                                    <span class="font-weight-bold">Change Password</span>
                                </a>
                            </li>                              
                            
                        </ul>
                    </div>
                    <!--/ left menu section -->

                    <!-- right content section -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content">
                                    <!-- general tab -->
                                    <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                        <?php if($is_personal): ?>
                                            <?php ($readonly = ''); ?>
                                        <?php else: ?>
                                            <?php ($readonly = ''); ?>
                                        <?php endif; ?>
                                        <!-- form -->
                                        <form class="validate-form mt-2" action="<?php echo e(url('admin/update-personal-details')); ?>" method="post" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <!-- header media -->
                                            <div class="media">
                                                <a href="javascript:void(0);" class="mr-25">
                                                    <img src="<?php echo e(asset('uploads/profiles/'.Auth::user()->personal->profile_image)); ?>" id="profile_img" class="rounded mr-50" alt="profile image" height="80" width="80" />
                                                </a>
                                                <!-- upload and reset button -->
                                                <div class="media-body mt-75 ml-1">
                                                    <label for="account-upload" class="btn btn-sm btn-primary mb-75 mr-75">Upload</label>
                                                    <input onchange="readURL(this)" type="file" name="profile_image" id="account-upload" hidden accept="image/*" />
                                                    <p>Allowed JPG, jpeg or PNG. Max size of 800kB</p>
                                                </div>
                                                <!--/ upload and reset button -->
                                            </div>
                                            <!--/ header media -->
                                        
                                            <div class="row mt-1">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-username">Gender</label>
                                                        <select class="form-control" name="gender" <?php echo e($readonly); ?>>
                                                            <?php if(Auth::user()->personal->sex != null): ?>
                                                                <option value="<?php echo e(Auth::user()->personal->sex); ?>" selected><?php echo e(Auth::user()->personal->sex); ?></option>
                                                            <?php endif; ?>

                                                            <?php ( $genders = array('Male', 'Female', 'Other')); ?>
                                                            <?php $__currentLoopData = $genders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($gender != Auth::user()->personal->sex): ?>
                                                                    <option value="<?php echo e($gender); ?>"><?php echo e($gender); ?></option>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        <?php if($errors->has('gender')): ?>
                                                            <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                <strong><?php echo e($errors->first('gender')); ?></strong>
                                                            </p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-name">Date Of Birth</label>
                                                        <input type="text" <?php if(!$is_personal): ?> id="fp-default" <?php endif; ?> name="dob" class="form-control <?php if(!$is_personal): ?>flatpickr-basic <?php endif; ?>" placeholder="YYYY-MM-DD" value="<?php echo e(Auth::user()->personal->dob); ?>"  <?php echo e($readonly); ?>/>
                                                        <?php if($errors->has('dob')): ?>
                                                            <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                <strong><?php echo e($errors->first('dob')); ?></strong>
                                                            </p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-name">Alternate Mobile</label>
                                                        <input type="text" maxlength="13" onkeypress="return isNumberKey(event)" name="alternate_mobile" class="form-control" placeholder="+919998887777" value="<?php echo e(Auth::user()->personal->alternate_mobile); ?>"  <?php echo e($readonly); ?>/>
                                                        <?php if($errors->has('alternate_mobile')): ?>
                                                            <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                <strong><?php echo e($errors->first('alternate_mobile')); ?></strong>
                                                            </p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-name">Address</label>
                                                        <input type="text" maxlength="150" id="address_" onkeypress="return isAlphaKeyWithComa(event)" onkeyup="clearmultispace($(this).val(), $(this).attr('id'))" name="address" class="form-control" placeholder="Address" value="<?php echo e(Auth::user()->personal->address); ?>"  <?php echo e($readonly); ?>/>
                                                        <?php if($errors->has('address')): ?>
                                                            <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                <strong><?php echo e($errors->first('address')); ?></strong>
                                                            </p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-name">Dist</label>
                                                        <input type="text" id="dist_" onkeyup="clearmultispace($(this).val(), $(this).attr('id'))" onkeypress="return isAlphaKey(event)" name="dist" class="form-control" placeholder="Dist" value="<?php echo e(Auth::user()->personal->dist); ?>"  <?php echo e($readonly); ?>/>
                                                        <?php if($errors->has('dist')): ?>
                                                            <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                <strong><?php echo e($errors->first('dist')); ?></strong>
                                                            </p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-name">City</label>
                                                        <input type="text" name="city" class="form-control" placeholder="City" value="<?php echo e(Auth::user()->personal->city); ?>"  <?php echo e($readonly); ?>/>
                                                        <?php if($errors->has('city')): ?>
                                                            <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                <strong><?php echo e($errors->first('city')); ?></strong>
                                                            </p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>


                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-e-mail">Postal Code</label>
                                                        <input type="text" class="form-control" name="postal_code" placeholder="Postal Code" value="<?php echo e(Auth::user()->personal->postal_code); ?>"  <?php echo e($readonly); ?>/>
                                                        <?php if($errors->has('postal_code')): ?>
                                                            <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                <strong><?php echo e($errors->first('postal_code')); ?></strong>
                                                            </p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-company">State</label>
                                                        <select class="form-control" name="state" <?php echo e($readonly); ?>>
                                                            <?php if(Auth::user()->personal->state != null): ?>
                                                                <option value="<?php echo e(Auth::user()->personal->state); ?>" selected><?php echo e(Auth::user()->personal->state); ?></option>
                                                            <?php endif; ?>
                                                            <?php ($states = App\Models\State::get()->all()); ?>
                                                            <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($state->name); ?>"><?php echo e($state->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        
                                                        <?php if($errors->has('state')): ?>
                                                            <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                <strong><?php echo e($errors->first('state')); ?></strong>
                                                            </p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>   
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-company">Country</label>
                                                        <input type="text" class="form-control" name="country" placeholder="Country" value="<?php echo e(Auth::user()->personal->country); ?>"  <?php echo e($readonly); ?>/>
                                                        <?php if($errors->has('country')): ?>
                                                            <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                <strong><?php echo e($errors->first('country')); ?></strong>
                                                            </p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div> 
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-company">Nominee Name</label>
                                                        <input type="text" class="form-control" name="nominee_name" placeholder="Nominee Name" value="<?php echo e(Auth::user()->personal->nominee_name); ?>"  <?php echo e($readonly); ?>/>
                                                        <?php if($errors->has('nominee_name')): ?>
                                                            <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                <strong><?php echo e($errors->first('nominee_name')); ?></strong>
                                                            </p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div> 
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-company">Nominee Mobile</label>
                                                        <input type="text" class="form-control" maxlength="13" onkeypress="return isNumberKey(event)" name="nominee_mobile" placeholder="+919998887777" value="<?php echo e(Auth::user()->personal->nominee_mobile); ?>"  <?php echo e($readonly); ?>/>
                                                        <?php if($errors->has('nominee_mobile')): ?>
                                                            <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                <strong><?php echo e($errors->first('nominee_mobile')); ?></strong>
                                                            </p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div> 
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-company">Nominee Relation</label>
                                                        <input type="text" class="form-control" name="nominee_relation" placeholder="Nominee Relation" value="<?php echo e(Auth::user()->personal->nominee_relation); ?>"  <?php echo e($readonly); ?>/>
                                                        <?php if($errors->has('nominee_relation')): ?>
                                                            <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                <strong><?php echo e($errors->first('nominee_relation')); ?></strong>
                                                            </p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-company">GST <sup>(optional)</sup></label>
                                                        <input type="text" class="form-control" name="gst" placeholder="GST" value="<?php echo e(Auth::user()->personal->gst); ?>"  <?php echo e($readonly); ?>/>
                                                        <?php if($errors->has('gst')): ?>
                                                            <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                <strong><?php echo e($errors->first('gst')); ?></strong>
                                                            </p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>                                                    
                                                <div class="col-12 col-sm-6 text-center">
                                                    <button type="submit" class="btn btn-primary mt-2 mr-1" >Update</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!--/ form -->
                                    </div>
                                    <!--/ general tab -->

                                    <!-- bank details tab -->
                                    <div role="tabpanel" class="tab-pane" id="account-vertical-bank" aria-labelledby="account-pill-bank" aria-expanded="false">

                                        <!-- form -->
                                        <form class="validate-form mt-2" action="<?php echo e(url('admin/update-bank-details')); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="id" value="<?php echo e(Auth::user()->id); ?>" hidden>
                                            <?php if($is_bank): ?>
                                                <?php ($readonly = 'readonly'); ?>
                                            <?php else: ?>
                                                <?php ($readonly = ''); ?>
                                            <?php endif; ?>
                                            <div class="row mt-1">                                                    
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-name">Payee Name</label>
                                                        <input type="text" name="payee_name" id="payee_name" onkeypress="return isAlphaKey(event)" onkeyup="clearmultispace($(this).val(), $(this).attr('id'))" class="form-control text-uppercase" placeholder="Payee Name" value="<?php echo e(Auth::user()->bank->payee_name); ?>" <?php echo e($readonly); ?>/>
                                                        <?php if($errors->has('payee_name')): ?>
                                                            <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                <strong><?php echo e($errors->first('payee_name')); ?></strong>
                                                            </p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-username">Account Type</label>
                                                        <select class="form-control text-uppercase" name="account_type" <?php echo e($readonly); ?>>
                                                            <?php if(Auth::user()->bank->account_type != null): ?>
                                                                <option value="<?php echo e(Auth::user()->bank->account_type); ?>" selected><?php echo e(Auth::user()->bank->account_type); ?></option>
                                                            <?php endif; ?>

                                                            <?php ( $accounts = array('Current', 'Savings')); ?>
                                                            <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($account != Auth::user()->bank->account_type): ?>
                                                                    <option value="<?php echo e($account); ?>"><?php echo e($account); ?></option>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        <?php if($errors->has('account_type')): ?>
                                                            <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                <strong><?php echo e($errors->first('account_type')); ?></strong>
                                                            </p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-name">Bank Name</label>
                                                        <input type="text" maxlength="50" name="bank_name" id="bank_name" onkeypress="return isAlphaKey(event)" onkeyup="clearmultispace($(this).val(), $(this).attr('id'))" class="form-control text-uppercase" placeholder="HDFC Bank" value="<?php echo e(Auth::user()->bank->bank_name); ?>" <?php echo e($readonly); ?>/>
                                                        <?php if($errors->has('bank_name')): ?>
                                                            <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                <strong><?php echo e($errors->first('bank_name')); ?></strong>
                                                            </p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-name">IFSC Code</label>
                                                        <input type="text" maxlength="11" id="address_" onkeypress="return isAlphaNumericKey(event)" name="ifsc_code" class="form-control text-uppercase" placeholder="IFSC Code" value="<?php echo e(Auth::user()->bank->ifsc_code); ?>" <?php echo e($readonly); ?>/>
                                                        <?php if($errors->has('ifsc_code')): ?>
                                                            <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                <strong><?php echo e($errors->first('ifsc_code')); ?></strong>
                                                            </p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-name">Account Number</label>
                                                        <input type="text" maxlength="20" id="dist_" onkeypress="return isNumberKey(event)" name="account_number" class="form-control" placeholder="Account Number" value="<?php echo e(Auth::user()->bank->account_number); ?>" <?php echo e($readonly); ?>/>
                                                        <?php if($errors->has('account_number')): ?>
                                                            <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                <strong><?php echo e($errors->first('account_number')); ?></strong>
                                                            </p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-name">Branch Name</label>
                                                        <input type="text" name="branch_name" id="branch_name" onkeypress="return isAlphaKey(event)" onkeyup="clearmultispace($(this).val(), $(this).attr('id'))" class="form-control text-uppercase" placeholder="Branch Name" value="<?php echo e(Auth::user()->bank->branch_name); ?>" <?php echo e($readonly); ?>/>
                                                        <?php if($errors->has('branch_name')): ?>
                                                            <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                <strong><?php echo e($errors->first('branch_name')); ?></strong>
                                                            </p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>


                                                                                              
                                                <div class="col-12 col-sm-6 text-center">
                                                    <button type="submit" class="btn btn-primary mt-2 mr-1" <?php if($is_bank): ?> disabled <?php endif; ?>>Update</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!--/ form -->
                                    </div>
                                    <!--/ bank details tab -->

                                    <!-- kyc details tab -->
                                    <div role="tabpanel" class="tab-pane" id="account-vertical-kyc" aria-labelledby="account-pill-kyc" aria-expanded="false">

                                        <?php if(!$is_both_doc): ?>
                                        <!-- form -->
                                        <form class="forms-sample" action="<?php echo e(url('/admin/update-kyc-details')); ?>" method="post" enctype="multipart/form-data">
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
                                                    <button type="submit" class="form-control btn btn-primary mr-2">Submit</button>
                                                </div>
                                            </div>                                
                                        </form>
                                        <!--/ form -->
                                        <?php endif; ?>
                                        <div class="table-responsive pt-3">
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
                                                    <?php ($i=1); ?>
            
                                                    <?php $__currentLoopData = Auth::user()->kyc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kyc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($i); ?></td>
                                                            <td><?php echo e($kyc->document_type); ?></td>
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
                                                                <img src="<?php echo e(asset('uploads/documents/'.$kyc->front_image)); ?>" class="rounded-circle" width="10%">
                                                                <img src="<?php echo e(asset('uploads/documents/'.$kyc->back_image)); ?>" class="rounded-circle" width="10%">
                                                            </td>
                                                            <td>
                                                                <?php if($kyc->status != 1): ?>
                                                                    <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete Document" onclick="window.location='<?php echo e(url('/admin/kyc-details/delete/'.$kyc->id)); ?>'">
                                                                        <i data-feather='delete'></i>
                                                                    </button>
                                                                <?php else: ?>
                                                                    <span class="badge badge-success">Apporved</span>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                        <?php ( $i++); ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!--/ kyc details tab -->

                                    <!-- change password -->
                                    <div class="tab-pane fade" id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                                        <!-- form -->
                                        <form class="validate-form" method="post" action="<?php echo e(url('/admin/change-password')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="account-old-password">Old Password</label>
                                                        <div class="input-group form-password-toggle input-group-merge">
                                                            <input type="password" class="form-control" id="account-old-password" name="password" placeholder="Old Password" />
                                                            <div class="input-group-append">
                                                                <div class="input-group-text cursor-pointer">
                                                                    <i data-feather="eye"></i>
                                                                </div>
                                                            </div>
                                                            <?php if($errors->has('password')): ?>
                                                                <p class="invalid-feedback text-danger" style="display:block!important;" role="alert">
                                                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                                                </p>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                                                    <button type="submit" class="btn btn-primary mr-1 mt-1">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!--/ form -->
                                    </div>
                                    <!--/ change password -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ right content section -->
                </div>
            </section>
            <!-- / account setting page -->

        </div>
    </div>
</div>
<!-- END: Content-->

<!-- BEGIN: Page Vendor JS-->
<script src="<?php echo e(asset('assets/vendors/js/pickers/pickadate/picker.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendors/js/pickers/pickadate/picker.date.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendors/js/pickers/pickadate/picker.time.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendors/js/pickers/pickadate/legacy.js')); ?>"></script>
<script src="<?php echo e(asset('assets/vendors/js/pickers/flatpickr/flatpickr.min.js')); ?>"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Page JS-->
<script src="<?php echo e(asset('assets/js/scripts/forms/pickers/form-pickers.js')); ?>"></script>
<!-- END: Page JS-->
<script>
    function readURL(input) {
        if (input.files && input.files[0]) 
        {
            var reader = new FileReader();                
            reader.onload = function(e) 
            {
                $('#profile_img').attr('src', e.target.result);
            }                
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }   
    }   
    
    //validating isnumber only
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
    
//only alphabets validation
function isAlphaKey(e)
{
    var regex = new RegExp("^[a-zA-Z ]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }
    else
    {			
        return false;
    }
}

function isAlphaKeyWithComa(e)
{
    var regex = new RegExp("^[a-zA-Z, ]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }
    else
    {			
        return false;
    }
}

function isAlphaKeyWithAt(e)
{
    var regex = new RegExp("^[a-zA-Z@]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }
    else
    {			
        return false;
    }
}
//Clear double space
function clearmultispace(value, id)
{
  var str = value;
  str = str.replace(/  +/g, ' ');
  $('#'+id).val(str);
}

//Only Alphabets and numeric keys
function isAlphaNumericKey(e)
  {
    var regex = new RegExp("^[a-zA-Z0-9]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
          return true;
        }
        else
        {			
          return false;
        }
  }
    

</script> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel Project\regallife 11march\resources\views/admin/edit-profile.blade.php ENDPATH**/ ?>