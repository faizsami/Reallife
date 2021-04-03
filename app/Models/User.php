<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'sponser_id',
        'user_name',
        'user_mobile',
        'email',
        'password',
        'user_role',
        'is_active',
        'is_block',
        'joining_date',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function personal()
    {
        return $this->hasOne('App\Models\UserPersonalDetail');
    }

    public function kyc()
    {
        return $this->hasMany('App\Models\UserKycDetail');
    }

    public function bank()
    {
        return $this->hasOne('App\Models\UserBankDetail');
    }

    public function wallet()
    {
        return $this->hasOne('App\Models\Wallet');
    }

    public function transaction()
    {
        return $this->hasMany('App\Models\Transaction');
    }

    public function franchiseeTransaction()
    {
        return $this->hasMany('App\Models\FranchiseeTransaction');
    }

    public function fundRequests()
    {
        return $this->hasMany('App\Models\RequestFund');
    }

    public function withdrawalRequest()
    {
        return $this->hasMany('App\Models\WithdrawalRequest');
    }

    public function binary()
    {
        return $this->hasOne('App\Models\UserBinary');
    }

    public function master()
    {
        return $this->hasMany('App\Models\MasterBonus');
    }

    public function superMaster()
    {
        return $this->hasMany('App\Models\SuperMasterBonus');
    }

    public function leadership()
    {
        return $this->hasMany('App\Models\LeadershipBonus');
    }

    public function car()
    {
        return $this->hasMany('App\Models\CarFundBonus');
    }

    public function home()
    {
        return $this->hasMany('App\Models\HomeFundBonus');
    }

    public function cart()
    {
        return $this->hasMany('App\Models\Cart');
    }

    public function order()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function franchiseeOrder()
    {
        return $this->hasMany('App\Models\FranchiseeOrder');
    }

    public function theme()
    {
        return $this->hasOne('App\Models\ThemeSetting');
    }

    public function franchiseeRequest()
    {
        return $this->hasMany('App\Models\FranchiseeRequest');
    }

    public function product()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function notification()
    {
        return $this->hasMany('App\Models\Notification');
    }
    public function Generation()
    {
        return $this->hasOne('App\Models\UserGeneration');
    }
    public function Royal()
    {
        return $this->hasOne('App\Models\RoyalFundBonus');
    }

    public function userReward()
    {
        return $this->hasMany('App\Models\UserReward');
    }
    
}
