<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ReportServices;
use Illuminate\Support\Facades\Session;
use Auth;

class ReportController extends Controller
{
    private $reportservices;

    function __construct(ReportServices $reportService)
    {
        $this->reportservices = $reportService;
    }

    /********************** USER REPORTS ********************* */
    public function MygenBon(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $all = false;

        if($request->isMethod('get'))
        {
            $all = true;
        }

        $list = $this->reportservices->genPerBonus($from, $to, $all,Auth::user()->id);

        //echo count($list);die;
        return view('user.reports', ['active' => 'my_gen_bonus_report','name' => 'Generation  Bonus Report', 'type' => 'my_gen_bonus', 'reports' => $list]);
    }
    public function bvReport(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $all = false;

        if($request->isMethod('get'))
        {
            $all = true;
        }

        $list = $this->reportservices->getBvReportByUser($from, $to, $all, Auth::user()->id);

        //echo count($list);die;
        return view('user.reports', ['active' => 'bv_report','name' => 'B.V Report', 'type' => 'bv_report', 'reports' => $list]);
    }
    public function monthlyIncentive(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $all = false;

        if($request->isMethod('get'))
        {
            $all = true;
        }

        $list = $this->reportservices->monthlyIncentive($from, $to, $all, Auth::user()->id);
        $activeDirector = $this->reportservices->activeDirectorBonus($from, $to, $all, Auth::user()->id);
        return view('user.reports', ['active' => 'bv_report','name' => 'Monthly Incentive', 'type' => 'monthly_incentive', 'reports' => $list, 'activeDirectors' => $activeDirector]);
    }

    /********************** ADMIN REPORTS ********************* */
    public function MygenPerBon(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $all = false;

        if($request->isMethod('get'))
        {
            $all = true;
        }

        $list = $this->reportservices->genPerBonus($from, $to, $all,Auth::user()->id);

        //echo count($list);die;
        return view('admin.reports', ['active' => 'my_gen_bonus_report','name' => 'Generation  Bonus Report', 'type' => 'my_gen_bonus', 'reports' => $list]);
    }

    public function adminBvReport(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $all = false;

        if($request->isMethod('get'))
        {
            $all = true;
        }

        $list = $this->reportservices->getBvReport($from, $to, $all);

        //echo count($list);die;
        return view('admin.reports', ['active' => 'bv_report','name' => 'B.V Report', 'type' => 'bv_report', 'reports' => $list]);
    }
    public function adminUserReport(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $all = false;

        if($request->isMethod('get'))
        {
            $all = true;
        }

        $list = $this->reportservices->adminUserReportIncentive($from, $to, $all, Auth::user()->id);
        $activeDirectors = $activeDirector = $this->reportservices->activeDirectorBonus($from, $to, $all, Auth::user()->id);;
        return view('admin.reports', ['active' => 'user_report','name' => 'User Report', 'type' => 'monthly_incentive', 'reports' => $list, 'activeDirectors' => $activeDirectors]);
    }

    public function adminOnlineSellReport(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $all = false;

        if($request->isMethod('get'))
        {
            $all = true;
        }

        $list = $this->reportservices->adminOnlineSellReport($from, $to, $all);

        //echo count($list);die;
        return view('admin.reports', ['active' => 'online_sell_report','name' => 'Online Sell Report', 'type' => 'online_sell_report', 'orders' => $list]);
    }

    public function adminBusinessCentreReport(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $all = false;

        if($request->isMethod('get'))
        {
            $all = true;
        }

        $list = $this->reportservices->adminBusinessCentreReport($from, $to, $all);

        //echo count($list);die;
        return view('admin.reports', ['active' => 'business_centre_sell_report','name' => 'Business Centre Sell Report', 'type' => 'business_centre_sell_report', 'orders' => $list]);
    }

    public function adminTotalSellReport(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $all = false;

        if($request->isMethod('get'))
        {
            $all = true;
        }

        $list = $this->reportservices->adminTotalSellReport($from, $to, $all);

        //echo count($list);die;
        return view('admin.reports', ['active' => 'total_sell_report','name' => 'Total Sell Report', 'type' => 'total_sell_report', 'orders' => $list]);
    }

    public function adminGstReport(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $all = false;

        if($request->isMethod('get'))
        {
            $all = true;
        }

        $list = $this->reportservices->adminGstReport($from, $to, $all);
        //echo count($list);die;
        return view('admin.reports', ['active' => 'gst_report','name' => 'GST Report', 'type' => 'gst_report', 'orders' => $list]);
    }

    public function adminTDSReport(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $all = false;

        if($request->isMethod('get'))
        {
            $all = true;
        }

        $list = $this->reportservices->adminTDSReport($from, $to, $all);
        //echo count($list);die;
        return view('admin.reports', ['active' => 'tds_report','name' => 'TDS Report', 'type' => 'tds_report', 'requests' => $list]);
    }

    public function adminTeamReportGEN(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $id = $request->id;
        $all = false;

        if($request->isMethod('get'))
        {
            $all = true;
            $id = Auth::user()->user_id;
        }

        $list = $this->reportservices->testReportGEN($from, $to, $all, $id);
        //echo count($list);die;
        return view('admin.reports', ['active' => 'team_report_gen','name' => 'Team Report GEN', 'type' => 'team_report_gen', 'orders' => $list]);
    }

    public function adminTeamReportORG(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $id = $request->id;
        $all = false;

        if($request->isMethod('get'))
        {
            $all = true;
            $id = Auth::user()->user_id;
        }

        $list1 = $this->reportservices->testReportORG1($from, $to, $all, $id);
        $list2 = $this->reportservices->testReportORG2($from, $to, $all, $id);
        //echo count($list);die;
        return view('admin.reports', ['active' => 'team_report_org','name' => 'Team Report ORG', 'type' => 'team_report_org', 'orders1' => $list1, 'orders2' => $list2]);
    }
}
