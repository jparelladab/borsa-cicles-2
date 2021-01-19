<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Study extends Model
{


    protected $fillable = [
        'title',
    ];

    public function alumnes(){
        return $this->belongsToMany('App\Alumne');
    }

    public function offers() {
        return $this->hasMany('App\Offer');
    }
}
