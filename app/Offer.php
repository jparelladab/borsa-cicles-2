<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{


    protected $fillable = [
        'empresa_id',
        'title',
        'description',
        'requirements',
        'jornada',
        'contract_type',
        'salary',
        'study_id',
    ];

    public function empresa(){
      return $this->belongsTo('\App\Empresa')->first();
    }

    //alumnes que han aplicat a questa oferta
    public function alumnes(){
      return $this->belongsToMany('App\Alumne');
    }

    public function study(){
        return $this->belongsTo('\App\Study')->first();
    }

}