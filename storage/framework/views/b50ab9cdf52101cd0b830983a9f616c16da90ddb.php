<!DOCTYPE html>
<html lang="en">


<head>
<!-- Meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="Anil z" name="author">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Organiq is clean and modern organic foods store template perfect for Organic Farm shop, organic foods, agriculture and niche foods store.">
<meta name="keywords" content="food shop, fresh, modern, organic farm, organic farm shop, organic food, organic shop, agriculture, agritourism, agrotourism, e-commerce, eco, eco products, farm, farming, food, health, organic, organic food, retail, shop, store">

<!-- SITE TITLE -->
<title>Regal Life India</title>
<!-- Favicon Icon -->
<link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('landing/images/favicon.png')); ?>">
<!-- Animation CSS -->
<link rel="stylesheet" href="<?php echo e(asset('landing/css/animate.css')); ?>">	
<!-- Latest Bootstrap min CSS -->
<link rel="stylesheet" href="<?php echo e(asset('landing/bootstrap/css/bootstrap.min.css')); ?>">
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Lobster+Two:400,700" rel="stylesheet">  
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet"> 
<!-- Icon Font CSS -->
<link rel="stylesheet" href="<?php echo e(asset('landing/css/ionicons.min.css')); ?>">
<!-- FontAwesome CSS -->
<link rel="stylesheet" href="<?php echo e(asset('landing/css/all.min.css')); ?>">
<!-- Themify Font CSS -->
<link rel="stylesheet" href="<?php echo e(asset('landing/css/themify-icons.css')); ?>">
<!--- owl carousel CSS-->
<link rel="stylesheet" href="<?php echo e(asset('landing/owlcarousel/css/owl.carousel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('landing/owlcarousel/css/owl.theme.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('landing/owlcarousel/css/owl.theme.default.min.css')); ?>">
<!-- Magnific Popup CSS -->
<link rel="stylesheet" href="<?php echo e(asset('landing/css/magnific-popup.css')); ?>">
<!-- jquery-ui CSS -->
<link rel="stylesheet" href="<?php echo e(asset('landing/css/jquery-ui.css')); ?>">
<!-- Style CSS -->
<link rel="stylesheet" href="<?php echo e(asset('landing/css/style.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('landing/css/responsive.css')); ?>">
<link rel="stylesheet" id="layoutstyle" href="<?php echo e(asset('landing/color/theme-default.css')); ?>">

<script>
var sc_project=11981757; 
var sc_invisible=1; 
var sc_security="35d2687e"; 
var sc_https=1; 
</script>

</head>

<body>
<?php echo $__env->make('partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- LOADER -->
<div id="preloader">
    <div class="line-scale">
    	<div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
</div>
<!-- END LOADER --> 

<!-- START HEADER -->
<header class="header_wrap dark_skin main_menu_uppercase">
	<div class="top-header bg_gray">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                	<ul class="contact_detail border_list list_none text-center text-md-left">
                        <li><a href="#"><i class="ti-mobile"></i> <span>+123 456 7890</span></a></li>
                        <li><a href="#"><i class="ti-email"></i> <span>info@regallifeindia.com</span></a></li>
                    </ul>
                </div>
                <div class="col-md-5">
                    <ul class="header_list border_list list_none header_dropdown text-center text-md-right">
                        <li>
                            <div class="custome_dropdown">
                                <select name="countries" class="custome_select">
                                    <option value='en' data-title="English">English</option>
                                    <option value='fn' data-title="France">France</option>
                                    <option value='us' data-title="United States">United States</option>
                                </select>
                            </div>
                        </li>
                        <li class="dropdown">
                          <a class="dropdown-toggle" href="#" data-toggle="dropdown">My Account</a>
                          <div class="dropdown-menu shadow dropdown-menu-right">
                            <ul>
                              <?php if(Auth::check()): ?>
                                <li><a class="dropdown-item" href="<?php echo e(url('/login')); ?>"><?php echo e(Auth::user()->user_name); ?></a></li>
                              <?php else: ?>
                                <li><a class="dropdown-item" href="<?php echo e(url('/login')); ?>">My Account</a></li>
                              <?php endif; ?>
                                <li><a class="dropdown-item" href="<?php echo e(url('/user/cart')); ?>">Checkout</a></li>
                              <?php if(Auth::check()): ?>
                                <li>
                                  <a class="dropdown-item" href="<?php echo e(url('/login')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                  <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                  </form>
                                </li>
                              <?php endif; ?>
                            </ul>
                          </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <nav class="navbar navbar-expand-lg"> 
            <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                <img class="logo_light" src="<?php echo e(asset('landing/images/logo_white.png')); ?>" alt="logo" />
                <img class="logo_dark" src="<?php echo e(asset('landing/images/logo_dark.png')); ?>" alt="logo" />
                <img class="logo_default" src="<?php echo e(asset('landing/images/logo_dark.png')); ?>" alt="logo" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="ion-android-menu"></span> </button>
			
			
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
				<ul class="navbar-nav">
                   
                    <li>                    <li>
                        <a class="nav-link" href="<?php echo e(url('/')); ?>">Home</a>
                    </li>
                    <li>                    <li>
                        <a class="nav-link" href="<?php echo e(url('/about')); ?>">About Us</a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?php echo e(url('/shop')); ?>">Shop</a>                        
                    </li>
                    <li>
                        <a class="nav-link" href="<?php echo e(url('/contact')); ?>">Contact</a>
                    </li>
                </ul>
            </div>
            <ul class="navbar-nav attr-nav align-items-center">
                <li><a href="javascript:void(0);" class="nav-link search_trigger"><i class="ion-ios-search-strong"></i></a>
                    <div class="search-overlay">
                        <div class="search_wrap">
                            <form>
                                <div class="rounded_input">
                                	<input type="text" placeholder="Search" class="form-control" id="search_input">
                                </div>
                                <button type="submit" class="search_icon"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </li>
                <li class="dropdown cart_wrap">
                  <?php if(Auth::check()): ?>
                    <?php ($carts = Auth::user()->cart); ?>
                  <?php else: ?>
                  <?php ($carts = []); ?>
                  <?php endif; ?>
                	<a class="nav-link" href="#" data-toggle="dropdown">
                    <i class="ion-bag"></i>
                    <span class="cart_count"><?php echo e(count($carts)); ?></span>
                  </a>
                    <div class="cart_box dropdown-menu dropdown-menu-right">
                          <?php if(Auth::check()): ?>
                            <ul class="cart_list">
                              <?php ($total_price = 0); ?>
                              <?php ($count = 1); ?>
                              <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($count <= 5): ?>
                                  <li>
                                      <a href="#" class="item_remove" onclick="window.location='<?php echo e(url('/user/delete-from-cart/'.$cart->id)); ?>'"><i class="ion-close"></i></a>
                                      <a href="#"><img src="<?php echo e(asset('uploads/products/'.$cart->product->image)); ?>" alt="cart_thumb1"><?php echo e($cart->product->name); ?></a>
                                      <span class="cart_quantity"> <?php echo e($cart->qty); ?> x <span class="cart_amount"> <span class="price_symbole">₹</span><?php echo e(number_format($cart->product->sell_price, 2)); ?></span></span>
                                      <?php ($total_price = ($total_price + ($cart->qty * $cart->product->sell_price))); ?>
                                  </li>
                                <?php endif; ?>
                                <?php ($count++); ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <div class="cart_footer">
                                <p class="cart_total">Total: <span class="cart_amount"> <span class="price_symbole">₹</span><?php echo e(number_format($total_price, 2)); ?></span></p>
                                <p class="cart_buttons"><a href="<?php echo e(url('/user/cart')); ?>" class="btn btn-default btn-radius view-cart">View Cart</a><a href="<?php echo e(url('/user/cart')); ?>" class="btn btn-dark btn-radius checkout">Checkout</a></p>
                            </div>
                          <?php else: ?>
                            <div class="cart_footer">
                              <p class="cart_buttons">
                                <a href="<?php echo e(url('/login')); ?>" class="btn btn-default btn-radius view-cart">Login</a>
                              </p>
                            </div>
                          <?php endif; ?>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</header>
<!-- END HEADER --> 

<?php echo $__env->yieldContent('content'); ?>

<!-- START SECTION TESTIMONIAL -->
<!-- END SECTION TESTIMONIAL -->

<!-- START SECTION BLOG -->

<!-- END SECTION BLOG -->

<!-- START SECTION CLIENT LOGO -->
<!-- END SECTION CLIENT LOGO -->

<!-- END SECTION NEWSLATTER -->
<!-- END SECTION NEWSLATTER -->

<!-- START FOOTER -->
<footer class="bg_gray">
	<div class="top_footer small_pt small_pb">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-4">
                	<div class="footer_logo">
                    	<a href="index.html"><img alt="logo" src="<?php echo e(asset('landing/images/logo_dark.png')); ?>"></a>
                    </div>
                    <div class="footer_desc">
                    	<p>Welcome to Regal Life India, a valley of wellness and wealth. We are here to create a team of healthy and wealthy minds so that we can create a wonderful and positive Country..</p>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4">
                	<h5 class="widget_title">Important Links</h5>
                    <ul class="list_none widget_links">
                    	<li><a href="<?php echo e(url('/about')); ?>">About Us</a></li>
                        <li><a href="<?php echo e(url('/contact')); ?>">Contact Us</a></li>
						<li><a href="<?php echo e(url('/login')); ?>">Sign In</a></li>
                        </ul>
                </div>
                
				<div class="col-12 col-md-4 col-lg-4">
                	<h5 class="widget_title">Contact Information</h5>
                    <ul class="contact_info list_none">
                    	<li>
                            <span class="ti-mobile"></span>
                            <p>+123 456 7890</p>
                        </li>
                        <li>
                            <span class="ti-email"></span>
                            <a href="mailto:info@yourmail.com">info@regallifeindia.com</a>
                        </li>
                        <li>
                            <span class="ti-location-pin"></span>
                            <address>Regal Life India Dehradun Chowk,Saharanpur, Uttar Pradesh,247001</address>
                        </li>
                    </ul>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="middle_footer">
    	<div class="container">
        	<div class="row">
            	<div class="col-12">
                	<div class="shopping_info">
                        <div class="row justify-content-center">
                            <div class="col-md-4">	
                                <div class="icon_box icon_box_style2">
                                    <div class="box_icon">
                                        <i class="fas fa-truck"></i>
                                    </div>
                                    <div class="intro_desc">
                                    	<h5>Free Shipping</h5>
                                        <p>With Delivery on Time</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">	
                                <div class="icon_box icon_box_style2">
                                    <div class="box_icon">
                                        <i class="fas fa-dollar-sign"></i>
                                    </div>
                                    <div class="intro_desc">
                                    	<h5>Free Returns</h5>
                                        <p>Free Returns In 15 Days</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">	
                                <div class="icon_box icon_box_style2">
                                    <div class="box_icon">
                                        <i class="far fa-life-ring"></i>
                                    </div>
                                    <div class="intro_desc">
                                    	<h5>24/7 Online Support</h5>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_footer">
    	<div class="container">
        	<div class="row align-items-center">
            	<div class="col-lg-4">
                    <p class="copyright m-lg-0 text-center">Copyright © 2019 All Rights Reserved </p>
                </div>
                <div class="col-lg-4">
                    <ul class="list_none social_icons radius_social text-center text-lg-right">
                        <li><a href="#" class="sc_facebook"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" class="sc_twitter"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" class="sc_google"><i class="fab fa-google-plus-g"></i></a></li>
                        <li><a href="#" class="sc_instagram"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#" class="sc_pinterest"><i class="fab fa-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="overlap_shape">
        <div class="ol_shape21">
            <div class="animation">
                <img data-parallax='{"y": 20, "smoothness": 20}' src="<?php echo e(asset('landing/images/shape36.png')); ?>" alt="shape36"/>
            </div>
        </div>
        <div class="ol_shape22">
            <div class="animation">
                <img data-parallax='{"y": 20, "smoothness": 20}' src="<?php echo e(asset('landing/images/shape37.png')); ?>" alt="shape37"/>
            </div>
        </div>
        <div class="ol_shape23">
            <div class="animation">
                <img data-parallax='{"y": 20, "smoothness": 20}' src="<?php echo e(asset('landing/images/shape38.png')); ?>" alt="shape38"/>
            </div>
        </div>
        <div class="ol_shape24">
            <div class="animation">
                <img data-parallax='{"y": 20, "smoothness": 20}' src="<?php echo e(asset('landing/images/shape39.png')); ?>" alt="shape39"/>
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER -->

<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a> 

<!-- Latest jQuery --> 
<script src="<?php echo e(asset('landing/js/jquery-1.12.4.min.js')); ?>"></script> 
<!-- jquery-ui --> 
<script src="<?php echo e(asset('landing/js/jquery-ui.js')); ?>"></script>
<!-- popper min js --> 
<script src="<?php echo e(asset('landing/js/popper.min.js')); ?>"></script>
<!-- Latest compiled and minified Bootstrap --> 
<script src="<?php echo e(asset('landing/bootstrap/js/bootstrap.min.js')); ?>"></script> 
<!-- owl-carousel min js  --> 
<script src="<?php echo e(asset('landing/owlcarousel/js/owl.carousel.min.js')); ?>"></script> 
<!-- magnific-popup min js  --> 
<script src="<?php echo e(asset('landing/js/magnific-popup.min.js')); ?>"></script> 
<!-- waypoints min js  --> 
<script src="<?php echo e(asset('landing/js/waypoints.min.js')); ?>"></script> 
<!-- parallax js  --> 
<script src="<?php echo e(asset('landing/js/parallax.js')); ?>"></script> 
<!-- jquery dd js  --> 
<script src="<?php echo e(asset('landing/js/jquery.dd.min.js')); ?>"></script>
<!-- countdown js  --> 
<script src="<?php echo e(asset('landing/js/jquery.countdown.min.js')); ?>"></script> 
<!-- jquery.counterup.min js --> 
<script src="<?php echo e(asset('landing/js/jquery.counterup.min.js')); ?>"></script>
<!-- jquery.parallax-scroll js -->
<script src="<?php echo e(asset('landing/js/jquery.parallax-scroll.js')); ?>"></script>
<!-- elevatezoom js -->
<script src='<?php echo e(asset('landing/js/jquery.elevatezoom.js')); ?>'></script>
<!-- fit video  -->
<script src="<?php echo e(asset('landing/js/jquery.fitvids.js')); ?>"></script>
<!-- imagesloaded js --> 
<script src="<?php echo e(asset('landing/js/imagesloaded.pkgd.min.js')); ?>"></script>
<!-- isotope min js --> 
<script src="<?php echo e(asset('landing/js/isotope.min.js')); ?>"></script>
<!-- cookie js -->
<script src="<?php echo e(asset('landing/js/js.cookie.js')); ?>"></script>
<!-- scripts js --> 
<script src="<?php echo e(asset('landing/js/scripts.js')); ?>"></script>

</body>
</html><?php /**PATH D:\Laravel Project\regallife 11march\resources\views/layouts/site.blade.php ENDPATH**/ ?>