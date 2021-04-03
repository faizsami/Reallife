<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserKycDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'aadhar_number',
        'pan_number',
        'pan_image',
        'aadhar_front_image',
        'aadhar_back_image',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
