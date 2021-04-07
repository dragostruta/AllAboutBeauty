<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
   public function appointments(){
       return $this->hasMany(Appointment::class);
   }

   public function employeeInformation(){
       return $this->hasMany(EmployeeInformation::class);
   }
}
