<?php

namespace abobakerMohsan\AuthTracker\Tests;

use abobakerMohsan\AuthTracker\Traits\AuthTracking;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class PassportUser extends Authenticatable
{
    use AuthTracking, HasApiTokens;

    protected $fillable = [
        'id', 'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
