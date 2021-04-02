<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeInformation extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function salon(){
        return $this->hasOne(Salon::class);
    }

    public function appointments(){
        return $this->hasMany(Appointment::class);
    }
}
