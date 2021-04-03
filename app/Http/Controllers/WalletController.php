<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Services\WalletServices;

class WalletController extends Controller
{
    private $walletservices;

    function __construct(WalletServices $walletservice)
    {
        $this->walletservices = $walletservice;
    }

    //Index
    public function index()
    {
        $balance = $this->walletservices->getUserWalletBalance();
        $reward = $this->walletservices->getRewardBalance();
        $creditedBalance = $this->walletservices->getUserCreditedBalance();
        $debitedBalance = $this->walletservices->getUserDebitedBalance();

        $transactions = $this->walletservices->getUserTransactions();
        $fundrequests = $this->walletservices->getUserFundRequests();
        return view('user.wallet', ['active' => ['finance', 'wallet'], 'balance' => $balance, 'reward' => $reward, 'creditedBalance' => $creditedBalance, 'debitedBalance' => $debitedBalance, 'transactions' => $transactions, 'fundrequests' => $fundrequests]);
    }

    //Index Admin
    public function indexAdmin()
    {
        $balance = $this->walletservices->getUserWalletBalance();
        $creditedBalance = $this->walletservices->getUserCreditedBalance();
        $debitedBalance = $this->walletservices->getUserDebitedBalance();

        $transactions = $this->walletservices->getUserTransactions();
        $fundrequests = $this->walletservices->getUserFundRequests();
        return view('admin.wallet', ['active' => ['profile', 'wallet'], 'balance' => $balance, 'creditedBalance' => $creditedBalance, 'debitedBalance' => $debitedBalance, 'transactions' => $transactions, 'fundrequests' => $fundrequests]);
    }

    //Request fund
    public function request_fund()
    {
        return view('user.request-fund', ['active' => ['profile', 'wallet']]);
    }

    //Request fund Request
    public function request_funds(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'transaction_id' => 'required',
            'transaction_date' => 'required',
            'amount' => 'required',
            ]);
        if ($validator->fails())
        {
           return back()->withErrors($validator);
        }
        else
        {
            if($this->walletservices->request_funds($request))
            {
                Session::put('success', 'Request send successfully.!');
                return back();
            }
            else
            {
                Session::put('error', 'Request send failed.!');
                return back();
            }
        }
    }

    //Fund Request Status failed
    public function fund_request_status_failed($id)
    {
        $status = $this->walletservices->fund_request_status_failed($id);
        if($status)
        {
            Session::put('success', 'Fund request status changed successfully.!');
            return back();
        }
        else
        {
            Session::put('error', 'Fund request status changed failed.!');
            return back();
        }
    }

    /************************* Fund Requests Admin ********************* */
    public function request_fund_admin()
    {
        $fundrequests = $this->walletservices->getFundRequests();
        return view('admin.fund-requests', ['active' => ['finance', 'fund-requests'], 'fundrequests' => $fundrequests]);
    }

    public function request_fund_admin_accept($id)
    {
        $checkpoint = $this->walletservices->acceptFundRequest($id);
        if($checkpoint)
        {
            Session::put('success', 'Fund request accepted');
            return back();
        }
        else
        {
            Session::put('error', 'Something went wrong.!');
            return back();
        }
    }

    public function request_fund_admin_decline($id)
    {
        $checkpoint = $this->walletservices->declineFundRequest($id);
        if($checkpoint)
        {
            Session::put('success', 'Fund request status changed.!');
            return back();
        }
        else
        {
            Session::put('error', 'Something went wrong.!');
            return back();
        }
    }


    //**************************** Withdrawal Request *************************** */
    public function withdrawalRequestIndex()
    {
        $list = $this->walletservices->withdrawalRequestListByUser();
        return view('user.withdrawal', ['active' => 'withdrawal', 'requests' => $list]);
    }

    public function withdrawalRequest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required',
            ]);
        if ($validator->fails())
        {
           return back()->withErrors($validator);
        }
        else
        {
            $response = (object) $this->walletservices->withdrawalRequest($request);
            if($response->status == 1)
            {
                Session::put('success', $response->msg);
                return back();
            }
            else
            {
                Session::put('error', $response->msg);
                return back();
            }
        }
    }

    public function withdrawalRequestDelete($id)
    {
        $response = (object) $this->walletservices->withdrawalRequestDelete($id);
        if($response->status == 1)
        {
            Session::put('success', $response->msg);
            return back();
        }
        else
        {
            Session::put('error', $response->msg);
            return back();
        }
    }

    //A  ###########        ADMIN SIDE WITHDRAW
    public function withdrawRequestsAdminIndex()
    {
        $list = $this->walletservices->withdrawalRequestList();
        return view('admin.withdraw-request', ['active' => ['finance', 'withdraw-requests'], 'requests' => $list]);
    }

    //declined request
    public function withrawRequestAdminDecline($id)
    {
        $response = (object) $this->walletservices->withrawRequestAdminDecline($id);
        if($response->status == 1)
        {
            Session::put('success', $response->msg);
            return back();
        }
        else
        {
            Session::put('error', $response->msg);
            return back();
        }
    }

    //Accept request
    public function withrawRequestAdminAccept($id)
    {
        $response = (object) $this->walletservices->withrawRequestAdminAccept($id);
        if($response->status == 1)
        {
            Session::put('success', $response->msg);
            return back();
        }
        else
        {
            Session::put('error', $response->msg);
            return back();
        }
    }
}
