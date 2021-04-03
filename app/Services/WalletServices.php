<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserPersonalDetail;
use App\Models\UserBankDetail;
use App\Models\UserKycDetail;
use App\Models\Wallet;
use App\Models\RequestFund;
use App\Models\WithdrawalRequest;
use App\Models\Transaction;
use App\Models\AdminSetting;
use App\Services\UserServices;
use App\Services\NotificationServices;
use Auth;
use Carbon\Carbon;

class WalletServices
{
    private $userservices, $notificationservices;

    function __construct(UserServices $services, NotificationServices $notification)
    {
        $this->userservices = $services;
        $this->notificationservices = $notification;
    }

    //echoResponse
    public function echoResponse($status, $msg)
    {
        $response = [
            'status' => $status,
            'msg' => $msg,
        ];
        return $response;
    }

    //Fund request 
    public function request_funds($request)
    {
        //Check duplicate entry in a day or with pending status
        $user = Auth::user();
        if(RequestFund::where(['user_id' => $user->id, 'status' => 0])->whereDay('created_at', Carbon::now()->format('d'))->exists())
        {
            return false;
        }

        //requesting
        $request_fund = new RequestFund();
        $request_fund->transaction_id = $request->input('transaction_id'); 
        $request_fund->transaction_date = $request->input('transaction_date'); 
        $request_fund->amount    = $request->input('amount');
        $request_fund->status    = 0;

        if($user->fundRequests()->save($request_fund))
        {
            $user_id = user::where('user_id', 'admin')->get()->first()->id;
            $icon = '<i class="fas fa-hand-holding-usd"></i>';
            $msg = 'Fund Request';
            $des = 'Fund request by '.Auth::user()->user_name.' with transaction id '.$request_fund->transaction_id;
            $url = url('/admin/fund-requests');
            $this->notificationservices->addNotification($user_id, $icon, $msg, $des, $url);
            return true;
        }
        else
        {
            return false;
        }   
    }

    //Wallet balance
    public function getUserWalletBalance()
    {
        $user = Auth::user();
        $balance = $user->wallet->balance;
        return $balance;
    }

    public function getRewardBalance()
    {
        $user = Auth::user();
        $balance = $user->wallet->reward;
        return $balance;
    }

    //User Credited balance
    public function getUserCreditedBalance()
    {
        $user = Auth::user();
        $balance = $user->transaction()->where('type', 1)->get()->sum('amount');
        return $balance;
    }

    //User Debited balance
    public function getUserDebitedBalance()
    {
        $user = Auth::user();
        $balance = $user->transaction()->where('type', 0)->get()->sum('amount');
        return $balance;
    }

    //User Debited balance
    public function getUserTransactions()
    {
        $user = Auth::user();
        $transactions = $user->transaction;
        return $transactions;
    }

    //User Fund Requests
    public function getUserFundRequests()
    {
        $user = Auth::user();
        $fundRequests = $user->fundRequests;
        return $fundRequests;
    }

    //Get Fund Request
    public function getFundRequests()
    {
        $fundRequests = RequestFund::get()->all();
        return $fundRequests;
    }

    //User Fund Request Status change to failed
    public function fund_request_status_failed($id)
    {
        if(RequestFund::where('id', $id)->exists())
        {
            $request = RequestFund::where('id', $id)->get()->first();
            $request->status = 2;
            if($request->save())
            {
                $user_id = $user->id;
                $icon = '<i class="fas fa-wallet"></i>';
                $msg = 'Fund Request';
                $des = 'Dear '.$user->user_name.'.! admin reject your fund request with transaction id '.$request->transaction_id;
                $url = url('/user/wallet');
                $this->notificationservices->addNotification($user_id, $icon, $msg, $des, $url);
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    //Accept fund request : Admin
    public function acceptFundRequest($id)
    {
        $request = RequestFund::where('id', $id)->get()->first();
        $user = $request->user;

        //add transaction
        $transaction = new Transaction();
        $transaction->title = 'Money received by transaction id '.$request->transaction_id;
        $transaction->amount = $request->amount;
        $transaction->type = 1;

        //add money to wallet
        $wallet = $user->wallet;
        $wallet->balance = $wallet->balance + $request->amount;

        //request status as success
        $request->status = 1;

        //checkpoint success
        if($user->transaction()->save($transaction) && $wallet->save() && $request->save())
        {
            $user_id = $user->id;
            $icon = '<i class="fas fa-wallet"></i>';
            $msg = 'Fund Request';
            $des = 'Dear '.$user->user_name.'.! admin accept your fund request with transaction id '.$request->transaction_id;
            $url = url('/user/wallet');
            $this->notificationservices->addNotification($user_id, $icon, $msg, $des, $url);
            return true;
        }
        else
        {
            return false;
        }

    }

    //Fund request decline :admin
    public function declineFundRequest($id)
    {
        if(RequestFund::where('id', $id)->exists())
        {
            $request = RequestFund::where('id', $id)->get()->first();
            $request->status = 2;
            if($request->save())
            {
                $user = $request->user;
                $user_id = $user->id;
                $icon = '<i class="fas fa-wallet"></i>';
                $msg = 'Fund Request';
                $des = 'Dear '.$user->user_name.'.! admin declined you fund request with transaction id '.$request->transaction_id;
                $url = url('/user/wallet');
                $this->notificationservices->addNotification($user_id, $icon, $msg, $des, $url);
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }


    //withdrawal request
    public function withdrawalRequest($request)
    {
        //Check duplicate entry in a day or with pending status
        $user = Auth::user();
        if(WithdrawalRequest::where(['user_id' => $user->id, 'status' => 0])->exists())
        {
            return $this->echoResponse(0,'Oops.! could not submit withdrawal request. A request already exists with pending status.!');
        }

        //check for enough wallet balance
        if($user->wallet->balance < $request->input('amount'))
        {
            return $this->echoResponse(0,'Oops.! could not submit withdrawal request. You do not have enough balance in you wallet.!');
        }

        //check for minimum amount request -- amuont <= 500/-00
        if($request->input('amount') < 500)
        {
            return $this->echoResponse(0,'Oops.! could not submit withdrawal request. You can withdraw minimum 500.00!');
        }

        //uncomplete profile
        $response = (object) $this->userservices->is_profile_complete();
        if($response->status != 1)
        {
          return  $this->echoResponse(0, $response->msg.' Could not submit withdrawal request.');
        }

        //requesting
        $withdrawal = new WithdrawalRequest();
        $withdrawal->amount = $request->input('amount');
        $user->withdrawalRequest()->save($withdrawal);

        $user_id = user::where('user_id', 'admin')->get()->first()->id;
        $icon = '<i class="fas fa-wallet"></i>';
        $msg = 'Withdrawal Request';
        $des = 'Withdrawal request by '.Auth::user()->user_name.'.';
        $url = url('/admin/withdraw-requests');
        $this->notificationservices->addNotification($user_id, $icon, $msg, $des, $url);

        return $this->echoResponse(1,'Congratulations.! Your withdrawal request submit successfully.!');
    }

    //withdrawal request list
    public function withdrawalRequestListByUser()
    {
        $user = Auth::user();
        return $user->withdrawalRequest;
    }

    //withdrawal request list
    public function withdrawalRequestList()
    {
        $requests = WithdrawalRequest::get()->all();
        return $requests;
    }

    //Decline withdraw request
    public function withrawRequestAdminDecline($id)
    {
        //check exists
        if(!WithdrawalRequest::where('id', $id)->exists())
        {
            return $this->echoResponse(0, 'Oops.! Request not exists.!');
        }

        $request = WithdrawalRequest::where('id', $id)->get()->first();
        $request->status = 2;
        $request->save();

        $user_id = $request->user->id;
        $icon = '<i class="fas fa-wallet"></i>';
        $msg = 'Withdrawal Request';
        $des = 'Congratulations.! your withdrawal request declined by admin';
        $url = url('/user/withdraw');
        $this->notificationservices->addNotification($user_id, $icon, $msg, $des, $url);

        return $this->echoResponse(1, 'Withraw request declined successfully.!');
    }

    public function withrawRequestAdminAccept($id)
    {
        //check exists
        if(!WithdrawalRequest::where('id', $id)->exists())
        {
            return $this->echoResponse(0, 'Oops.! Request not exists.!');
        }
        
        $request = WithdrawalRequest::where('id', $id)->get()->first();
        $user = $request->user;
        
        //check for enough wallet balance
        if($user->wallet->balance < $request->amount)
        {
            return $this->echoResponse(0,'Oops.! could not accept withdrawal request. You do not have enough balance in you wallet.!');
        }

        //check for minimum amount request -- amuont <= 500/-00
        if($request->amount < 500)
        {
            return $this->echoResponse(0,'Oops.! could not accept withdrawal request. You can withdraw minimum INR 500.00!');
        }

        $amount_payble = $request->amount;

        //managing transaction history
        $transaction = new Transaction();
        $transaction->title = 'Withdraw request';
        $transaction->amount = $amount_payble;
        $transaction->type= 0;
        $user->transaction()->save($transaction);        

        //manupulating wallet balance
        $wallet = $user->wallet;
        $wallet->balance -= $amount_payble;
        $user->wallet()->save($wallet);

        $request->status = 1;
        $request->save();

        $user_id = $user->id;
        $icon = '<i class="fas fa-wallet"></i>';
        $msg = 'Withdrawal Request';
        $des = 'Dear '.$user->user_name.'.! admin accept your withdrawal request.';
        $url = url('/user/withdraw');
        $this->notificationservices->addNotification($user_id, $icon, $msg, $des, $url);

        return $this->echoResponse(1, 'Withraw request accept successfully.!');
    }


    public function withdrawalRequestDelete($id)
    {
        if(!WithdrawalRequest::where('id', $id)->exists())
        {
            return $this->echoResponse(0, 'Oops.! request does not exists.!');
        }

        $request = WithdrawalRequest::where('id', $id)->get()->first();
        if($request->status == 0)
        {
            $request->delete();
            return $this->echoResponse(1, 'Congratulations.! request delete successfully.');
        }
        else
        {
            return $this->echoResponse(0, 'Oops.! request could not be delete.');
        }
        
    }
}