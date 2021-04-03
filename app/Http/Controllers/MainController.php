<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserServices;
use Auth;
class MainController extends Controller
{
    private $userservices;

    function __construct(UserServices $userservice)
    {
        $this->userservices = $userservice;
    }

    //index
    public function index()
    {
        $is_profile = $this->userservices->is_personal_details_complete();
        $is_kyc = $this->userservices->is_kyc_details_complete();
        $is_bank = $this->userservices->is_bank_details_complete();
        $if_complete = (object) $this->userservices->is_profile_complete();
        return view('admin.dashboard', ['active' => 'dashboard', 'is_profile' => $is_profile, 'is_kyc' => $is_kyc,'is_bank' => $is_bank, 'if_complete' => $if_complete]);
    }

    //change theme
    public function changetheme()
    {
        $user = Auth::user();
        $setting = Auth::user()->theme->setting;
        $theme = Auth::user()->theme;
        if($setting == 1)
        {
            $theme->setting = 0;
        }
        else
        {
            $theme->setting = 1;
        }

        $user->theme()->save($theme);
        return back();
    }
}
