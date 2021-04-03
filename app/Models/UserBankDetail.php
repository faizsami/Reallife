<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBankDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'payee_name',
        'account_type',
        'bank_name',
        'ifsc_code',
        'branch_name',
        'account_number',
        'upi_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
