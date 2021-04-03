<?php

namespace App\Services;
use App\Models\User;
use App\Models\UserBinary;
use App\Models\MasterBonus;
use App\Models\SuperMasterBonus;
use App\Models\LeadershipBonus;
use App\Models\CarFundBonus;
use App\Models\HomeFundBonus;
use App\Models\Transaction;
use App\Models\CompanyBv;
use App\Models\Closing;
use App\Models\ClosingReport;
use App\Models\Order;
use App\Models\WithdrawalRequest;
use App\Models\Closingactivedirector;
use App\Models\GenerationPerformanceBonus;
use Carbon\Carbon;

class ReportServices
{
    //user bv report
    public function getBvReportByUser($from, $to, $all, $id)
    {
        $from = $from." 00:00:00";
        $to = $to." 23:59:59";
        $user = User::where('id', $id)->get()->first();
        $report = [];
        if($all == false)
        {
            $orders = $user->order()->whereBetween('created_at', [$from, $to])->get()->all();
            foreach($orders as $order)
            {
                $items = $order->items;
                $count = count($items);
                foreach($items as $item)
                {
                    $bv = $item->product->bv * $item->qty;
                    $temp = [
                        'date' => $order->created_at,
                        'order_id' => $order->order_id,
                        'item_name' => $item->product->name,
                        'qty' => $item->qty,
                        'bv' => $bv,
                    ];

                    $report[] =$temp;
                }
            }
            return $report;
        }
        else//default show current month bv only
        {
            $orders = $user->order()->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->get()->all();
            //echo count($orders);die;
            foreach($orders as $order)
            {
                $items = $order->items;
                $count = count($items);
                foreach($items as $item)
                {
                    $bv = $item->product->bv * $item->qty;
                    $temp = [
                        'date' => $order->created_at,
                        'order_id' => $order->order_id,
                        'item_name' => $item->product->name,
                        'qty' => $item->qty,
                        'bv' => $bv,
                    ];

                    $report[] =$temp;
                }
            }

            return $report;
        }

    }

    //monthlyIncentive
    public function monthlyIncentive($from, $to, $all, $id)
    {
        $from = $from." 00:00:00";
        $to = $to." 23:59:59";
        $user = User::where('id', $id)->get()->first();

        $report = [];
        if($all == false)
        {
            return $closingReports = ClosingReport::where('user_id', $id)->whereBetween('created_at', [$from, $to])->get()->all();
        }
        else//default show current month bv only
        {
            if(ClosingReport::where('user_id', $id)->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->exists())
            {
                $closing = ClosingReport::where('user_id', $id)->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->get()->all();
                return $closing;
            }
            else
            {
                return $report = [];
            }
        }

    }
    //GenerationPerformanceBonus
    public function genPerBonus($from, $to, $all, $id)
    {
       
        $from = $from." 00:00:00";
        $to = $to." 23:59:59";
        $user = User::where('id', $id)->get()->first();

        $report = [];
        if($all == false)
        {
            return $generationperformancebonus = GenerationPerformanceBonus::where('user_id', $id)->whereBetween('created_at', [$from, $to])->get()->all();
        }
        else//default show current month bv only
        {
            if(GenerationPerformanceBonus::where('user_id', $id)->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->exists())
            {
                $generationperformancebonus = GenerationPerformanceBonus::where('user_id', $id)->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->get()->all();
                return $generationperformancebonus;
            }
            else
            {
                return $report = [];
            }
        }

    }

    //active director bonus
    public function activeDirectorBonus($from, $to, $all, $id)
    {
        $from = $from." 00:00:00";
        $to = $to." 23:59:59";
        $user = User::where('id', $id)->get()->first();

        $report = [];
        if($all == false)
        {
            return $closingReports = Closingactivedirector::where('user_id', $id)->whereBetween('created_at', [$from, $to])->get()->all();
        }
        else//default show current month bv only
        {
            if(Closingactivedirector::where('user_id', $id)->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->exists())
            {
                $closing = Closingactivedirector::where('user_id', $id)->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->get()->all();
                return $closing;
            }
            else
            {
                return $report = [];
            }
        }
    }

    //user bv report
    public function getBvReport($from, $to, $all)
    {
        $from = $from." 00:00:00";
        $to = $to." 23:59:59";

        $report = [];
        if($all == false)
        {
            $orders = Order::whereBetween('created_at', [$from, $to])->get()->all();
            foreach($orders as $order)
            {
                $items = $order->items;
                $count = count($items);
                foreach($items as $item)
                {
                    $bv = $item->product->bv * $item->qty;
                    $temp = [
                        'date' => $order->created_at,
                        'order_id' => $order->order_id,
                        'user_id' => $order->user->user_id,
                        'user_name' => $order->user->user_name,
                        'item_name' => $item->product->name,
                        'qty' => $item->qty,
                        'bv' => $bv,
                    ];

                    $report[] =$temp;
                }
            }
            return $report;
        }
        else//default show current month bv only
        {
            $orders = Order::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->get()->all();
            foreach($orders as $order)
            {
                $items = $order->items;
                $count = count($items);
                foreach($items as $item)
                {
                    $bv = $item->product->bv * $item->qty;
                    $temp = [
                        'date' => $order->created_at,
                        'order_id' => $order->order_id,
                        'user_id' => $order->user->user_id,
                        'user_name' => $order->user->user_name,
                        'item_name' => $item->product->name,
                        'qty' => $item->qty,
                        'bv' => $bv,
                    ];

                    $report[] =$temp;
                }
            }

            return $report;
        }

    }

    //adminUserReportIncentive
    public function adminUserReportIncentive($from, $to, $all)
    {
        $from = $from." 00:00:00";
        $to = $to." 23:59:59";

        $report = [];
        if($all == false)
        {
            return $closingReports = ClosingReport::whereBetween('created_at', [$from, $to])->get()->all();
        }
        else//default show current month bv only
        {
            if(ClosingReport::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->exists())
            {
                $closing = ClosingReport::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->get()->all();
                return $closing;
            }
            else
            {
                return $report = [];
            }
        }

    }    

    //adminOnlineSellReport
    public function adminOnlineSellReport($from, $to, $all)
    {
        $from = $from." 00:00:00";
        $to = $to." 23:59:59";

        $report = [];
        if($all == false)
        {
            $orders = Order::where('type', '0')->whereBetween('created_at', [$from, $to])->get()->all();
            return $orders;
        }
        else//default show current month bv only
        {
            if(Order::where('type', '0')->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->exists())
            {
                $orders = Order::where('type', '0')->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->get()->all();
                return $orders;
            }
            else
            {
                return $report;
            }
        }

    }

    //adminBusinessCentreReport
    public function adminBusinessCentreReport($from, $to, $all)
    { 
        $from = $from." 00:00:00";
        $to = $to." 23:59:59";

        $report = [];
        if($all == false)
        {
            //('type', '!=', '1' or'type', '!=', '0' or 'type', '!=', 'for local franchisee shopping')
            $orders = Order::where('payment_method', '=', 'Cash')->whereBetween('created_at', [$from, $to])->get()->all();
            return $orders;
        }
        else//default show current month bv only
        {
            if(Order::where('payment_method', '=', 'Cash')->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->exists())
            {
                $orders = Order::where('payment_method', '=', 'Cash')->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->get()->all();
                return $orders;
            }
            else
            {
                return $report;
            }
        }

    }

    //adminTotalSellReport
    public function adminTotalSellReport($from, $to, $all)
    {
        $from = $from." 00:00:00";
        $to = $to." 23:59:59";

        $report = [];
        if($all == false)
        {
            $orders = Order::whereBetween('created_at', [$from, $to])->get()->all();
            return $orders;
        }
        else//default show current month bv only
        {
            if(Order::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->exists())
            {
                $orders = Order::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->get()->all();
                return $orders;
            }
            else
            {
                return $report;
            }
        }

    }

    //adminGstReport
    public function adminGstReport($from, $to, $all)
    {
        
        $from = $from." 00:00:00";
        $to = $to." 23:59:59";

        $report = [];
        if($all == false)
        {
            $orders = Order::whereBetween('created_at', [$from, $to])->get()->all();
            foreach($orders as $order)
            {
                foreach($order->items as $item)
                {
                    $tax = (($item->price * $item->qty) * $item->tax/100);
                    $temp = [
                        'invoice' => 'IN'.$order->created_at->year.$order->created_at->month.$order->created_at->day.sprintf("%04d", $order->id),
                        'name' => $item->product->name,
                        'gstno' => $item->product->user->personal->gst,
                        'hsn' => $item->product->category->hsn,
                        'qty' => $item->qty,
                        'price' => $item->price,
                        'gst' => $item->tax,
                        'tax' => $tax,
                        'netAmount' => (($item->price * $item->qty) + $tax),
                        'user_name' => $item->product->user->user_name,
                        'user_state' => $item->product->user->personal->state,
                    ];
                    $report [] = $temp;
                }
            }
            return $report;
        }
        else//default show current month bv only
        {
            if(Order::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->exists())
            {
                $orders = Order::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->get()->all();
                foreach($orders as $order)
                {
                    foreach($order->items as $item)
                    {
                        $tax = (($item->price * $item->qty) * $item->tax/100);
                        $temp = [
                            'invoice' => 'IN'.$order->created_at->year.$order->created_at->month.$order->created_at->day.sprintf("%04d", $order->id),
                            'name' => $item->product->name,
                            'gstno' => $item->product->user->personal->gst,
                            'hsn' => $item->product->category->hsn,
                            'qty' => $item->qty,
                            'price' => $item->price,
                            'gst' => $item->tax,
                            'tax' => $tax,
                            'netAmount' => (($item->price * $item->qty) + $tax),
                            'user_name' => $item->product->user->user_name,
                            'user_state' => $item->product->user->personal->state,
                        ];
                        $report [] = $temp;
                    }
                }
                return $report;
            }
            else
            {
                return $report;
            }
        }

    }

    //adminTDSReport
    public function adminTDSReport($from, $to, $all)
    {
        $from = $from." 00:00:00";
        $to = $to." 23:59:59";

        $report = [];
        if($all == false)
        {
            $requests = WithdrawalRequest::where('status', 1)->whereBetween('created_at', [$from, $to])->get()->all();
            return $requests;
        }
        else//default show current month bv only
        {
            if(WithdrawalRequest::where('status', 1)->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->exists())
            {
                $requests = WithdrawalRequest::where('status', 1)->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->get()->all();
                return $requests;
            }
            else
            {
                return $report;
            }
        }

    }

    public function testReportGEN($from, $to, $all, $id)
    {
        $from = $from." 00:00:00";
        $to = $to." 23:59:59";

        $report = [];
        if($all == false)
        { 
            $data = [];
            $directs = User::where('sponser_id', $id)->whereBetween('created_at', [$from, $to])->get()->all();
            foreach($directs as $user)
            {
                $orders = $user->order;
                foreach($orders as $order)
                {
                    $items = $order->items;
                    foreach($items as $item)
                    {
                        $temp = [
                            'orderId' => $order->order_id,
                            'memberId' => $order->user->user_id,
                            'memberName' => $order->user->user_name,
                            'dp' => $item->price * $item->qty,
                            'bv' => $item->product->bv * $item->qty,
                            'date' => $order->created_at,
                        ];
                        $data [] = $temp;
                    }
                }
            }
            return $data;
        }
        else//default show current month bv only
        {
            if(User::where('sponser_id', $id)->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->exists())
            {
                $data = [];
                $directs = User::where('sponser_id', $id)->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->get()->all();
                foreach($directs as $user)
            {
                $orders = $user->order;
                foreach($orders as $order)
                {
                    $items = $order->items;
                    foreach($items as $item)
                    {
                        $temp = [
                            'orderId' => $order->order_id,
                            'memberId' => $order->user->user_id,
                            'memberName' => $order->user->user_name,
                            'dp' => $item->price * $item->qty,
                            'bv' => $item->product->bv * $item->qty,
                            'date' => $order->created_at,
                        ];
                        $data [] = $temp;
                    }
                }
            }
            return $data;
            }
            else
            {
                return $report;
            }
        }
    }

    public function testReportORG1($from, $to, $all, $id)
    {
        $from = $from." 00:00:00";
        $to = $to." 23:59:59";

        $report = [];
        if($all == false)
        { 
            $data = [];
            $direct = UserBinary::where(['placement_id' => $id, 'position' => 0])->get()->first();
            
            $orders = $direct->user->order()->whereBetween('created_at', [$from, $to])->get()->all();
            foreach($orders as $order)
            {
                $items = $order->items;
                foreach($items as $item)
                {
                    $temp = [
                        'orderId' => $order->order_id,
                        'memberId' => $order->user->user_id,
                        'memberName' => $order->user->user_name,
                        'dp' => $item->price * $item->qty,
                        'bv' => $item->product->bv * $item->qty,
                        'date' => $order->created_at,
                    ];
                    $data [] = $temp;
                }
            }
            return $data;
        }
        else//default show current month bv only
        {
            if(UserBinary::where(['placement_id' => $id, 'position' => 0])->exists())
            {
                $data = [];
                $direct = UserBinary::where(['placement_id' => $id, 'position' => 0])->get()->first();
                $orders = $direct->user->order;
                foreach($orders as $order)
                {
                    $items = $order->items;
                    foreach($items as $item)
                    {
                        $temp = [
                            'orderId' => $order->order_id,
                            'memberId' => $order->user->user_id,
                            'memberName' => $order->user->user_name,
                            'dp' => $item->price * $item->qty,
                            'bv' => $item->product->bv * $item->qty,
                            'date' => $order->created_at,
                        ];
                        $data [] = $temp;
                    }
                }
                return $data;
            }
            else
            {
                return $report;
            }
        }
    }

    public function testReportORG2($from, $to, $all, $id)
    {
        $from = $from." 00:00:00";
        $to = $to." 23:59:59";

        $report = [];
        if($all == false)
        { 
            $data = [];
            $direct = UserBinary::where(['placement_id' => $id, 'position' => 1])->get()->first();
            
            $orders = $direct->user->order()->whereBetween('created_at', [$from, $to])->get()->all();
            foreach($orders as $order)
            {
                $items = $order->items;
                foreach($items as $item)
                {
                    $temp = [
                        'orderId' => $order->order_id,
                        'memberId' => $order->user->user_id,
                        'memberName' => $order->user->user_name,
                        'dp' => $item->price * $item->qty,
                        'bv' => $item->product->bv * $item->qty,
                        'date' => $order->created_at,
                    ];
                    $data [] = $temp;
                }
            }
            return $data;
        }
        else//default show current month bv only
        {
            if(UserBinary::where(['placement_id' => $id, 'position' => 1])->exists())
            {
                $data = [];
                $direct = UserBinary::where(['placement_id' => $id, 'position' => 1])->get()->first();
                $orders = $direct->user->order;
                foreach($orders as $order)
                {
                    $items = $order->items;
                    foreach($items as $item)
                    {
                        $temp = [
                            'orderId' => $order->order_id,
                            'memberId' => $order->user->user_id,
                            'memberName' => $order->user->user_name,
                            'dp' => $item->price * $item->qty,
                            'bv' => $item->product->bv * $item->qty,
                            'date' => $order->created_at,
                        ];
                        $data [] = $temp;
                    }
                }
                return $data;
            }
            else
            {
                return $report;
            }
        }
    }
}