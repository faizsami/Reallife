<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Services\UserServices;

class RegistrationController extends Controller
{
    private $userservices;

    function __construct(UserServices $userservice)
    {
        $this->userservices = $userservice;
    }

    //Add user
    public function addUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'refferal_id' => 'required', 
            'name' => 'required', 
            'mobile' => 'required',
            'country_code' => 'required',
            'email' => 'required || string || email || max:255 || unique:users',
            ]);
        if ($validator->fails())
        {
           return back()->withErrors($validator);
        }
        else
        {
            $response = (object) $this->userservices->add_user($request);

            if($response->status == 1)
            {
                Session::put('success', $response->msg);
                return back();
            }
            else{
                Session::put('error', $response->msg);
                return back();
            }
        }
        
    }

    //Add user
    public function insideUserRegistration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'refferal_id' => 'required',
            'name' => 'required', 
            'mobile' => 'required',
            'country_code' => 'required',
            'email' => 'required || string || email || max:255 || unique:users',
            ]);
        if ($validator->fails())
        {
           return back()->withErrors($validator);
        }
        else
        {
            $response = (object) $this->userservices->insideAddUser($request);

            if($response->status == 1)
            {
                Session::put('success', $response->msg);
                return back();
            }
            else{
                Session::put('error', $response->msg);
                return back();
            }
        }
        
    }
}
