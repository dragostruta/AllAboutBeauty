<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeInformation extends Model
{
    protected $fillable = [
        'user_id', 'salon_id', 'address', 'city', 'phone_number'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function salon(){
        return $this->belongsTo(Salon::class);
    }

    public function appointments(){
        return $this->belongsToMany(Appointment::class);
    }

    public function services(){
        return $this->belongsToMany(Service::class);
    }
}
