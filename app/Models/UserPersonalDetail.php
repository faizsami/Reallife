<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPersonalDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_image',
        'sex',
        'dob',
        'alternate_mobile',
        'address',
        'city',
        'dist',
        'postal_code',
        'state',
        'country',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
