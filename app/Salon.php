<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{
    public function appointments(){
        return $this->belongsToMany(Appointment::class);
    }

    public function employeeInformation(){
        return $this->belongsToMany(EmployeeInformation::class);
    }
}
