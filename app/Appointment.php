<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function empolyeeInformation(){
        return $this->belongsTo(EmployeeInformation::class);
    }

    public function services(){
        return $this->hasMany(Service::class);
    }

    public function salon(){
        return $this->hasOne(Salon::class);
    }
}
