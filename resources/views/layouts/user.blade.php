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
    <title>Regal Life India- @yield('page_name')</title>
    <link rel="apple-touch-icon" href="{{ asset('assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/extensions/toastr.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/themes/bordered-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/dashboard-ecommerce.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugins/charts/chart-apex.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugins/extensions/ext-component-toastr.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/all.css') }}"><!-- FontAwesome CSS-->
	<!-- END: Custom CSS-->
	
	<!-- BEGIN: Vendor JS-->
    <script src="{{ asset('assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern navbar-floating footer-static menu-collapsed {{Auth::user()->theme->setting == 1 ? 'dark-layout' : '' }}" data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>                    
                </ul>
            </div>            
            <ul class="nav navbar-nav align-items-center ml-auto">
                @php
                    $carts = Auth::user()->cart;
                @endphp
                <li class="nav-item dropdown dropdown-cart mr-25">
                    <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none">
                            <span class="user-name font-weight-bolder">Wallet Balance: ₹{{ number_format(Auth::user()->wallet->balance,2) }}</span>
                        </div>
                    </a>                    
                </li>
                <li class="nav-item d-lg-block"><a class="nav-link" href="{{ url('/user/change-theme-dark') }}"><i class="ficon" data-feather="{{Auth::user()->theme->setting == 1 ? 'sun' : 'moon' }}"></i></a></li>                
                <li class="nav-item dropdown dropdown-cart mr-25"><a class="nav-link" href="javascript:void(0);" data-toggle="dropdown"><i class="ficon" data-feather="shopping-cart"></i><span class="badge badge-pill badge-primary badge-up cart-item-count">{{count($carts)}}</span></a>
                    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">                        
                        <li class="dropdown-menu-header">
                            <div class="dropdown-header d-flex">
                                <h4 class="notification-title mb-0 mr-auto">My Cart</h4>
                                <div class="badge badge-pill badge-light-primary">{{count($carts)}} Items</div>
                            </div>
                        </li>
                        <li class="scrollable-container media-list">
                            @php($total_price = 0)                         
                            @foreach($carts as $cart)
                                <div class="media align-items-center"><img class="d-block rounded mr-1" src="{{ asset('uploads/products/'.$cart->product->image) }}" alt="donuts" width="62">
                                    <div class="media-body"><i class="ficon cart-item-remove" data-feather="x" onclick="window.location='{{ url('/user/delete-from-cart/'.$cart->id) }}'"></i>
                                        <div class="media-heading">
                                            <h6 class="cart-item-title"><a class="text-body" href=""> {{$cart->product->name}}</a></h6><small class="cart-item-by"></small>
                                        </div>
                                        <div class="cart-item-qty">
                                            <div class="">
                                                <form action="{{ url('user/cart-stock-add') }}" method="post" id="formcartstockheader{{$cart->id}}">
                                                    @csrf
                                                    <input type="hidden" value="{{$cart->id}}" name="id" hidden/>
                                                    <input type="number" onchange="$('#formcartstockheader{{$cart->id}}').submit()" class="form-control w-50 border-0 shadow ml-2" name="stock" value="{{$cart->qty}}" />
                                                </form>
                                            </div>
                                        </div>
                                        <h5 class="cart-item-price">
                                            @php($price = $cart->product->sell_price * $cart->qty)
                                            @php($price += $price*$cart->product->category->gst/100)
                                            ₹ {{ number_format($price, 2) }}
                                        </h5>
                                    </div>
                                </div>
                                @php($total_price += $price)
                            @endforeach                       
                        </li>
                        <li class="dropdown-menu-footer">
                            <div class="d-flex justify-content-between mb-1">
                                <h6 class="font-weight-bolder mb-0">Total:</h6>
                                <h6 class="text-primary font-weight-bolder mb-0">₹ {{number_format($total_price,2)}}</h6>
                            </div><a class="btn btn-primary btn-block" href="{{ url('/user/cart/') }}">Checkout</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown dropdown-notification mr-25">

                    {{-- Fetch User Notifications --}}
                    @php($notifications = Auth::user()->notification()->orderBy('id', 'DESC')->limit(40)->get()->all())
                    @php($total_notification = count($notifications))
                    @php($new_notification = count(Auth::user()->notification()->where('status', 0)->get()->all()))
                    
                    <a class="nav-link" href="javascript:void(0);" data-toggle="dropdown">
                        <i class="ficon" data-feather="bell"></i>
                        <span class="badge badge-pill badge-danger badge-up" id="notificationNew">{{$new_notification}}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                        <li class="dropdown-menu-header">
                            <div class="dropdown-header d-flex">
                                <h4 class="notification-title mb-0 mr-auto">Notifications</h4>
                                <div class="badge badge-pill badge-light-primary">Read Notifications</div>
                            </div>
                        </li>
                        <li class="scrollable-container media-list">
                            @foreach($notifications as $notification)
                                <a class="d-flex {{$notification->status == 0 ? 'bg-light' : '' }} notificationclass" id="notifictionId{{$notification->id}}" href="#" @if($notification->status == 0) onclick="event.preventDefault();readNotification({{$notification->id}}, $(this).attr('id'), '{{$notification->url}}')" @else onclick="event.preventDefault();window.location='{{ $notification->url }}' " @endif>
                                    <div class="media d-flex align-items-start">
                                        <div class="media-left">
                                            <div class="avatar text-dark">
                                                {!! $notification->icon !!}
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <p class="media-heading">
                                                <span class="font-weight-bolder">{{$notification->title}}</span>
                                            </p>
                                            <small class="notification-text">{{$notification->description}}</small>
                                        </div>
                                    </div>
                                </a>                                
                            @endforeach
                            
                            
                        </li>
                        <li class="dropdown-menu-footer"><a class="btn btn-primary btn-block" href="#" onclick="event.preventDefault();markAsAllRead({{Auth::user()->id}});">Mark as all read</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span class="user-name font-weight-bolder">{{ Auth::user()->user_name }}</span><span class="user-status">{{Auth::user()->user_id}}</span></div><span class="avatar"><img class="round" src="{{ asset('uploads/profiles/'.Auth::user()->personal->profile_image) }}" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
						<a class="dropdown-item" href="{{ url('/user/profile') }}">
							<i class="mr-50" data-feather="user"></i> 
							Profile
						</a>
						<a class="dropdown-item" href="{{ url('/user/wallet') }}">
							<i class="mr-50" data-feather="credit-card"></i> 
							Wallet
                        </a>
                        <a class="dropdown-item" href="{{ url('/user/edit-profile') }}">
							<i class="mr-50" data-feather="edit"></i> 
							Edit Profile
						</a>
						<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
							<i class="mr-50" data-feather="power"></i> 
							Logout
						</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    
    <ul class="main-search-list-defaultlist-other-list d-none">
        <li class="auto-suggestion justify-content-between"><a class="d-flex align-items-center justify-content-between w-100 py-50">
                <div class="d-flex justify-content-start"><span class="mr-75" data-feather="alert-circle"></span><span>No results found.</span></div>
            </a></li>
    </ul>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ url('/user/dashboard') }}"><span class="brand-logo">
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
				<li class="{{ $active == 'dashboard' ? 'active' : ''}} nav-item">
					<a class="d-flex align-items-center" href="{{ url('/user/dashboard') }}">
						<i data-feather="home"></i>
						<span class="menu-title text-truncate" data-i18n="Chat">Dashboards</span>
					</a>
				</li>

				<li class="{{ $active[0] == 'profile' ? 'has-sub sidebar-group-active menu-collapsed-open' : ''}} nav-item">
					<a class="d-flex align-items-center" href="#">
						<i data-feather="user"></i>
						<span class="menu-title text-truncate" data-i18n="Shopping">Profile</span>
					</a>
                    <ul class="menu-content">
						<li class="{{ $active[1] == 'profile' ? 'active' : ''}}">
							<a class="d-flex align-items-center" href="{{ url('/user/profile') }}">
								<i data-feather="circle"></i>
								<span class="menu-item" data-i18n="Edit">Profile</span>
							</a>
						</li>

						<li class="{{ $active[1] == 'wallet' ? 'active' : ''}}">
							<a class="d-flex align-items-center" href="{{ url('/user/wallet') }}">
								<i data-feather="circle"></i>
								<span class="menu-item" data-i18n="Edit">Wallet</span>
							</a>
						</li>

						<li class="{{ $active[1] == 'edit' ? 'active' : ''}}">
							<a class="d-flex align-items-center" href="{{ url('/user/edit-profile') }}">
								<i data-feather="circle"></i>
								<span class="menu-item" data-i18n="Edit">Edit Profile</span>
							</a>
                        </li>
                        
                        <li class="{{ $active[1] == 'welcome' ? 'active' : ''}}">
							<a class="d-flex align-items-center" href="{{ url('/user/welcome-letter') }}">
								<i data-feather="circle"></i>
								<span class="menu-item" data-i18n="Edit">Welcome Letter</span>
							</a>
						</li>
                    </ul>
                </li>
                
                <li class="{{ $active == 'withdrawal' ? 'active' : ''}} nav-item">
					<a class="d-flex align-items-center" href="{{ url('/user/withdraw') }}">
						<i data-feather='credit-card'></i>
						<span class="menu-title text-truncate" data-i18n="Chat">Withdraw</span>
					</a>
				</li>

				<li class="{{ $active[0] == 'shopping' ? 'has-sub sidebar-group-active menu-collapsed-open' : ''}} nav-item">
					<a class="d-flex align-items-center" href="#">
						<i data-feather="shopping-cart"></i>
						<span class="menu-title text-truncate" data-i18n="Shopping">Shopping</span>
					</a>
                    <ul class="menu-content">
						<li class="{{ $active[1] == 'products' ? 'active' : ''}}">
							<a class="d-flex align-items-center" href="{{ url('/user/products') }}">
								<i data-feather="circle"></i>
								<span class="menu-item" data-i18n="Edit">Products</span>
							</a>
						</li>

						<li class="{{ $active[1] == 'cart' ? 'active' : ''}}">
							<a class="d-flex align-items-center" href="{{ url('/user/cart') }}">
								<i data-feather="circle"></i>
								<span class="menu-item" data-i18n="Edit">My Cart</span>
							</a>
						</li>

						<li class="{{ $active[1] == 'orders' ? 'active' : ''}}">
							<a class="d-flex align-items-center" href="{{ url('/user/orders') }}">
								<i data-feather="circle"></i>
								<span class="menu-item" data-i18n="Edit">My Orders</span>
							</a>
						</li>
                    </ul>
				</li>
				
				<li class="{{ $active[0] == 'teamview' ? 'has-sub sidebar-group-active menu-collapsed-open' : ''}} nav-item">
					<a class="d-flex align-items-center" href="#">
						<i data-feather='command'></i>
						<span class="menu-title text-truncate" data-i18n="TeamView">TeamView</span>
					</a>
                    <ul class="menu-content">
                        <li class="{{ $active[1] == 'teamview' ? 'active' : ''}}">
							<a class="d-flex align-items-center" href="{{ url('/user/tree') }}">
								<i data-feather="circle"></i>
								<span class="menu-item" data-i18n="List">My TreeView</span>
							</a>
                        </li>
                        <li class="{{ $active[1] == 'direct' ? 'active' : ''}}">
							<a class="d-flex align-items-center" href="{{ url('/user/my-direct') }}">
								<i data-feather="circle"></i>
								<span class="menu-item" data-i18n="View">My Directs</span>
							</a>
						</li>
                    </ul>
                </li>
                
                <li class="{{ $active == 'registration' ? 'active' : ''}} nav-item">
					<a class="d-flex align-items-center" href="{{ url('/user/registration') }}">
						<i data-feather="user-plus"></i>
						<span class="menu-title text-truncate" data-i18n="Chat">Registration</span>
					</a>
                </li>

                {{-- <li class="{{ $active == 'bv' ? 'active' : ''}} nav-item">
					<a class="d-flex align-items-center" href="{{ url('/user/add-bv') }}">
						<i data-feather="plus"></i>
						<span class="menu-title text-truncate" data-i18n="Chat">Add BV</span>
					</a>
                </li> --}}
                <li class="nav-item">
					<a class="d-flex align-items-center" href="#">
						<i data-feather='pie-chart'></i>
						<span class="menu-title text-truncate" data-i18n="TeamView">Reports</span>
					</a>
                    <ul class="menu-content">
                        <li class="{{ $active == 'bv_report' ? 'active' : ''}}">
                            <a class="d-flex align-items-center" href="{{ url('/user/bv-report') }}">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="List">B.V Report</span>
                            </a>
                        </li>
                        <li class="{{ $active == 'my_gen_bonus_report' ? 'active' : ''}}">
                            <a class="d-flex align-items-center" href="{{ url('/user/genbonus') }}">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="List">My Gen Per Bonus</span>
                            </a>
                        </li>
                        <li class="{{ $active == 'monthly_incentive' ? 'active' : ''}}">
                            <a class="d-flex align-items-center" href="{{ url('/user/monthly-incentive') }}">
                                <i data-feather="circle"></i>
                                <span class="menu-item" data-i18n="List">Monthly Incentive</span>
                            </a>
                        </li>
                    </ul>
                </li>

                @if(Auth::user()->is_partner == 0)
                    <li class="{{ $active == 'franchisee' ? 'active' : ''}} nav-item">
                        <a class="d-flex align-items-center" href="{{ url('/user/franchisee/requests') }}">
                            <i data-feather='git-pull-request'></i>
                            <span class="menu-title text-truncate" data-i18n="Chat">Franchisee Centre</span>
                        </a>
                    </li>
                @else
                    <li class="{{ $active[0] == 'franchisee' ? 'has-sub sidebar-group-active menu-collapsed-open' : ''}} nav-item">
                        <a class="d-flex align-items-center" href="#">
                            <i data-feather='figma'></i>
                            <span class="menu-title text-truncate" data-i18n="TeamView">Franchisee Centre</span>
                        </a>
                        <ul class="menu-content">
                            <li class="{{ $active[1] == 'franchisee-bill' ? 'active' : ''}}">
                                <a class="d-flex align-items-center" href="{{ url('/user/franchisee/invoices') }}">
                                    <i data-feather="circle"></i>
                                    <span class="menu-item" data-i18n="List">Invoices</span>
                                </a>
                            </li>

                            <li class="{{ $active[1] == 'franchisee-order' ? 'active' : ''}}">
                                <a class="d-flex align-items-center" href="{{ url('/user/franchisee/order') }}">
                                    <i data-feather="circle"></i>
                                    <span class="menu-item" data-i18n="View">Order</span>
                                </a>
                            </li>

                            <li class="{{ $active[1] == 'franchisee-stock' ? 'active' : ''}}">
                                <a class="d-flex align-items-center" href="{{ url('/user/franchisee/stocks') }}">
                                    <i data-feather="circle"></i>
                                    <span class="menu-item" data-i18n="View">Stocks</span>
                                </a>
                            </li>

                            <li class="{{ $active[1] == 'franchisee-wallet' ? 'active' : ''}}">
                                <a class="d-flex align-items-center" href="{{ url('/user/franchisee/wallet') }}">
                                    <i data-feather="circle"></i>
                                    <span class="menu-item" data-i18n="View">Wallet</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    @yield('content')

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2020<a class="ml-25" href="https://1.envato.market/TechInspire_portfolio" target="_blank">TechInspire</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <!-- Referral Link Button -->
    <a data-toggle="tooltip" onclick="event.preventDefault();" id="copytoclipboardId" data-placement="top" title="" data-original-title="Share referral link" {{Auth::user()->theme->setting == 1 ? 'style=background-color:#161d31;' : '' }} href="#" class="float {{Auth::user()->theme->setting == 1 ? '' : 'bg-gradient-primary' }}" target="_blank">
        <input type="text" id="hiddenClipboard" style="display: none" value="{{url('/register?id='.Auth::user()->user_id)}}"/>
        <i data-feather='share-2' class="my-float"></i>
    </a>
    
    <style>
        .float{
            position:fixed;
            width:40px;
            height:40px;
            bottom:75px;
            right:35px;
            color:#FFF;
            border-radius:50px;
            text-align:center;
            font-size:30px;
            box-shadow: 2px 2px 3px #999;
            z-index:100;
        }

        .my-float{
            margin-top:-5px;
        }
    </style>


    

    
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('assets/vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('assets/js/scripts/pages/dashboard-ecommerce.js') }}"></script>
    <!-- END: Page JS-->
    <script src="{{ asset('assets/js/scripts/extensions/ext-component-clipboard.js') }}"></script>
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

{{-- BEGIN: ON load Errors Message --}}
@if(Session::has('LoggedInSuccessMessage'))
<script>
	// On load Toast
	setTimeout(function () {
    toastr['success'](
      'You have successfully logged in to Regal Life India World. Now you can start to explore!',
      '👋 Welcome {{Auth::user()->user_name}}!',
      {
        closeButton: true,
        tapToDismiss: true
      }
    );
  }, 1000);
</script>
{{ Session::forget('LoggedInSuccessMessage')}}
@endif
{{-- END: ON load Errors Message --}}
<script>
    function addStockToCart(id, stock){
        $.ajax({
            type:'get',
            url:'/add-stock-to-cart',
            data:"_token=d<?php echo csrf_token(); ?>&id="+id+"&stock="+stock+"",
            success:function(data) 
            {                
                if(data.status == 1)
                {
                    $('.cartStockQTY'+id).val(stock);
                    // On load Toast
                    setTimeout(function () {
                        toastr['success'](
                        data.msg,
                        'Successfully.!',
                        {
                            closeButton: true,
                            tapToDismiss: false
                        }
                        );
                    }, 1);
                    setTimeout(function() {
                        window.location.reload(true);
                    }, 4000);
                }
                else
                {
                    // On load Toast
                    setTimeout(function () {
                        toastr['error'](
                        data.msg,
                        'Error.!',
                        {
                            closeButton: true,
                            tapToDismiss: false
                        }
                        );
                    }, 2000);
                }
            },
            error:function(error){
                // On load Toast
                setTimeout(function () {
                    toastr['error'](
                        'Something went wrong.!',
                        'Error.!',
                        {
                            closeButton: true,
                            tapToDismiss: false
                        }
                    );
                }, 2000);
            }
        });
    }

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

    function copyToClipboard()
    {
        var copyText = document.getElementById("hiddenClipboard");
        copyText.select();
        document.execCommand("copy");
        alert("Copied the text: " + copyText.value);
        // var element = $('#copytoclipboardId');
        // var text = element.attr('href');
        // var input = $('#hiddenClipboard');
        // input.val(text);
        // input.select();
        // document.execCommand("copy");
        // element.attr('data-original-title', 'Copied.! now you can share.');

    }
</script>

</body>
<!-- END: Body-->

</html>