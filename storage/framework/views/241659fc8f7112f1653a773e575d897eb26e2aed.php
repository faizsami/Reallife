<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Regal Life Indiaadmin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Regal Life Indiaadmin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="TechInspire">
    <title>Regal Life India- <?php echo $__env->yieldContent('page_name'); ?></title>
    <link rel="apple-touch-icon" href="<?php echo e(asset('assets/images/ico/apple-icon-120.png')); ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('assets/images/ico/favicon.ico')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/css/vendors.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/css/charts/apexcharts.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/vendors/css/extensions/toastr.min.css')); ?>">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/bootstrap.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/bootstrap-extended.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/colors.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/components.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/themes/dark-layout.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/themes/bordered-layout.css')); ?>">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/core/menu/menu-types/vertical-menu.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/pages/dashboard-ecommerce.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/plugins/charts/chart-apex.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/plugins/extensions/ext-component-toastr.css')); ?>">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/all.css')); ?>"><!-- FontAwesome CSS-->
	<!-- END: Custom CSS-->
	
	<!-- BEGIN: Vendor JS-->
    <script src="<?php echo e(asset('assets/vendors/js/vendors.min.js')); ?>"></script>
    <!-- BEGIN Vendor JS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern navbar-floating footer-static menu-collapsed <?php echo e(Auth::user()->theme->setting == 1 ? 'dark-layout' : ''); ?>" data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i class="ficon text-warning" data-feather="star"></i></a>
                        <div class="bookmark-input search-input">
                            <div class="bookmark-input-icon"><i data-feather="search"></i></div>
                            <input class="form-control input" type="text" placeholder="Bookmark" tabindex="0" data-search="search">
                            <ul class="search-list search-list-bookmark"></ul>
                        </div>
                    </li>
                </ul>     
                
            </div>
  
            <ul class="nav navbar-nav align-items-center ml-auto">
                <li class="nav-item d-lg-block"><a class="nav-link" href="<?php echo e(url('/admin/change-theme-dark')); ?>"><i class="ficon" data-feather="<?php echo e(Auth::user()->theme->setting == 1 ? 'sun' : 'moon'); ?>"></i></a></li>                                
                
                <li class="nav-item dropdown dropdown-notification mr-25">

                    
                    <?php ($notifications = Auth::user()->notification()->orderBy('id', 'DESC')->limit(40)->get()->all()); ?>
                    <?php ($total_notification = count($notifications)); ?>
                    <?php ($new_notification = count(Auth::user()->notification()->where('status', 0)->get()->all())); ?>
                    
                    <a class="nav-link" href="javascript:void(0);" data-toggle="dropdown">
                        <i class="ficon" data-feather="bell"></i>
                        <span class="badge badge-pill badge-danger badge-up" id="notificationNew"><?php echo e($new_notification); ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                        <li class="dropdown-menu-header">
                            <div class="dropdown-header d-flex">
                                <h4 class="notification-title mb-0 mr-auto">Notifications</h4>
                                <div class="badge badge-pill badge-light-primary">Read Notifications</div>
                            </div>
                        </li>
                        <li class="scrollable-container media-list">
                            <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="d-flex <?php echo e($notification->status == 0 ? 'bg-light' : ''); ?> notificationclass" id="notifictionId<?php echo e($notification->id); ?>" href="#" <?php if($notification->status == 0): ?> onclick="event.preventDefault();readNotification(<?php echo e($notification->id); ?>, $(this).attr('id'), '<?php echo e($notification->url); ?>')" <?php else: ?> onclick="event.preventDefault();window.location='<?php echo e($notification->url); ?>' " <?php endif; ?>>
                                    <div class="media d-flex align-items-start">
                                        <div class="media-left">
                                            <div class="avatar text-dark">
                                                <?php echo $notification->icon; ?>

                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <p class="media-heading">
                                                <span class="font-weight-bolder"><?php echo e($notification->title); ?></span>
                                            </p>
                                            <small class="notification-text"><?php echo e($notification->description); ?></small>
                                        </div>
                                    </div>
                                </a>                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                            
                        </li>
                        <li class="dropdown-menu-footer"><a class="btn btn-primary btn-block" href="#" onclick="event.preventDefault();markAsAllRead(<?php echo e(Auth::user()->id); ?>);">Mark as all read</a></li>
                    </ul>
                </li>


                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span class="user-name font-weight-bolder"><?php echo e(Auth::user()->user_name); ?></span><span class="user-status">Admin</span></div><span class="avatar"><img class="round" src="<?php echo e(asset('uploads/profiles/'.Auth::user()->personal->profile_image)); ?>" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
						<a class="dropdown-item" href="<?php echo e(url('/admin/profile')); ?>">
							<i class="mr-50" data-feather="user"></i> 
							Profile
                        </a>
                        <a class="dropdown-item" href="<?php echo e(url('/admin/wallet')); ?>">
							<i class="mr-50" data-feather="credit-card"></i> 
							Wallet
                        </a>
						<a class="dropdown-item" href="<?php echo e(url('/admin/edit-profile')); ?>">
							<i class="mr-50" data-feather="edit"></i> 
							Edit Profile
						</a>
						<a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
								<?php echo csrf_field(); ?>
							</form>
							<i class="mr-50" data-feather="power"></i> 
							Logout
						</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="<?php echo e(url('/admin/dashboard')); ?>"><span class="brand-logo">
                            <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                                <defs>
                                    <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                        <stop stop-color="#000000" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                    <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                        <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                </defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                        <g id="Group" transform="translate(400.000000, 178.000000)">
                                            <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>
                                            <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                            <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                            <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                            <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                        </g>
                                    </g>
                                </g>
                            </svg></span>
                        <h2 class="brand-text">Regal</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
				<li class="<?php echo e($active == 'dashboard' ? 'active' : ''); ?> nav-item">
					<a class="d-flex align-items-center" href="<?php echo e(url('/admin/dashboard')); ?>">
						<i data-feather="home"></i>
						<span class="menu-title text-truncate" data-i18n="Chat">Dashboards</span>
					</a>
                </li>

                <!-- Settings -->
                <li class="<?php echo e($active[0] == 'profile' ? 'has-sub sidebar-group-active menu-collapsed-open' : ''); ?> nav-item">
					<a class="d-flex align-items-center" href="#">
						<i data-feather='settings'></i>
						<span class="menu-title text-truncate" data-i18n="Shopping">Settings</span>
					</a>
                    <ul class="menu-content">
                        <li class="<?php echo e($active[1] == 'profile' ? 'active' : ''); ?>">
                            <a class="d-flex align-items-center" href="<?php echo e(url('/admin/profile')); ?>">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="Edit">Company Details</span>
                            </a>
                        </li>                        
    
                        <li class="<?php echo e($active[1] == 'edit' ? 'active' : ''); ?>">
                            <a class="d-flex align-items-center" href="<?php echo e(url('/admin/edit-profile')); ?>">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="Edit">Edit Details</span>
                            </a>
                        </li>

                        <li class="<?php echo e($active[1] == 'news' ? 'active' : ''); ?>">
                            <a class="d-flex align-items-center" href="<?php echo e(url('/admin/news')); ?>">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="Edit">News</span>
                            </a>
                        </li>
                    </ul>
				</li>

                <!-- Members -->                
                <li class="<?php echo e($active[0] == 'members' ? 'has-sub sidebar-group-active menu-collapsed-open' : ''); ?> nav-item">
					<a class="d-flex align-items-center" href="#">
						<i data-feather='users'></i>
						<span class="menu-title text-truncate" data-i18n="Shopping">Members</span>
					</a>
                    <ul class="menu-content">
                        <li class="<?php echo e($active[1] == 'members' ? 'active' : ''); ?>">
                            <a class="d-flex align-items-center" href="<?php echo e(url('/admin/members')); ?>">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="Edit">All Members</span>
                            </a>
                        </li>

                        <li class="<?php echo e($active[1] == 'kycs' ? 'active' : ''); ?>">
                            <a class="d-flex align-items-center" href="<?php echo e(url('/admin/pending-kyc')); ?>">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="Edit">Pending KYC's</span>
                            </a>
                        </li>

                        <li class="<?php echo e($active[1] == 'registration' ? 'active' : ''); ?>">
							<a class="d-flex align-items-center" href="<?php echo e(url('/admin/registration')); ?>">
								<i data-feather="circle"></i>
								<span class="menu-item" data-i18n="Edit">Registration</span>
							</a>
						</li>
                    </ul>
				</li>                            				

                <!-- Shopping -->
				<li class="<?php echo e($active[0] == 'shopping' ? 'has-sub sidebar-group-active menu-collapsed-open' : ''); ?> nav-item">
					<a class="d-flex align-items-center" href="#">
						<i data-feather="shopping-cart"></i>
						<span class="menu-title text-truncate" data-i18n="Shopping">Shopping</span>
					</a>
                    <ul class="menu-content">
                        <li class="<?php echo e($active[1] == 'orders' ? 'active' : ''); ?>">
                            <a class="d-flex align-items-center" href="<?php echo e(url('/admin/orders')); ?>">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="Edit">Orders</span>
                            </a>
                        </li>

                        <li class="<?php echo e($active[1] == 'add-product' ? 'active' : ''); ?>">
                            <a class="d-flex align-items-center" href="<?php echo e(url('/admin/add-product')); ?>">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="Edit">Add Products</span>
                            </a>
                        </li>
                        
                        <li class="<?php echo e($active[1] == 'category' ? 'active' : ''); ?>">
                            <a class="d-flex align-items-center" href="<?php echo e(url('/admin/categories')); ?>">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="Edit">Categories</span>
                            </a>
                        </li>

                        <li class="<?php echo e($active[1] == 'subcategory' ? 'active' : ''); ?>">
                            <a class="d-flex align-items-center" href="<?php echo e(url('/admin/sub-categories')); ?>">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="Edit">Sub-Categories</span>
                            </a>
                        </li>

                        <li class="<?php echo e($active[1] == 'products' ? 'active' : ''); ?>">
                            <a class="d-flex align-items-center" href="<?php echo e(url('/admin/products')); ?>">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="Edit">Products</span>
                            </a>
                        </li>
                    </ul>
				</li>
				
                <!-- teamview -->
				<li class="<?php echo e($active[0] == 'teamview' ? 'has-sub sidebar-group-active menu-collapsed-open' : ''); ?> nav-item">
					<a class="d-flex align-items-center" href="#">
						<i data-feather='command'></i>
						<span class="menu-title text-truncate" data-i18n="TeamView">TeamView</span>
					</a>
                    <ul class="menu-content">
                        <li class="<?php echo e($active[1] == 'treeview' ? 'active' : ''); ?>">
                            <a class="d-flex align-items-center" href="<?php echo e(url('/admin/tree')); ?>">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="List">My TreeView</span>
                            </a>
                        </li>
                        <li class="<?php echo e($active[1] == 'directs' ? 'active' : ''); ?>">
                            <a class="d-flex align-items-center" href="<?php echo e(url('/admin/directs')); ?>">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="View">My Directs</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Finance -->
                <li class="<?php echo e($active[0] == 'finance' ? 'has-sub sidebar-group-active menu-collapsed-open' : ''); ?> nav-item">
					<a class="d-flex align-items-center" href="#">
						<i data-feather='bar-chart-2'></i>
						<span class="menu-title text-truncate" data-i18n="Finance">Finance</span>
					</a>
                    <ul class="menu-content">
                        <li class="<?php echo e($active[1] == 'wallet' ? 'active' : ''); ?>">
                            <a class="d-flex align-items-center" href="<?php echo e(url('/admin/wallet')); ?>">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="List">Wallet</span>
                            </a>
                        </li>
                        <li class="<?php echo e($active[1] == 'fund-requests' ? 'active' : ''); ?>">
                            <a class="d-flex align-items-center" href="<?php echo e(url('/admin/fund-requests')); ?>">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="View">Fund Requests</span>
                            </a>
                        </li>

                        <li class="<?php echo e($active[1] == 'withdraw-requests' ? 'active' : ''); ?>">
                            <a class="d-flex align-items-center" href="<?php echo e(url('/admin/withdraw-requests')); ?>">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="View">Withdrawal Requests</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="<?php echo e($active[0] == 'franchisee' ? 'has-sub sidebar-group-active menu-collapsed-open' : ''); ?> nav-item">
					<a class="d-flex align-items-center" href="#">
						<i data-feather='git-pull-request'></i>
						<span class="menu-title text-truncate" data-i18n="TeamView">Franchisee Centre</span>
					</a>
                    <ul class="menu-content">
                        <li class="<?php echo e($active[1] == 'package' ? 'active' : ''); ?>">
                            <a class="d-flex align-items-center" href="<?php echo e(url('/admin/franchisee-package')); ?>">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="List">Package</span>
                            </a>
                        </li>
                        <li class="<?php echo e($active[1] == 'request' ? 'active' : ''); ?>">
                            <a class="d-flex align-items-center" href="<?php echo e(url('/admin/franchisee-request')); ?>">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="View">Requests</span>
                            </a>
                        </li>
                        <li class="<?php echo e($active[1] == 'franchisee-orders' ? 'active' : ''); ?>">
                            <a class="d-flex align-items-center" href="<?php echo e(url('/admin/franchisee/orders')); ?>">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="View">Orders</span>
                            </a>
                        </li>

                        
                    </ul>
                </li>

                <li class="<?php echo e($active == 'reports' ? 'has-sub sidebar-group-active menu-collapsed-open' : ''); ?> nav-item">
					<a class="d-flex align-items-center" href="#">
						<i data-feather='pie-chart'></i>
						<span class="menu-title text-truncate" data-i18n="TeamView">Reports</span>
					</a>
                    <ul class="menu-content">
                        <li class="<?php echo e($active == 'bv_report' ? 'active' : ''); ?>">
                            <a class="d-flex align-items-center" href="<?php echo e(url('/admin/bv-report')); ?>">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="List">B.V Report</span>
                            </a>
                        </li>
                        <li class="<?php echo e($active == 'my_gen_bonus_report' ? 'active' : ''); ?>">
                            <a class="d-flex align-items-center" href="<?php echo e(url('/admin/genbonus')); ?>">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="List">My Gen Per Bonus</span>
                            </a>
                        </li>
                        <li class="<?php echo e($active == 'user_report' ? 'active' : ''); ?>">
                            <a class="d-flex align-items-center" href="<?php echo e(url('/admin/user-report')); ?>">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="List">User Report</span>
                            </a>
                        </li>

                        <li class="<?php echo e($active == 'team_report_gen' ? 'active' : ''); ?>">
                            <a class="d-flex align-items-center" href="<?php echo e(url('/admin/team-report-gen')); ?>">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="List">Team Report(GEN)</span>
                            </a>
                        </li>

                        <li class="<?php echo e($active == 'team_report_org' ? 'active' : ''); ?>">
                            <a class="d-flex align-items-center" href="<?php echo e(url('/admin/team-report-org')); ?>">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="List">Team Report(ORG)</span>
                            </a>
                        </li>

                        <li class="<?php echo e($active == 'online_sell_report' ? 'active' : ''); ?>">
                            <a class="d-flex align-items-center" href="<?php echo e(url('/admin/online-sell-report')); ?>">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="List">Online Sell Report</span>
                            </a>
                        </li>

                        <li class="<?php echo e($active == 'business_centre_sell_report' ? 'active' : ''); ?>">
                            <a class="d-flex align-items-center" href="<?php echo e(url('/admin/business-centre-sell-report')); ?>">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="List">Centre Sell Report</span>
                            </a>
                        </li>

                        <li class="<?php echo e($active == 'total_sell_report' ? 'active' : ''); ?>">
                            <a class="d-flex align-items-center" href="<?php echo e(url('/admin/total-sell-report')); ?>">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="List">Total Sell Report</span>
                            </a>
                        </li>
                        
                        <li class="<?php echo e($active == 'gst_report' ? 'active' : ''); ?>">
                            <a class="d-flex align-items-center" href="<?php echo e(url('/admin/gst-report')); ?>">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="List">GST Report</span>
                            </a>
                        </li>

                        <li class="<?php echo e($active == 'tds_report' ? 'active' : ''); ?>">
                            <a class="d-flex align-items-center" href="<?php echo e(url('/admin/tds-report')); ?>">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="List">TDS Report</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="<?php echo e($active[0] == 'closing' ? 'has-sub sidebar-group-active menu-collapsed-open' : ''); ?> nav-item">
					<a class="d-flex align-items-center" href="#">
						<i data-feather='check-circle'></i>
						<span class="menu-title text-truncate" data-i18n="TeamView">Closing</span>
					</a>
                    <ul class="menu-content">
                        <li class="<?php echo e($active[1] == 'view' ? 'active' : ''); ?>">
                            <a class="d-flex align-items-center" href="<?php echo e(url('/admin/view-closing')); ?>">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="List">View</span>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="<?php echo e($active == 'download' ? 'active' : ''); ?> nav-item">
					<a class="d-flex align-items-center" href="<?php echo e(url('/admin/backup')); ?>">
						<i data-feather='download-cloud'></i>
						<span class="menu-title text-truncate" data-i18n="Chat">Download Backup</span>
					</a>
                </li>

            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    <?php echo $__env->yieldContent('content'); ?>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2020<a class="ml-25" href="https://www.techinspire.in" target="_blank">TechInspire</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?php echo e(asset('assets/vendors/js/charts/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendors/js/extensions/toastr.min.js')); ?>"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?php echo e(asset('assets/js/core/app-menu.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/core/app.js')); ?>"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?php echo e(asset('assets/js/scripts/pages/dashboard-ecommerce.js')); ?>"></script>
    <!-- END: Page JS-->
    <script>
        function readNotification(id, read, url)
        {
            $.ajax({
                type:'get',
                url:'/read-notification',
                data:"id="+id,
                success:function(data) 
                {
                    var newNotification = $('#notificationNew');
                    var total_notification = parseInt(newNotification.text());
                    if($('#'+read).hasClass('bg-light'))
                    {
                        total_notification -= 1;
                    }
                    newNotification.text(total_notification);                
                    $('#'+read).removeClass('bg-light');
                    setTimeout(function(){
                        window.location = url;
                    }, 100);
                },
                error:function(error){
                    
                }
            });
        }
        function markAsAllRead(id)
        {
            $.ajax({
                type:'get',
                url:'/mark-as-all-read-notification',
                data:"id="+id,
                success:function(data) 
                {                
                    $('.notificationclass').removeClass('bg-light');
                    var newNotification = $('#notificationNew');
                    var respnses = parseInt(newNotification.text()) - 1;
                    newNotification.text(0);
                },
                error:function(error){
                    
                }
            });
        }
    </script>
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
	</script>


<?php if(Session::has('LoggedInSuccessMessage')): ?>
<script>
	// On load Toast
	setTimeout(function () {
    toastr['success'](
      'You have successfully logged in to Regal Life India World. Now you can start to explore!',
      '👋 Welcome <?php echo e(Auth::user()->user_name); ?>!',
      {
        closeButton: true,
        tapToDismiss: true
      }
    );
  }, 1000);
  
</script>
<?php echo e(Session::forget('LoggedInSuccessMessage')); ?>

<?php endif; ?>


<script>
    function readNotification(id, read, url)
    {
        $.ajax({
            type:'get',
            url:'/read-notification',
            data:"id="+id,
            success:function(data) 
            {
                var newNotification = $('#notificationNew');
                var total_notification = parseInt(newNotification.text());
                if($('#'+read).hasClass('bg-light'))
                {
                    total_notification -= 1;
                }
                newNotification.text(total_notification);                
                $('#'+read).removeClass('bg-light');
                setTimeout(function(){
                    window.location = url;
                }, 100);
            },
            error:function(error){
                
            }
        });
    }
    function markAsAllRead(id)
    {
        $.ajax({
            type:'get',
            url:'/read-allnotification',
            data:"id="+id,
            success:function(data) 
            {                
                $('.notificationclass').removeClass('bg-light');
                var newNotification = $('#notificationNew');
                var respnses = parseInt(newNotification.text()) - 1;
                newNotification.text(0);
            },
            error:function(error){
                
            }
        });
    }
</script>
<script>
    function requestFilter(form, btn, spinner)
    {
        $('#'+btn).attr('disabled', true);
        $('#'+spinner).show();
        setTimeout(() => {
            $('#'+form).submit();
        }, 0);                        
    }
</script>
</body>
<!-- END: Body-->

</html><?php /**PATH E:\Laravel\Reallife\resources\views/layouts/main.blade.php ENDPATH**/ ?>