<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserPersonalDetail;
use App\Models\UserBankDetail;
use App\Models\UserKycDetail;
use App\Models\Wallet;
use App\Models\UserBinary;
use App\Models\ThemeSetting;
use App\Models\UserRank;
use App\Models\UserGeneration;
use App\Models\News;
use App\Models\Country;
use App\Models\AdminSetting;
use App\Models\State;

class AdminDetails extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
     
        //Admin
        $user = new User();
        $user->user_id='admin';
        $user->name='Admin';
        $user->password=Hash::make('12345678');
        $user->email='admin@adimn.com';
        $user->mobile='9897098970';
        $user->role='admin';

        //personal
        // $personal = new UserPersonalDetail();
        // $personal->profile_image = 'profile.png';
        // $personal->sex = '';
        // $personal->dob = date('d-m-y');
        // $personal->alternate_mobile = '';
        // $personal->address = '';
        // $personal->city = '';
        // $personal->dist = '';
        // $personal->postal_code = '';
        // $personal->state = '';
        // $personal->country = '';
        

        // //bank
        // $bank =  new UserBankDetail();
        // $bank->payee_name = '';
        // $bank->account_type = '';
        // $bank->bank_name = '';
        // $bank->ifsc_code = '';
        // $bank->branch_name = '';
        // $bank->account_number = '';
         

       

        // //Creating Wallet
        // $wallet = new Wallet();
        // $wallet->balance = 0;

        //theme
        $theme = new ThemeSetting();
        $theme->title = 'Theme';
        $theme->setting = 0; 

      

        $user->save();
        // $user->personal()->save($personal);
        // $user->bank()->save($bank);
        // $user->wallet()->save($wallet);
      
        // $user->theme()->save($theme);
     


  
      

        $data = array (
          0 => 
          array (
            'id' => 1,
            'name' => 'ANDHRA PRADESH',
            'created_at' => NULL,
            'updated_at' => NULL,
          ),
          1 => 
          array (
            'id' => 2,
            'name' => 'ASSAM',
            'created_at' => NULL,
            'updated_at' => NULL,
          ),
          2 => 
          array (
            'id' => 3,
            'name' => 'ARUNACHAL PRADESH',
            'created_at' => NULL,
            'updated_at' => NULL,
          ),
          3 => 
          array (
            'id' => 4,
            'name' => 'BIHAR',
            'created_at' => NULL,
            'updated_at' => NULL,
          ),
          4 => 
          array (
            'id' => 5,
            'name' => 'GUJRAT',
            'created_at' => NULL,
            'updated_at' => NULL,
          ),
          5 => 
          array (
            'id' => 6,
            'name' => 'HARYANA',
            'created_at' => NULL,
            'updated_at' => NULL,
          ),
          6 => 
          array (
            'id' => 7,
            'name' => 'HIMACHAL PRADESH',
            'created_at' => NULL,
            'updated_at' => NULL,
          ),
          7 => 
          array (
            'id' => 8,
            'name' => 'JAMMU & KASHMIR',
            'created_at' => NULL,
            'updated_at' => NULL,
          ),
          8 => 
          array (
            'id' => 9,
            'name' => 'KARNATAKA',
            'created_at' => NULL,
            'updated_at' => NULL,
          ),
          9 => 
          array (
            'id' => 10,
            'name' => 'KERALA',
            'created_at' => NULL,
            'updated_at' => NULL,
          ),
          10 => 
          array (
            'id' => 11,
            'name' => 'MADHYA PRADESH',
            'created_at' => NULL,
            'updated_at' => NULL,
          ),
          11 => 
          array (
            'id' => 12,
            'name' => 'MAHARASHTRA',
            'created_at' => NULL,
            'updated_at' => NULL,
          ),
          12 => 
          array (
            'id' => 13,
            'name' => 'MANIPUR',
            'created_at' => NULL,
            'updated_at' => NULL,
          ),
          13 => 
          array (
            'id' => 14,
            'name' => 'MEGHALAYA',
            'created_at' => NULL,
            'updated_at' => NULL,
          ),
          14 => 
          array (
            'id' => 15,
            'name' => 'MIZORAM',
            'created_at' => NULL,
            'updated_at' => NULL,
          ),
          15 => 
          array (
            'id' => 16,
            'name' => 'NAGALAND',
            'created_at' => NULL,
            'updated_at' => NULL,
          ),
          16 => 
          array (
            'id' => 17,
            'name' => 'ORISSA',
            'created_at' => NULL,
            'updated_at' => NULL,
          ),
          17 => 
          array (
            'id' => 18,
            'name' => 'PUNJAB',
            'created_at' => NULL,
            'updated_at' => NULL,
          ),
          18 => 
          array (
            'id' => 19,
            'name' => 'RAJASTHAN',
            'created_at' => NULL,
            'updated_at' => NULL,
          ),
          19 => 
          array (
            'id' => 20,
            'name' => 'SIKKIM',
            'created_at' => NULL,
            'updated_at' => NULL,
          ),
          20 => 
          array (
            'id' => 21,
            'name' => 'TAMIL NADU',
            'created_at' => NULL,
            'updated_at' => NULL,
          ),
          21 => 
          array (
            'id' => 22,
            'name' => 'TRIPURA',
            'created_at' => NULL,
            'updated_at' => NULL,
          ),
          22 => 
          array (
            'id' => 23,
            'name' => 'UTTAR PRADESH',
            'created_at' => NULL,
            'updated_at' => NULL,
          ),
          23 => 
          array (
            'id' => 24,
            'name' => 'WEST BENGAL',
            'created_at' => NULL,
            'updated_at' => NULL,
          ),
          24 => 
          array (
            'id' => 25,
            'name' => 'DELHI',
            'created_at' => NULL,
            'updated_at' => NULL,
          ),
          25 => 
          array (
            'id' => 26,
            'name' => 'GOA',
            'created_at' => NULL,
            'updated_at' => NULL,
          ),
          26 => 
          array (
            'id' => 27,
            'name' => 'PONDICHERY',
            'created_at' => NULL,
            'updated_at' => NULL,
          ),
          27 => 
          array (
            'id' => 28,
            'name' => 'LAKSHDWEEP',
            'created_at' => NULL,
            'updated_at' => NULL,
          ),
          28 => 
          array (
            'id' => 29,
            'name' => 'DAMAN & DIU',
            'created_at' => NULL,
            'updated_at' => NULL,
          ),
          29 => 
          array (
            'id' => 30,
            'name' => 'DADRA & NAGAR',
            'created_at' => NULL,
            'updated_at' => NULL,
          ),
          30 => 
          array (
            'id' => 31,
            'name' => 'CHANDIGARH',
            'created_at' => NULL,
            'updated_at' => NULL,
          ),
          31 => 
          array (
            'id' => 32,
            'name' => 'ANDAMAN & NICOBAR',
            'created_at' => NULL,
            'updated_at' => NULL,
          ),
          32 => 
          array (
            'id' => 33,
            'name' => 'UTTARANCHAL',
            'created_at' => NULL,
            'updated_at' => NULL,
          ),
          33 => 
          array (
            'id' => 34,
            'name' => 'JHARKHAND',
            'created_at' => NULL,
            'updated_at' => NULL,
          ),
          34 => 
          array (
            'id' => 35,
            'name' => 'CHATTISGARH',
            'created_at' => NULL,
            'updated_at' => NULL,
          ),
        );

        State::insert($data);

       

        // for($i = 0; $i < 5; $i++ )
        // {
        //   //user
        //   $user = new User();
        //   $user->user_id = $id[$i];
        //   $user->sponser_id = '0';
        //   $user->user_name = 'Employee';
        //   $user->country_code = '91';
        //   $user->user_mobile = '999 999 9999';
        //   $user->user_role = $role[$i];
        //   $user->email = 'employee'.$i.'@techinspire.in';
        //   $user->password = Hash::make('12345678');
        //   $user->save();
        //   //theme
        //   $theme = new ThemeSetting();
        //   $theme->title = 'Theme';
        //   $theme->setting = 0;
        //   $user->theme()->save($theme);
        // }
    }
}
