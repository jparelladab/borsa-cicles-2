<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{


    protected $fillable = [
        'name',
        'user_id'
    ];

    public function user(){
      return $this->belongsTo('App\User')->first();
    }
}
