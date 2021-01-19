<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Other_study extends Model
{


    protected $fillable = [
        'title',
        'alumne_id',
    ];

    protected $table = 'other_studies_alumnes';

    public function alumne(){
      return $this->belongsTo('\App\Alumne');
    }
}
