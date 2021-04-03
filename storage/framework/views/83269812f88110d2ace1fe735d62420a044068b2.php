
<?php $__env->startSection('page_name', 'Our Products'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/plugins/extensions/ext-component-sliders.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/pages/app-ecommerce.css')); ?>">

    <!-- BEGIN: Content-->
    <div class="app-content content ecommerce-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Products</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="<?php echo e(url('/user/products')); ?>">Shopping</a>
                                    </li>
                                    <li class="breadcrumb-item active">Products
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-detached">
                <div class="content-body">
                    <!-- E-commerce Content Section Starts -->
                    <section id="ecommerce-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="ecommerce-header-items">
                                    <div class="result-toggler">
                                        <button class="navbar-toggler shop-sidebar-toggler" type="button" data-toggle="collapse">
                                            <span class="navbar-toggler-icon d-block d-lg-none"><i data-feather="menu"></i></span>
                                        </button>
                                        <div class="search-results"><?php echo e(count($products)); ?> results found</div>
                                    </div>
                                    <div class="view-options d-flex">                                        
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-icon btn-outline-primary view-btn grid-view-btn">
                                                <input type="radio" name="radio_options" id="radio_option1" checked />
                                                <i data-feather="grid" class="font-medium-3"></i>
                                            </label>
                                            <label class="btn btn-icon btn-outline-primary view-btn list-view-btn">
                                                <input type="radio" name="radio_options" id="radio_option2" />
                                                <i data-feather="list" class="font-medium-3"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- E-commerce Content Section Starts -->

                    <!-- background Overlay when sidebar is shown  starts-->
                    <div class="body-content-overlay"></div>
                    <!-- background Overlay when sidebar is shown  ends-->

                    <!-- E-commerce Search Bar Starts -->
                    <section id="ecommerce-searchbar" class="ecommerce-searchbar">
                        <form action="" method="get">
                            <div class="row mt-1">
                                <div class="col-sm-12">
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="search" class="form-control search-product" id="shop-search" placeholder="Search Product" aria-label="Search..." aria-describedby="shop-search" />
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i data-feather="search" class="text-muted"></i></span>
                                        </div>                                    
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                    <!-- E-commerce Search Bar Ends -->

                    <!-- E-commerce Products Starts -->
                    <section id="ecommerce-products" class="grid-view">

                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card ecommerce-card">
                                <div class="item-img text-center">
                                    <a href="" onclick="event.preventDefault()">
                                        <img class="img-fluid card-img-top" src="<?php echo e(asset('uploads/products/'.$product->image)); ?>" style="min-height:200px;max-height:200px;" alt="img-placeholder" /></a>
                                </div>

                                <div class="card-body">
                                    <div class="item-wrapper">
                                        <div class="item-rating">
                                            <?php if($product->stock > 0): ?>
                                                <span class="text-success mb-1">BV:₹ <?php echo e(number_format($product->bv, 2)); ?></span><br>
                                               
                                            <?php else: ?>
                                                <span class="text-danger mb-1">Out Of Stock</span>
                                            <?php endif; ?>

                                            <small>
                                                <span class="text-muted mb-1">Weight: <?php echo e($product->weight); ?> g</span>
                                            </small><br>
                                           
                                        </div>                                        
                                        
                                        <div>
                                            <h6 class="item-price">
                                                <del>
                                                    <small>₹ <?php echo e(($product->price)); ?></small>
                                                </del>
                                                &nbsp; ₹<?php echo e(number_format(($product->sell_price + ($product->sell_price * ($product->category->gst/100))),2)); ?>

                                            </h6>
                                        </div>
                                    </div>
                                    <h6 class="item-name">
                                        <a class="text-body" href=""><?php echo e($product->name); ?></a>                                        
                                    </h6>
                                    <p class="card-text item-description">
                                        <?php echo e($product->description); ?>

                                    </p>
                                </div>

                                <div class="item-options text-center">
                                    <div class="item-wrapper">
                                        <div class="item-cost">
                                            <h4 class="item-price"></h4>
                                        </div>
                                    </div>
                                    <?php if($product->stock > 0): ?>
                                        <a href="<?php echo e(url('/user/add-to-cart/'.$product->id)); ?>" class="btn btn-primary btn-cart">
                                            <i data-feather="shopping-cart"></i>
                                            <span class="add-to-cart">Add to cart</span>
                                        </a>
                                    <?php else: ?>
                                    <a href="#" onclick="event.preventDefault();" class="btn btn-primary btn-cart">
                                        <i data-feather='alert-octagon'></i>
                                        <span class="add-to-cart">Coming Soon</span>
                                    </a>
                                    <?php endif; ?>                                    
                                </div>
                                
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </section>
                    <!-- E-commerce Products Ends -->

                    <!-- E-commerce Pagination Starts -->
                    <section id="ecommerce-pagination">
                        <div class="row  text-center">
                            <div class="mx-auto">
                                <div class="col-lg-6 col-md-7 col-12">
                                    <?php echo e($products->links()); ?>

                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- E-commerce Pagination Ends -->

                </div>
            </div>
            
        </div>
    </div>
    <!-- END: Content-->

    <!-- BEGIN: Page JS-->
    <script src="<?php echo e(asset('assets/js/scripts/pages/app-ecommerce.js')); ?>"></script>
    <!-- END: Page JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?php echo e(asset('assets/vendors/js/extensions/wNumb.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendors/js/extensions/nouislider.min.js')); ?>"></script>
    <!-- END: Page Vendor JS-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel Project\regallife 11march\resources\views/user/products.blade.php ENDPATH**/ ?>