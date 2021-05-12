<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    protected $fillable = [
        'name', 'user_id', 'address', 'city', 'description'
    ];

    public function appointments(){
        return $this->hasMany(Appointment::class);
    }

    public function employeeInformation(){
        return $this->hasMany(EmployeeInformation::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
