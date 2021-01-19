<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Offer;
use App\Alumne;

class Empresa extends Model
{


     protected $fillable = [
        'company_name',
        'website',
        'contact_person',
        'phone_number',
        'description',
        'pending_survey',
        'user_id',
    ];

    protected $table = 'empreses';

    public function user(){
      return $this->belongsTo('App\User')->first();
    }

    public function offers(){
      return $this->hasMany('\App\Offer');
    }

}
