
<?php $__env->startSection('page_name', 'Our Products'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php ($user = Auth::user()); ?>
<?php ($total_amt = 0); ?>
<?php ($total_pbl = 0); ?>
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/css/forms/wizard/bs-stepper.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/css/extensions/toastr.min.css')); ?>">
<!-- END: Vendor CSS-->
<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/core/menu/menu-types/vertical-menu.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/pages/app-ecommerce.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/plugins/forms/pickers/form-pickadate.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/plugins/forms/form-wizard.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/plugins/extensions/ext-component-toastr.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/plugins/forms/form-number-input.css')); ?>">
<!-- END: Page CSS-->

    <!-- BEGIN: Content-->
    <div class="app-content content ecommerce-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">My Cart</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="<?php echo e(url('/user/products')); ?>">Products</a>
                                    </li>
                                    <li class="breadcrumb-item active">Carts
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-detached">
                <div class="content-body">
                    <div class="bs-stepper checkout-tab-steps">
                        <!-- Wizard starts -->
                        <div class="bs-stepper-header">
                            <div class="step" data-target="#step-cart">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="shopping-cart" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Cart</span>
                                        <span class="bs-stepper-subtitle">Your Cart Items</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i data-feather="chevron-right" class="font-medium-2"></i>
                            </div>
                            <div class="step" data-target="#step-address">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="home" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Address</span>
                                        <span class="bs-stepper-subtitle">Enter Your Address</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line">
                                <i data-feather="chevron-right" class="font-medium-2"></i>
                            </div>
                            <div class="step" data-target="#step-payment">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-box">
                                        <i data-feather="credit-card" class="font-medium-3"></i>
                                    </span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">Payment</span>
                                        <span class="bs-stepper-subtitle">Select Payment Method</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <!-- Wizard ends -->
    
                        <div class="bs-stepper-content">
                            <?php if(count($carts) > 0): ?>
                                <!-- Checkout Place order starts -->
                                <div id="step-cart" class="content">
                                    <div id="place-order" class="list-view product-checkout">
                                        <!-- Checkout Place Order Left starts -->
                                        <div class="checkout-items">
                                            <?php ($total = 0); ?>
                                            <?php ($ptotal = 0); ?>
                                            <?php ($tax = 0); ?>
                                            <?php ($total_amt = 0); ?>
                                            <?php ($total_pbl = 0); ?>
                                            <?php ($iscart=0); ?>
                                            <?php ($totelbv=0); ?>
                                            <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="card ecommerce-card">
                                                    <div class="item-img">
                                                        <a href="" onclick="event.preventDefault();">
                                                            <img src="<?php echo e(asset('uploads/products/'.$cart->product->image)); ?>" alt="img-placeholder" />
                                                        </a>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="item-name">
                                                            <h6 class="mb-0"><a href="app-ecommerce-details.html" class="text-body"><?php echo e($cart->product->name); ?></a></h6>
                                                            <div class="item-rating">
                                                                
                                                            </div>
                                                        </div>
                                                        <?php if($cart->product->stock > 0): ?>
                                                            <span class="text-success mb-1">In Stock</span>
                                                            <small><span class="text-muted mb-1">Available qty: <?php echo e($cart->product->stock); ?></span></small>
                                                            <small><span class="text-muted mb-1">Weight: <?php echo e($cart->product->weight); ?> g</span></small><br>
                                                            <?php ($price = ($cart->qty * $cart->product->sell_price)); ?>
                                                            <?php ($total += $price); ?>
                                                            <?php ($ptotal += ($cart->qty * $cart->product->price)); ?>
                                                            <?php ($totelbv += ($cart->qty * $cart->product->bv)); ?>
                                                            <?php ($tax += ($price * $cart->product->category->gst)/100); ?>
                                                            <?php ($total_amt = $total); ?>
                                                            <?php ($iscart=1); ?>
                                                        <?php else: ?>
                                                            <span class="text-danger">Out Of Stock</span>
                                                            <small><span class="text-muted mb-1">Could not check out for this product.</span></small><br>
                                                        <?php endif; ?>
                                                        <div class="item-quantity">
                                                            <span class="quantity-title">Qty:</span>
                                                            <div class="quantity-counter-wrapper">
                                                                <form action="<?php echo e(url('user/cart-stock-add')); ?>" method="post" id="formcartstock<?php echo e($cart->id); ?>">
                                                                    <?php echo csrf_field(); ?>
                                                                    <input type="hidden" value="<?php echo e($cart->id); ?>" name="id" hidden/>
                                                                    <input type="number" onchange="$('#formcartstock<?php echo e($cart->id); ?>').submit()" class="form-control w-25 border-0 shadow ml-2" name="stock" value="<?php echo e($cart->qty); ?>" />
                                                                </form>
                                                            </div>
                                                        </div>                                                   
                                                    </div>
                                                    <div class="item-options text-center">
                                                        <div class="item-wrapper">
                                                            <div class="item-cost">
                                                                <h4 class="item-price"><del><small>₹<?php echo e(($cart->product->price *$cart->qty )); ?></small></del>&nbsp; ₹<?php echo e(($cart->product->sell_price * $cart->qty)); ?></h4>
                                                                <p class="card-text shipping">
                                                                    <span class="badge badge-pill badge-light-success">Free Shipping</span>
                                                                </p>
                                                            </div>
                                                        </div><br>
                                                        <button type="button" class="btn btn-light mt-1 remove-wishlist" onclick="window.location='<?php echo e(url('/user/delete-from-cart/'.$cart->id)); ?>'">
                                                            <i data-feather="x" class="align-middle mr-25"></i>
                                                            <span>Remove</span>
                                                        </button>                                                    
                                                    </div>
                                                </div>
                                                
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <!-- Checkout Place Order Left ends -->
                                        
                                        <?php ($total_pbl =($total + $tax)); ?>
                                        <!-- Checkout Place Order Right starts -->
                                        <div class="checkout-options">
                                            <div class="card">
                                                <div class="card-body">                                                
                                                    <div class="price-details">
                                                        <h6 class="price-title">Price Details</h6>
                                                        <ul class="list-unstyled">
                                                            <li class="price-detail">
                                                                <div class="detail-title">Total MRP</div>
                                                                <div class="detail-amt">₹<?php echo e($ptotal); ?></div>
                                                            </li>
                                                            <li class="price-detail">
                                                                <div class="detail-title">Discount</div>
                                                                <div class="detail-amt discount-amt text-success">-₹<?php echo e($ptotal-$total); ?></div>
                                                            </li>
                                                            <li class="price-detail">
                                                                <div class="detail-title">Estimated Tax</div>
                                                                <div class="detail-amt">₹<?php echo e(number_format($tax,2)); ?></div>
                                                            </li>
                                                            
                                                            <li class="price-detail">
                                                                <div class="detail-title">Delivery Charges</div>
                                                                <div class="detail-amt discount-amt text-success">Free</div>
                                                            </li>
                                                        </ul>
                                                        <hr />
                                                        <ul class="list-unstyled">
                                                            <li class="price-detail">
                                                                <div class="detail-title detail-total">Total</div>
                                                                <div class="detail-amt font-weight-bolder">                                                                
                                                                    ₹<?php echo e(number_format($total_pbl,2)); ?>

                                                                </div>
                                                            </li>
                                                            <li class="price-detail">
                                                                <div class="detail-title detail-total">Total BV</div>
                                                                <div class="detail-amt font-weight-bolder">                                                                
                                                                    <?php echo e($totelbv); ?>

                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <button type="button" class="btn btn-primary btn-block btn-next place-order">Place Order</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Checkout Place Order Right ends -->
                                        </div>
                                    </div>
                                    <!-- Checkout Place order Ends -->
                                </div>

                                <!-- Checkout Customer Address Starts -->
                                <div id="step-address" class="content">
                                    <form id="checkout-address" class="list-view product-checkout">
                                        <!-- Checkout Customer Address Left starts -->
                                        <div class="card">
                                            <div class="card-header flex-column align-items-start">
                                                <h4 class="card-title">Your Address Details</h4>                                            
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group mb-2">
                                                            <label for="checkout-name">Full Name:</label>
                                                            <input type="text" id="checkout-name" class="form-control" name="fname" value="<?php echo e($user->user_name); ?>" readonly/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group mb-2">
                                                            <label for="checkout-number">Mobile Number:</label>
                                                            <input type="text" id="checkout-number" class="form-control" name="mnumber" value="<?php echo e($user->user_mobile); ?>" readonly/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group mb-2">
                                                            <label for="checkout-apt-number">Address:</label>
                                                            <input type="text" id="checkout-apt-number" class="form-control" name="apt-number" value="<?php echo e($user->personal->address); ?>" readonly/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group mb-2">
                                                            <label for="checkout-landmark">City:</label>
                                                            <input type="text" id="checkout-landmark" class="form-control" name="landmark" value="<?php echo e($user->personal->city); ?>" readonly/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group mb-2">
                                                            <label for="checkout-city">Dist:</label>
                                                            <input type="text" id="checkout-city" class="form-control" name="city" value="<?php echo e($user->personal->dist); ?>" readonly/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group mb-2">
                                                            <label for="checkout-pincode">Pincode:</label>
                                                            <input type="number" id="checkout-pincode" class="form-control" name="pincode" value="<?php echo e($user->personal->postal_code); ?>" readonly/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group mb-2">
                                                            <label for="checkout-state">State:</label>
                                                            <input type="text" id="checkout-state" class="form-control" name="state" value="<?php echo e($user->personal->state); ?>" readonly/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group mb-2">
                                                            <label for="add-type">Country:</label>
                                                            <input type="text" id="checkout-state" class="form-control" name="state" value="<?php echo e($user->personal->country); ?>" readonly/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Checkout Customer Address Left ends -->
        
                                        <!-- Checkout Customer Address Right starts -->
                                        <div class="customer-card">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title"><?php echo e($user->user_name); ?></h4>
                                                </div>
                                                <div class="card-body actions">
                                                    <p class="card-text mb-0"><?php echo e($user->personal->address); ?></p>
                                                    <p class="card-text"><?php echo e($user->personal->city.' '.$user->personal->dist.' '.$user->personal->postal_code); ?></p>
                                                    <p class="card-text"><?php echo e($user->personal->state.' '.$user->personal->country); ?></p>
                                                    <p class="card-text">
                                                        <?php echo e($user->user_mobile); ?><br>
                                                        <?php echo e($user->personal->alternate_mobile); ?><br>
                                                        <?php echo e($user->email); ?><br>
                                                    </p>
                                                    <button type="button" class="btn btn-primary btn-block btn-next delivery-address mt-2">
                                                        Deliver To This Address
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Checkout Customer Address Right ends -->
                                    </form>
                                </div>
                                <!-- Checkout Customer Address Ends -->
        
                                <!-- Checkout Payment Starts -->
                                <div id="step-payment" class="content">
                                    <form id="checkout-payment" class="list-view product-checkout" onsubmit="return false;">
                                        <div class="payment-type">
                                            <div class="card">
                                                <div class="card-header flex-column align-items-start">
                                                    <h4 class="card-title">Payment options</h4>
                                                </div>
                                                <div class="card-body">
                                                    <h6 class="card-holder-name my-75"><?php echo e($user->user_name); ?></h6>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customColorRadio1" name="paymentOptions" class="custom-control-input" checked />
                                                        <label class="custom-control-label" for="customColorRadio1">
                                                            Wallet Balance: ₹<?php echo e($user->wallet->balance); ?> <br>
                                                            <?php if($user->wallet->balance >= $total_pbl): ?>
                                                            <?php else: ?>  
                                                                <p class="text-danger">Insufficient Balance</p>
                                                            <?php endif; ?>
                                                        </label>
                                                    </div>
                                                    <div class="customer-cvv mt-1">
                                                        <div class="form-inline">
                                                            <?php if($user->wallet->balance >= $total_pbl && $iscart == 1): ?>
                                                                <a href="<?php echo e(url('/user/cart-payout-order/0')); ?>" class="btn btn-primary btn-cvv ml-0 ml-sm-1 mb-50">
                                                                    Continue with online shopping
                                                                </a>
                                                                <a href="<?php echo e(url('/user/cart-payout-order/1')); ?>" class="btn btn-primary btn-cvv ml-0 ml-sm-1 mb-50">
                                                                    Continue with local franchisee
                                                                </a>
                                                            <?php else: ?>  
                                                                <button type="button" class="btn btn-primary btn-cvv ml-0 ml-sm-1 mb-50" disabled>Continue</button>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div><br>

                                                    <?php if($user->is_partner == 1): ?>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customColorRadio10" name="paymentOptionss" class="custom-control-input" checked/>
                                                            <label class="custom-control-label" for="customColorRadio1">
                                                                Franchisee Wallet Balance: ₹<?php echo e($user->wallet->franchisee_balance); ?> <br>
                                                                <?php if($user->wallet->franchisee_balance >= $total_pbl): ?>
                                                                <?php else: ?>  
                                                                    <p class="text-danger">Insufficient Balance</p>
                                                                <?php endif; ?>
                                                            </label>
                                                        </div>
                                                    <?php endif; ?>

                                                    <div class="customer-cvv mt-1">
                                                        <div class="form-inline">
                                                            <?php if($user->is_partner == 1): ?>
                                                                <?php if($user->wallet->franchisee_balance >= $total_pbl && $iscart == 1): ?>
                                                                    <a href="<?php echo e(url('/user/franchiseee/cart-payout-order/')); ?>" class="btn btn-primary btn-cvv ml-0 ml-sm-1 mb-50">Continue</a>
                                                                <?php else: ?>  
                                                                    <button type="button" class="btn btn-primary btn-cvv ml-0 ml-sm-1 mb-50" disabled>Continue</button>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div><br>

                                                    <?php if($user->wallet->reward > 0): ?>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="" name="" class="custom-control-input" checked/>
                                                            <label class="custom-control-label" for="customColorRadio1">
                                                                Reward Balance: ₹<?php echo e($user->wallet->reward); ?><br>
                                                                <?php if($user->wallet->reward >= $total_pbl): ?>
                                                                <?php else: ?>  
                                                                    <p class="text-danger">Insufficient Balance</p>
                                                                <?php endif; ?>
                                                            </label>
                                                        </div>
                                                    <?php endif; ?>

                                                    <div class="customer-cvv mt-1">
                                                        <div class="form-inline">
                                                            <?php if($user->wallet->reward > 0): ?>
                                                                <?php if($user->wallet->reward >= $total_pbl && $iscart == 1): ?>
                                                                    <a href="<?php echo e(url('/user/reward/cart-payout-order/')); ?>" class="btn btn-primary btn-cvv ml-0 ml-sm-1 mb-50">Continue</a>
                                                                <?php else: ?>  
                                                                    <button type="button" class="btn btn-primary btn-cvv ml-0 ml-sm-1 mb-50" disabled>Continue</button>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <hr class="my-2" />
                                                    <ul class="other-payment-options list-unstyled">
                                                        <li class="py-50">
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="customColorRadio2" name="paymentOptions" class="custom-control-input" />
                                                                <label class="custom-control-label" for="customColorRadio2"> Credit / Debit / ATM Card </label>
                                                            </div>
                                                        </li>
                                                        <li class="py-50">
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="customColorRadio3" name="paymentOptions" class="custom-control-input" />
                                                                <label class="custom-control-label" for="customColorRadio3"> Net Banking </label>
                                                            </div>
                                                        </li>
                                                        <li class="py-50">
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="customColorRadio4" name="paymentOptions" class="custom-control-input" />
                                                                <label class="custom-control-label" for="customColorRadio4"> EMI (Easy Installment) </label>
                                                            </div>
                                                        </li>
                                                        <li class="py-50">
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="customColorRadio5" name="paymentOptions" class="custom-control-input" />
                                                                <label class="custom-control-label" for="customColorRadio5"> Cash On Delivery </label>
                                                            </div>
                                                        </li>
                                                    </ul>                                                
                                                </div>
                                            </div>
                                        </div>
                                        <div class="amount-payable checkout-options">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Price Details</h4>
                                                </div>
                                                <div class="card-body">
                                                    <ul class="list-unstyled price-details">
                                                        <li class="price-detail">
                                                            <div class="details-title">Total price</div>
                                                            <div class="detail-amt">
                                                                <strong>₹<?php echo e(number_format($total_pbl,2)); ?></strong>
                                                            </div>
                                                        </li>
                                                        <li class="price-detail">
                                                            <div class="details-title">Delivery Charges</div>
                                                            <div class="detail-amt discount-amt text-success">Free</div>
                                                        </li>
                                                    </ul>
                                                    <hr />
                                                    <ul class="list-unstyled price-details">
                                                        <li class="price-detail">
                                                            <div class="details-title">Amount Payable</div>
                                                            <div class="detail-amt font-weight-bolder">₹<?php echo e($total_pbl); ?></div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- Checkout Payment Ends -->
                                <!-- </div> -->
                            <?php else: ?>
                                <p class="mt-5 text-muted text-center">No item in cart.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- END: Content-->

    <!-- BEGIN: Page JS-->
    <script src="<?php echo e(asset('/assets/js/scripts/pages/app-ecommerce-checkout.js')); ?>"></script>
    <!-- END: Page JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?php echo e(asset('/assets/vendors/js/forms/wizard/bs-stepper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')); ?>"></script>
    <script src="<?php echo e(asset('/assets/vendors/js/extensions/toastr.min.js')); ?>"></script>
    <!-- END: Page Vendor JS-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel Project\regallife 11march\resources\views/user/cart.blade.php ENDPATH**/ ?>