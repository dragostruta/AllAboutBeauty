<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'name', 'salon_id', 'description', 'rating'
    ];

    public function salon(){
        return $this->belongsTo(Salon::class);
    }
}
