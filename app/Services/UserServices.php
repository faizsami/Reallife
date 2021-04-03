<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserPersonalDetail;
use App\Models\UserBankDetail;
use App\Models\UserKycDetail;
use App\Models\Wallet;
use App\Services\DataStructure\BinaryStructure;
use App\Services\MailServices;
use App\Services\SendsmsServices;
use App\Models\UserBinary;
use App\Models\ThemeSetting;
use App\Services\DataStructure\GenerationStructure;
use App\Services\NotificationServices;
use Auth;

class UserServices
{

    private $binarystructures;
    private $mailservices;
    private $generationStructures;
    private $smsservices, $notificationservices;

    function __construct(BinaryStructure $binarystructure, MailServices $mail, SendsmsServices $sms, GenerationStructure $generationStructure, NotificationServices $notification)
    {
        $this->binarystructures = $binarystructure;
        $this->mailservices = $mail;
        $this->generationStructures = $generationStructure;
        $this->smsservices = $sms;
        $this->notificationservices = $notification;
    }

    function test()
    {
        $response = $this->smsservices->sendSMS('test', '9068157944');
        echo 'sdfsd';echo $response;die;

        $obj = json_decode($response);
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

    public function add_user($request)
    {       
        $pid=$request->pid;
            $password = rand(100000, 999999);
            $passwords = Hash::make($password);

            //user
            $user_ids = $this->generate_new_user_id();
            $user = new User();
            $user->user_id       = $user_ids;
            $user->sponser_id    = $request->input('refferal_id');
            $user->user_name     = $request->input('name');
            $user->country_code  = $request->input('country_code');
            $user->user_mobile   = $request->input('mobile');
            $user->email         = $request->input('email');
            $user->password      = $passwords;

            //personal
            $personal = new UserPersonalDetail();
            $personal->profile_image = 'profile.png';
            $personal->sex = '';
            $personal->dob = date('d-m-y');
            $personal->alternate_mobile = '';
            $personal->address = '';
            $personal->city = '';
            $personal->dist = '';
            $personal->postal_code = '';
            $personal->state = '';
            $personal->country = '';            

            //Bank
            $bank =  new UserBankDetail();
            $bank->payee_name = '';
            $bank->account_type = '';
            $bank->bank_name = '';
            $bank->ifsc_code = '';
            $bank->branch_name = '';
            $bank->account_number = '';
           

            //Creating Wallet
            $wallet = new Wallet();
            $wallet->balance = 0;

            //theme
            $theme = new ThemeSetting();
            $theme->title = 'Theme';
            $theme->setting = 0;            

            if($user->save() && $user->theme()->save($theme) && $user->personal()->save($personal)  && $user->bank()->save($bank) && $user->wallet()->save($wallet))
            {
                $this->binarystructures->Insert_Binary($user->sponser_id,$request->input('assign_customer'),$user->user_id,$user->id, $pid);
                $this->generationStructures->Insert_Generation($user->sponser_id,$user->user_id,$user->id);
                $this->mailservices->sendmail('New User Registration', $user->email, $user->user_name, $user->user_id, $password, 'mail.email');

                $msg = "Welcome to Regal Life India\nID ".$user_ids."\nPass ".$password."\nName ".substr($user->user_name, 0, 10)."\nSponsor Id ".$user->sponser_id."\nMy choice my passion to Grow Team RegalLifeIndia \nhttps://regallifeindia.com/";
                $response = $this->smsservices->sendSMS($msg, $user->user_mobile);
                $obj = json_decode($response);

                $user_id = user::where('user_id', $request->input('refferal_id'))->get()->first()->id;
                $icon = '<i class="fas fa-user-friends"></i>';
                $msg = 'New Team Member Registered.';
                $des = 'Congratulations.! '.$user->user_name.' registered with your refferal id.';
                if(Auth::user()->user_role=='admin')
                    $url = url('/admin/tree?id='.$user->user_id);
                else
                     $url = url('/user/tree?id='.$user->user_id);
                $this->notificationservices->addNotification($user_id, $icon, $msg, $des, $url);

                if($obj->status != 'OK')
                {                    
                    return $this->echoResponse(0, 'Oops.! message could not be send. Registration id is '.$user_ids.'. We have send an email with new member account information.');
                }
                $success = [
                    'status' => 1,
                    'msg' => 'Registration successfully. Registration id is '.$user_ids.'. We have send an email with new member account information. Please do not share account credentials with anyone.',
                ];


                return $success;
                    
            }
            else
            {
                $error = [
                    'status' => 0,
                    'msg' => 'Registration failed. Someting went wrong. Could not create user account.',
                ];
                return $error;
            }
    }

    public function insideAddUser($request)
    {       
            $password = '12345678';//rand(100000, 999999);
            $passwords = Hash::make($password);

            //user
            $user_ids = $this->generate_new_user_id();
            $user = new User();
            $user->user_id       = $user_ids;
            $user->sponser_id    = $request->input('refferal_id');
            $user->user_name     = $request->input('name');
            $user->country_code  = $request->input('country_code');
            $user->user_mobile   = $request->input('mobile');
            $user->email         = $request->input('email');
            $user->password      = $passwords;

            //personal
            $personal = new UserPersonalDetail();
            $personal->profile_image = 'profile.png';
            $personal->sex = '';
            $personal->dob = date('d-m-y');
            $personal->alternate_mobile = '';
            $personal->address = '';
            $personal->city = '';
            $personal->dist = '';
            $personal->postal_code = '';
            $personal->state = '';
            $personal->country = '';            

            //Bank
            $bank =  new UserBankDetail();
            $bank->payee_name = '';
            $bank->account_type = '';
            $bank->bank_name = '';
            $bank->ifsc_code = '';
            $bank->branch_name = '';
            $bank->account_number = '';
         

            //Creating Wallet
            $wallet = new Wallet();
            $wallet->balance = 0;

            //theme
            $theme = new ThemeSetting();
            $theme->title = 'Theme';
            $theme->setting = 0;            

            if($user->save() && $user->theme()->save($theme) && $user->personal()->save($personal)  && $user->bank()->save($bank) && $user->wallet()->save($wallet) && $user->franchiseeWallet()->save($fwallet))
            {
                $this->binarystructures->Insert_Binary($user->sponser_id,$request->input('assign_customer'),$user->user_id,$user->id);
                $this->generationStructures->Insert_Generation($user->sponser_id,$user->user_id,$user->id);
                $this->mailservices->sendmail('New User Registration', $user->email, $user->user_name, $user->user_id, $password, 'mail.email');
                $success = [
                    'status' => 1,
                    'msg' => 'Registration successfully. Registration id is '.$user_ids.'. We have send an email with new member account information. Please do not share account credentials with anyone.',
                ];

                $msg = "Welcome to SRVM ECOMM SERVICES\nID: ".$user_ids."\nPass: ".$password."\nName: ".$user->user_name."\nSponsor Id: ".$user->sponser_id." \nVisit: https://srvmecomm.com/";
                $response = $this->smsservices->sendSMS($msg, $user->user_mobile);
                $obj = json_decode($response);
                $sp = user::where('user_id', $request->input('refferal_id'))->get()->first();
                $user_id = $sp->id;
                $icon = '<i class="fas fa-user-friends"></i>';
                $msg = 'New Team Member Registered.';
                $des = 'Congratulations.! '.$user->user_name.' registered with your refferal id.';
                //check is admin
                if($sp->role == 'admin')
                    $url = url('/admin/dashboard');
                else
                    $url = url('/user/dashboard');
                    
                $this->notificationservices->addNotification($user_id, $icon, $msg, $des, $url);

                //check sms
                if($obj->status != 'OK')
                {                    
                    return $this->echoResponse(0, 'Oops.! message could not be send. Registration id is '.$user_ids.'. We have send an email with new member account information.');
                }

                return $this->echoResponse(1, 'Registration successfully. Registration id is '.$user_ids.'. We have send an email with new member account information. Please do not share account credentials with anyone.');
            }
            else
            {
                return $this->echoResponse(1, 'Registration failed. Someting went wrong. Could not create user account.');
            }
    }

    public function update_personal($request)
    {
        //checking uploading profile picture
        $profile_url = '';
        if($request->file('profile_image') != null)
        {
            $name = "";
            $file = $request->file('profile_image');

            $name = 'Profile_'.Auth::user()->user_id. '_techInspire.' . $file-> getClientOriginalExtension();
            if($file->move(public_path("uploads/profiles"), $name))
            {
                $profile_url = $name;
            }
            else
            {
                return false;
                die;
            }
        }
        else
        {
            $profile_url = Auth::user()->personal->profile_image;
        }
        
        $user = Auth::user()->personal;
        $user->profile_image = $profile_url;
        $user->sex = $request->input('gender');
        $user->dob = $request->input('dob');
        $user->alternate_mobile = $request->input('alternate_mobile');
        $user->address = $request->input('address');
        $user->city = $request->input('city');
        $user->dist = $request->input('dist');
        $user->postal_code = $request->input('postal_code');
        $user->state = $request->input('state');
        $user->country = $request->input('country');
        $user->nominee_name = $request->input('nominee_name');
        $user->nominee_mobile = $request->input('nominee_mobile');
        $user->nominee_relation = $request->input('nominee_relation');
        $user->gst = $request->input('gst');

        if($user->save())
        {
            $user = Auth::user();
            $user_id = $user->id;
            $icon = '<i class="fas fa-user-circle"></i>';
            $msg = 'Profile Updated';
            $des = 'Dear '.$user->user_name.' your profile is updated.';
            if($user->user_role=='admin')
            {
                $url = url('/admin/profile');
            }
            else
            {
                $url = url('/user/profile');
            }
            $this->notificationservices->addNotification($user_id, $icon, $msg, $des, $url);
            return true;
        }
        else
        {
            return false;
        }
    }

    public function update_bank($id, $request)
    {
        $user = User::where('id', $id)->get()->first()->bank;
        $user->payee_name       = $request->input('payee_name');
        $user->account_type     = $request->input('account_type');
        $user->bank_name        = $request->input('bank_name');
        $user->ifsc_code        = $request->input('ifsc_code');
        $user->account_number   = $request->input('account_number');
        $user->branch_name      = $request->input('branch_name');
       

        if($user->save())
        {
            $user = Auth::user();
            $user_id = $user->id;
            $icon = '<i class="fas fa-university"></i>';
            $msg = 'Bank Details Updated';
            $des = 'Dear '.$user->user_name.' your bank details is updated.';
            if($user->user_role=='admin')
            {
                $url = url('/admin/profile');
            }
            else
            {
                $url = url('/user/profile');
            }
            $this->notificationservices->addNotification($user_id, $icon, $msg, $des, $url);
            return true;
        }
        else
        {
            return false;
        }
    }

    public function update_kyc($request)
    {
        //uploading documents
        $front_image = "";
        $back_image  = "";

        $front_file  = $request->file('front_image');
        $back_file   = $request->file('back_image');

        $front_image = $request->input('document_type').'_'.Auth::user()->user_id. '_front.' . $front_file-> getClientOriginalExtension();
        $back_image  = $request->input('document_type').'_'.Auth::user()->user_id. '_back.' . $back_file-> getClientOriginalExtension();

        if($front_file->move(public_path("uploads/documents"), $front_image) && $back_file->move(public_path("uploads/documents"), $back_image))
        {
            $kyc = new UserKycDetail();
            $kyc->document_type = $request->input('document_type');
            $kyc->document_number = $request->input('document_number');
            $kyc->front_image = $front_image;
            $kyc->back_image = $back_image;
            $kyc->status = '0';

            $user = Auth::user();

            if($user->kyc()->save($kyc))
            {
                $user = Auth::user();
                $user_id = $user->id;
                $icon = '<i class="fas fa-file-upload"></i>';
                $msg = 'KYC Document Updated';
                $des = 'Dear '.$user->user_name.' your '.$kyc->document_type.' details is updated.';
                if($user->user_role=='admin')
                {
                    $url = url('/admin/profile');
                }
                else
                {
                    $url = url('/user/profile');
                }
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

    public function delete_kyc($id)
    {
        $kyc = Auth::user()->kyc->where('id', $id)->first();
        $front_image = $kyc->front_image;
        $back_image = $kyc->back_image;
        if($kyc->find($id)->delete() && unlink(public_path("uploads/documents/").$front_image) && unlink(public_path("uploads/documents/").$back_image))
        {
            $user = Auth::user();
            $user_id = $user->id;
            $icon = '<i class="fas fa-file-upload"></i>';
            $msg = 'KYC Document Updated';
            $des = 'Dear '.$user->user_name.' your '.$kyc->document_type.' details is deleted.';
            if($user->user_role=='admin')
            {
                $url = url('/admin/profile');
            }
            else
            {
                $url = url('/user/profile');
            }
            $this->notificationservices->addNotification($user_id, $icon, $msg, $des, $url);
            return true;
        }
        else
        {
            return false;
        }
    }

    public function change_password($request)
    {
        $current_password = Auth::user()->password;
        $new_password = $request->input('new_password');
        $cur_password = $request->input('password');

        if(!Hash::check($cur_password, $current_password))
        {
            return false;
        }
        else
        {
            $user = Auth::user();
            $user->password = Hash::make($new_password);
            if($user->save())
            {
                $user = Auth::user();
                $user_id = $user->id;
                $icon = '<i class="fas fa-unlock-alt"></i>';
                $msg = 'Password Updated';
                $des = 'Dear '.$user->user_name.' your password changed successfully.';
                if($user->user_role=='admin')
                {
                    $url = url('/admin/profile');
                }
                else
                {
                    $url = url('/user/profile');
                }
                $this->notificationservices->addNotification($user_id, $icon, $msg, $des, $url);
                return true;
            }
            else
            {
                return false;
            }
        }
    }


    public function userStatusChange($id, $status)
    {
        //check exists()
        if(!User::where('id', $id)->exists())
        {
            return $this->echoResponse(0, 'Oops.! member is not exists anymore.!');
        }

        $user = User::where('id', $id)->get()->first();
        $user->is_block = $status;
        $user->save();
        return $this->echoResponse(1, 'Status changed successfully.!');
    }

    public function getUserById($id)
    {
        //check exists()
        if(!User::where('id', $id)->exists())
        {
            return $this->echoResponse(0, 'Oops.! member is no longer exists.');
        }

        $user = User::where('id', $id)->get()->first();
        return $this->echoResponse(1, $user);
    }

    //update user admin side
    public function updateUserDetails($id, $request)
    {
        $user = User::where('id', $id)->get()->first();
        $user->user_name = $request->input('name');
        $user->email = $request->input('email');
        $user->user_mobile = $request->input('mobile');
        $user->save();

        return $this->echoResponse(1, 'Congratulations.! member details update successfully.!');
    }

    //updat user kyc status admin side
    public function updateUserKycDetails($kyc_id, $status)
    {
        $kyc = UserKycDetail::where('id', $kyc_id)->get()->first();
        $kyc->status = $status;
        $kyc->save();
        return $this->echoResponse(1, 'Wow.! kyc status changed successfully.!');
    }

    //updat user kyc by admin
    public function updateUserKycByAdmin($id, $request)
    {
        if(!UserKycDetail::where(['user_id' => $id, 'document_type' => $request->document_type])->exists())
            return $this->echoResponse(0, 'Oops.! something went wrong.');
            
        $kyc = UserKycDetail::where(['user_id' => $id, 'document_type' => $request->document_type])->get()->first();

        $user = User::where('id', $id)->get()->first();

        //uploading documents
        $front_image = "";
        $back_image  = "";

        $front_file  = $request->file('front_image');
        $back_file   = $request->file('back_image');

        $front_image = $request->input('document_type').'_'.$user->user_id. '_front.' . $front_file-> getClientOriginalExtension();
        $back_image  = $request->input('document_type').'_'.$user->user_id. '_back.' . $back_file-> getClientOriginalExtension();

        if($front_file->move(public_path("uploads/documents"), $front_image) && $back_file->move(public_path("uploads/documents"), $back_image))
        {
            $kyc->document_type = $request->document_type;
            $kyc->document_number = $request->document_number;
            $kyc->front_image = $front_image;
            $kyc->back_image = $back_image;
            $kyc->status = '1';
            $kyc->save();
    
            return $this->echoResponse(1, 'Wow.! kyc status changed successfully.!');
        }

        return $this->echoResponse(0, 'Oops.! something went wrong.');        
    }

    //pendingKyc
    public function pendingKyc()
    {
        return UserKycDetail::where('status', 0)->get()->all();
    }











    public function usersList()
    {
        return User::get()->all();
    }

    public function usersListDescId()
    {
        return User::orderBy('id','DESC')->get()->all();
    }



    public function is_profile_complete()
    {
        //check personal details
        if(!$this->is_personal_details_complete())
        {
            return $this->echoResponse(0, 'Oops.! Please complete your personal details.!');
        }

        //check bank details
        if(!$this->is_bank_details_complete())
        {
            return $this->echoResponse(0, 'Oops.! Please complete bank details.!');
        }

        //check kyc details
        if(!$this->is_kyc_details_complete())
        {
            return $this->echoResponse(0, 'Oops.! Please complete your kyc details.!');
        }

        return $this->echoResponse(1, 'Congratulations.! Your profile is up-to-date.!');
    }


    public function is_personal_details_complete()
    {
        $user = Auth::user()->personal->setHidden(['gst'])->toArray();
        if(in_array('', $user))
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function is_bank_details_complete()
    {
        $bank = Auth::user()->bank->setHidden(['up_id'])->toArray();
        if(in_array('', $bank))
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    public function is_kyc_details_complete()
    {   
        if($kycs = Auth::user()->kyc)
        {
            $check_point = 0;
            $aadhar_check = 0;
            $pan_check = 0;

            foreach($kycs as $kyc)
            {
                if($kyc->status != 1)
                {
                    return false;
                    die;
                }
                else
                {
                    if($kyc->document_type == "Aadhar Card")
                    {
                        $aadhar_check = 1;
                    }
                    if($kyc->document_type == "PAN Card")
                    {
                        $pan_check = 1;
                    }
                    $check_point = 1;
                }
            }

            if($check_point != 1)
            {
                return false;
            }
            else
            {
                if($aadhar_check == 1 && $pan_check == 1)
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }            
        }
        else
        {
            return false;
        }
    }

    public function if_kyc_both_doc()
    {
        $kycs = Auth::user()->kyc;
        $aadhar_check = 0;
        $pan_check = 0;
        foreach($kycs as $kyc)
        {
            if($kyc->document_type == "Aadhar Card")
            {
                $aadhar_check = 1;
            }
            if($kyc->document_type == "PAN Card")
            {
                $pan_check = 1;
            }
        }

        if($aadhar_check == 1 && $pan_check == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }






    public function get_user_by_user_id($id)
    {
        return User::where('user_id', $id)->get()->first();
    }

    public function get_user_by_id($id)
    {
        return User::where('id', $id)->get()->first();
    }

    public function if_exists_by_user_id($id)
    {
        if(User::where('user_id', $id)->exists())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function if_exists_by_id($id)
    {
        if(User::where('id', $id)->exists())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function generate_new_user_id()
    {
        $id = $this->gen_random_num();
        while(User::where('user_id', $id)->exists())
        {
            $id = $this->gen_random_num();
        }

        return $id;

    }

    public function gen_random_num()
    {        
        return 'RL'.rand(1000000000, 9999999999);
    }

    //add bv

    public function Addbv($request)
    {
        if(UserBinary::where('userid', $request->get('id'))->exists())
        {
            $b = UserBinary::where('userid', $request->get('id'))->get()->first();
            $sbv=$request->input('amount');
            $lb=$b->left_bv;
            $rb=$b->right_bv;
            
            if ($lb>$rb)
            {
            
                $rb=$rb+$sbv;
            }
            else if($lb<$rb)
            {
            
                $lb=$lb+$sbv;
            }
            else
            {
                $lb=$lb+$sbv/2;
                $rb=$rb+$sbv/2;
            }
            $b->self_bv = $b->self_bv + $request->input('amount');
            $b->left_bv = $lb;
            $b->right_bv = $rb;

            if($b->save())
            {
                $this->generationStructures->BvAdd($request->get('id'),$request->input('amount'));
                $this->binarystructures->bvCount($b->placement_id,$b->position,$request->input('amount'),$b->userid);
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

     public function addProductBV($user_id, $bv,$order_id)
    {
        if(UserBinary::where('userid', $user_id)->exists())
        {
            $b = UserBinary::where('userid', $user_id)->get()->first();
            $sbv=$bv;
            $lb=$b->left_bv;
            $rb=$b->right_bv;
            
            if ($lb>$rb)
            {
            
                $rb=$rb+$sbv;
            }
            else if($lb<$rb)
            {
            
                $lb=$lb+$sbv;
            }
            else
            {
                $lb=$lb+$sbv/2;
                $rb=$rb+$sbv/2;
            }
            $b->self_bv = $b->self_bv + $bv;
            $b->left_bv = $lb;
            $b->right_bv = $rb;

            if($b->save())
            {
                $this->generationStructures->BvAdd($b->userid,$bv,$order_id);
                $this->binarystructures->bvCount($b->placement_id,$b->position,$bv,$b->userid);
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
    //getUserWhere()
    public function getUserWhereAll($where, $condition)
    {
        return User::where($where, $condition)->get()->all();
    }

}