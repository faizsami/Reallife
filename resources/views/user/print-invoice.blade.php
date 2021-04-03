@if($order->type == 'local')
    You need to  recieve your order from your local franchisee then you'll able to print invoice.
@else
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Regal Life India">
    <meta name="keywords" content="Regal Life India">
    <meta name="author" content="Regal Life India">
    <title>Invoice Print - Regal Life India</title>
    <link rel="apple-touch-icon" href="{{ asset('assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/vendors.min.css') }}">
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
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/app-invoice.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css') }}">
    
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static   menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="invoice-preview-wrapper">
                    <div class="row invoice-preview">
                        <!-- Invoice -->
                        <div class="col-xl-12 col-md-12 col-12">
                            <div class="card invoice-preview-card">
                                <div class="card-body invoice-padding pb-0">
                                    <!-- Header starts -->
                                    <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                                        <div>
                                            <div class="logo-wrapper">
                                                <img src="{{asset('/landing/images/logo_dark.png') }}" height="100px"/>
                                            </div>
                                            @php($admin = App\Models\User::where('user_id', $id)->get()->first())
                                            
                                            <p class="card-text mb-25 h4">{{$admin->user_name}}</p>
                                            <p class="card-text mb-25">{{$admin->personal->address}}</p>
                                            <p class="card-text mb-25">
                                                {{$admin->personal->city}},
                                                {{$admin->personal->dist}},
                                                {{$admin->personal->state}},<br>
                                                {{$admin->personal->country}} - 
                                                {{$admin->personal->postal_code}}
                                            </p>
                                            <p class="card-text mb-25">{{$admin->country_code}} {{$admin->user_mobile}}, {{$admin->personal->alternate_mobile}} </p>
                                            <p class="card-text mb-0">{{$admin->email}}<br>
                                                {{strlen($admin->personal->gst) > 4 ? 'GST: '.$admin->personal->gst: ''}}
                                            </p>
                                        </div>
                                        <div class="mt-md-0 mt-2">
                                            <h4 class="invoice-title">
                                                Invoice
                                                <span class="invoice-number">#{{ 'IN'.$order->created_at->year.$order->created_at->month.$order->created_at->day.sprintf("%04d", $order->id)}}</span>
                                            </h4>
                                            <div class="invoice-date-wrapper">
                                                <p class="invoice-date-title">Order Id: </p>
                                                <p class="invoice-date">{{ $order->order_id }}</p>
                                            </div>
                                            <div class="invoice-date-wrapper">
                                                <p class="invoice-date-title">Date Issued:</p>
                                                <p class="invoice-date">
                                                    @php($date_string = date_create($order->created_at))
                                                    @php($date = date_format($date_string, 'd/m/Y'))
                                                    {{ $date }}
                                                </p>
                                            </div>
                                            <div class="invoice-date-wrapper">
                                                <p class="invoice-date-title">Due Date:</p>
                                                <p class="invoice-date">{{ $date }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Header ends -->
                                </div>
    
                                <hr class="invoice-spacing" />
    
                                <!-- Address and Contact starts -->
                                <div class="card-body invoice-padding pt-0">
                                    <div class="row invoice-spacing">
                                        <div class="col-xl-8 col-md-8 p-0">
                                            <h6 class="mb-2">Invoice To:</h6>
                                            <h6 class="mb-25">{{$order->user->user_name}}</h6>
                                            <p class="card-text mb-25">{{$order->user->personal->address}}</p>
                                            <p class="card-text mb-25">
                                                @php($admin = $order->user)
                                                {{$admin->personal->city}},
                                                {{$admin->personal->dist}},
                                                {{$admin->personal->state}},<br>
                                                {{$admin->personal->country}} - 
                                                {{$admin->personal->postal_code}}
                                            </p>
                                            <p class="card-text mb-25">{{$admin->country_code}} {{$admin->user_mobile}}, {{$admin->personal->alternate_mobile}} </p>
                                            <p class="card-text mb-0">{{$admin->email}}<br>
                                                {{strlen($admin->personal->gst) > 4 ? 'GST: '.$admin->personal->gst: ''}}
                                            </p>
                                        </div>
                                        <div class="col-xl-4 col-md-4 p-0 mt-xl-0 mt-2">
                                            <h6 class="mb-2">Payment Details:</h6>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="pr-1">Total Amount:</td>
                                                        <td>
                                                            <span class="font-weight-bold">
                                                                @if($order->payment_method == 'Reward')
                                                                    ₹ 0.00
                                                                @else
                                                                    ₹{{number_format($total_amt, 2)}}
                                                                @endif
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-1">Payment Type:</td>
                                                        <td>{{$order->payment_method}}</td>
                                                    </tr> 
                                                    <tr>
                                                        <td class="pr-1">Payment Status:</td>
                                                        <td class="text-success">Success</td>
                                                    </tr>                                                                                              
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Address and Contact ends -->
    
                                <!-- Invoice Description starts -->
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="py-1">Item Details</th>
                                            <th class="py-1">Price</th>
                                            <th class="py-1">Qty</th>
                                            @php($company_state = App\Models\User::where('user_id', $id)->get()->first()->personal->state)
                                            @php($user_state = $order->user->personal->state)

                                            @if($company_state != $user_state)
                                                <th class="py-1">IGST %</th>
                                            @else
                                                <th class="py-1">CGST %</th>
                                                <th class="py-1">SGST %</th>
                                            @endif
                                            <th class="py-1">Tax Amount</th>
                                            <th class="py-1">Net Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($sub = 0)
                                        @foreach($order->items as $item)
                                            @if($order->payment_method == 'Reward')
                                                @php($gst = 0)
                                                @php($price = 0)
                                            @else
                                                @php($gst = $item->tax)
                                                @php($price = $item->price)
                                            @endif
                                            <tr>
                                                <td class="py-1">
                                                    <p class="card-text font-weight-bold mb-25">{{$item->product->name}}</p>
                                                    <p class="card-text">
                                                        {{$item->product->description}}
                                                    </p>
                                                </td>
                                                <td class="py-1">
                                                    <span class="font-weight-bold">
                                                        ₹{{number_format($item->price, 2)}}
                                                    </span>
                                                </td>

                                                <td class="py-1">
                                                    <span class="font-weight-bold">
                                                        {{$item->qty}}
                                                    </span>
                                                </td>

                                                @if($company_state != $user_state)
                                                    <td class="py-1">
                                                        <span class="font-weight-bold">
                                                            {{$gst}}%
                                                        </span>
                                                    </td>
                                                @else
                                                    <td class="py-1">
                                                        <span class="font-weight-bold">
                                                            {{$gst/2}}%
                                                        </span>
                                                    </td>
                                                    <td class="py-1">
                                                        <span class="font-weight-bold">
                                                            {{$gst/2}}%
                                                        </span>
                                                    </td>
                                                @endif
                                                

                                                <td class="py-1">
                                                    <span class="font-weight-bold">
                                                        @php($tax = (($price * $item->qty) * $item->tax)/100)
                                                        ₹{{number_format($tax, 2)}}
                                                    </span>
                                                </td>

                                                <td class="py-1">
                                                    <span class="font-weight-bold">
                                                        @php($net_amt = ($price*$item->qty) + $tax)
                                                        ₹{{number_format($net_amt, 2)}}
                                                    </span>
                                                </td>
                                            </tr>
                                            @php($sub += $net_amt)
                                        @endforeach
                                    </tbody>
                                </table>
    
                                <div class="card-body invoice-padding pb-0">
                                    <div class="row invoice-sales-total-wrapper">
                                        <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
                                            <p class="card-text mb-0">
                                                {{-- <span class="font-weight-bold">Salesperson:</span> <span class="ml-75">Alfie Solomons</span> --}}
                                            </p>
                                        </div>
                                        <div class="col-md-6 d-flex justify-content-end order-md-2 order-1">
                                            <div class="invoice-total-wrapper">
                                                <div class="invoice-total-item">
                                                    <p class="invoice-total-title">Subtotal:</p>
                                                    <p class="invoice-total-amount">
                                                        ₹{{number_format($sub, 2)}}
                                                    </p>
                                                </div>
                                                <hr class="my-50" />
                                                <div class="invoice-total-item">
                                                    <p class="invoice-total-title">Grand Total: </p>
                                                    <p class="invoice-total-amount">
                                                        ₹{{number_format(($sub), 2)}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Invoice Description ends -->
    
                                <hr class="invoice-spacing" />
    
                                <!-- Invoice Note starts -->
                                <div class="card-body invoice-padding pt-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="font-weight-bold"><sup>*</sup>Note:</span>
                                            <span>This is a computer generated invoice. No signature is required.</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Invoice Note ends -->
                            </div>
                        </div>
                        <!-- /Invoice -->                    
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('assets/js/scripts/pages/app-invoice-print.js') }}"></script>
    <!-- END: Page JS-->

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
</body>
<!-- END: Body-->
</html>
@endif