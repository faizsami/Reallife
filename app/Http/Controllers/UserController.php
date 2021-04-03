<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
// use App\Services\UserServices;
// use App\Services\ReportServices;
// use App\Models\User;
// use App\Services\NotificationServices;
use Auth;
use Hash;

class UserController extends Controller
{
    // private $userservices, $reportservices,$notificationservices;

    // function __construct(UserServices $userservice, ReportServices $reportService, NotificationServices $notification)
    // {
    //     $this->userservices = $userservice;
    //     $this->reportservices = $reportService;
    //     $this->notificationservices = $notification;
    // }

    function test()
    {
        echo "yes";
        // echo $this->userservices->test(); echo 'we';
    }
    //index
    // public function index()
    // {
    //     $list = $this->reportservices->monthlyIncentive(0, 0, true, Auth::user()->id);
    //     $activeDirector = $this->reportservices->activeDirectorBonus(0, 0, true, Auth::user()->id);

    //     $is_profile = $this->userservices->is_personal_details_complete();
    //     $is_kyc = $this->userservices->is_kyc_details_complete();
    //     $is_bank = $this->userservices->is_bank_details_complete();
    //     $if_complete = (object) $this->userservices->is_profile_complete();
    //     return view('user.dashboard', ['active' => 'dashboard', 'is_profile' => $is_profile, 'is_kyc' => $is_kyc,'is_bank' => $is_bank, 'if_complete' => $if_complete, 'reports' => $list, 'activeDirectors' => $activeDirector]);
    // }

    // //My Profile
    // public function my_profile()
    // {
    //     return view('user.profile',['active' => ['profile', 'profile']]);
    // }

    // //USER: Edit My profile
    // public function edit_my_profile()
    // {
    //     $is_personal = $this->userservices->is_personal_details_complete() == true ? true : false;
    //     $is_kyc = $this->userservices->is_kyc_details_complete() == true ? true : false;
    //     $is_both_kyc_doc = $this->userservices->if_kyc_both_doc() == true ? true : false;
    //     $is_bank = $this->userservices->is_bank_details_complete() == true ? true : false;
    //     return view('user.edit-profile', ['is_personal' => $is_personal, 'is_kyc' => $is_kyc, 'is_both_doc' => $is_both_kyc_doc, 'is_bank' => $is_bank, 'active' => ['profile', 'edit']]);
    // }

    // //ADMIN: Edit My profile
    // public function Admin_edit_my_profile()
    // {
    //     $is_personal = $this->userservices->is_personal_details_complete() == true ? true : false;
    //     $is_kyc = $this->userservices->is_kyc_details_complete() == true ? true : false;
    //     $is_both_kyc_doc = $this->userservices->if_kyc_both_doc() == true ? true : false;
    //     $is_bank = $this->userservices->is_bank_details_complete() == true ? true : false;
    //     return view('admin.edit-profile', ['is_personal' => $is_personal, 'is_kyc' => $is_kyc, 'is_both_doc' => $is_both_kyc_doc, 'is_bank' => $is_bank, 'active' => ['profile', 'edit']]);
    // }

    // //Update User Details
    // public function update_personal(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'gender' => 'required',
    //         'dob' => 'required',
    //         'alternate_mobile' => 'required', 
    //         'address' => 'required', 
    //         'city' => 'required', 
    //         'dist' => 'required',
    //         'postal_code' => 'required',
    //         'state' => 'required',
    //         'country' => 'required',
    //         'nominee_name' => 'required',
    //         'nominee_mobile' => 'required',
    //         'nominee_relation' => 'required',
            
    //         'profile_image' => 'nullable|mimetypes:image/jpg,image/png,image/jpeg,image/webp|max:4096',
    //         ]);
    //     if ($validator->fails())
    //     { 
    //        return back()->withErrors($validator);
    //     }
    //     else
    //     {
    //         if($this->userservices->update_personal($request))
    //         {
    //             Session::put('success', 'Update successfully.');
    //             return back();
    //         }
    //         else{
    //             Session::put('error', 'Update failed.');
    //             return back();
    //         }
    //     }
    // }

    // //Update User Bank Details
    // public function update_bank(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'id' => 'required',
    //         'payee_name' => 'required',
    //         'account_type' => 'required',
    //         'bank_name' => 'required', 
    //         'ifsc_code' => 'required', 
    //         'account_number' => 'required', 
    //         'branch_name' => 'required',
            
    //         ]);
    //     if ($validator->fails())
    //     {   echo "validation error";die;
    //        return back()->withErrors($validator);
    //     }
    //     else
    //     {
    //         if($this->userservices->update_bank($request->id, $request))
    //         {
    //             Session::put('success', 'Update successfully.');
    //             return back();
    //         }
    //         else{
    //             Session::put('error', 'Update failed.');
    //             return back();
    //         }
    //     }
    // }
    // //update by admin
    // public function change_password_admin(Request $request, $id)
    // {
    //     //ifexists
    //     if(!User::where('id', $id)->exists())
    //         return back()->with('error', 'Oops.! something went wrong.');

    //     //validating reqests
    //     $validator = Validator::make($request->all(), [
    //         'new_password' => 'required || min:6 || max:20',
    //         'confirm_new_password' => 'required|same:new_password',
    //         ]);
    //     if ($validator->fails())
    //         return back()->withErrors($validator);
        
    //     $user = User::where('id', $id)->get()->first();
    //     $user->password = Hash::make($request->new_password);
    //     $user->save();

       

    //     //Notification
    //     $user_id = $user->id;
    //     $icon = '<i class="fas fa-lock"></i>';
    //     $msg = 'password Changed.';
    //     $des = 'Security Alert.! your password changed by admin.';
    //     $url = '/user/dashboard';
    //     $this->notificationservices->addNotification($user_id, $icon, $msg, $des, $url);

    //     return back()->with('success', 'Congratulations.! user password update successfully.');
    // }
    // //Update User kyc Details
    // public function update_kyc(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'document_type' => 'required',
    //         'document_number' => 'required',
    //         'front_image' => 'required|mimetypes:image/jpg,image/png,image/jpeg,image/webp|max:4096',
    //         'back_image' => 'required|mimetypes:image/jpg,image/png,image/jpeg,image/webp|max:4096',
    //         ]);
    //     if ($validator->fails())
    //     {
    //        return back()->withErrors($validator);
    //     }
    //     else
    //     {
    //         if($this->userservices->update_kyc($request))
    //         {
    //             Session::put('success', 'Update successfully.');
    //             return back();
    //         }
    //         else{
    //             Session::put('error', 'Update failed.');
    //             return back();
    //         }
    //     }
    // }

    // //Delete pending or failed kyc request
    // public function delete_kyc($id)
    // {
    //     if($this->userservices->delete_kyc($id))
    //     {
    //         Session::put('success', 'Delete successfully.');
    //         return back();
    //     }
    //     else{
    //         Session::put('error', 'Delete failed.');
    //         return back();
    //     }
    // }

    // //Update User Password -> view
    // public function change_password()
    // {
    //     return view('user.change-password');
    // }

    // //Update User Password -> Action
    // public function change_passwords(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'password' => 'required',
    //         'new_password' => ['required','min:6','max:20','different:password'],
    //         'confirm_new_password' => 'required|same:new_password',
    //         ]);
    //     if ($validator->fails())
    //     {
    //        return back()->withErrors($validator);
    //     }
    //     else
    //     {
    //         if($this->userservices->change_password($request))
    //         {
    //             return back()->with('success', 'Update successfully.');
    //         }
    //         else{
    //             return back()->with('error', 'Update failed.');
    //         }
    //     }
    // }

    // public function tree(Request $request)
    // {
    //     if($request->exists('id'))
    //     {
    //         $id = $request->get('id');
    //     }
    //     else
    //     {
    //         $id = Auth::user()->user_id;
    //     }
    //     return view('user.tree', ['users_id' => $id, 'active' => ['teamview', 'teamview']]);
    // }

    // public function directs(Request $request)
    // {
    //     if($request->exists('id'))
    //     {
    //         $id = $request->get('id');
    //     }
    //     else
    //     {
    //         $id = Auth::user()->user_id;
    //     }
    //     $directs = User::where('sponser_id', $id)->get()->all();
    //     return view('user.directs', ['active' => ['teamview', 'direct'], 'directs' => $directs]);
    // }
    
    //Adimin panel registration
    public function registration(Request $request)
    {
        return view('admin.registration',['active' => ['members', 'registration']]);
        // if($request->exists('id') && $request->exists('position'))
        // {
        //     $id = $request->get('id');
        //     $position = $request->get('position');
        // }
        // else
        // {
        //     $id = "";
        //     $position = 2;

        // }
        //     $position = $request->get('position');
        //     return view('admin.registration', ['active' => ['members', 'registration'], 'id' => $id, 'position' => $position]);
    }

    // //Adimin panel registration
    // public function registration_user_panel(Request $request)
    // {
    //     if($request->exists('id') && $request->exists('position'))
    //     {
    //         $id = $request->get('id');
    //         $position = $request->get('position');
    //     }
    //     else
    //     {
    //         $id = Auth::user()->user_id;
    //         $position = 2;

    //     }
    //         $position = $request->get('position');
    //         return view('user.registration', ['active' => 'registration', 'id' => $id, 'position' => $position]);
    // }



    // //add bv
    // public function addBV()
    // {
    //     return view('admin.add-bv', ['active' => 'bv']);
    // }
    // public function addBVuser()
    // {
    //     return view('user.add-bv', ['active' => 'bv']);
    // }

    // public function addBVs(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'id' => 'required',
    //         'amount' => 'required || digits_between:0,28',
    //         ]);
    //     if ($validator->fails())
    //     {
    //        return back()->withErrors($validator);
    //     }
    //     else
    //     {
    //         if($this->userservices->Addbv($request))
    //         {
    //             Session::put('success', 'Add successfully.!');
    //             return back();
    //         }
    //         else
    //         {
    //             Session::put('error', 'Add failed.!');
    //             return back();
    //         }
    //     }  
    // }
}
