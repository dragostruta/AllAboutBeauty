<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalonRequests extends Model
{
    protected $fillable = [
        'name', 'address', 'city', 'description', 'phone_number', 'email'
    ];

    protected $hidden = [
        'approved', 'status',
    ];
}
