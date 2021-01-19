<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey_alumne extends Model
{



    protected $fillable = [
        'Q1_num',
        'Q1_text' ,
        'Q2_num',
        'Q2_text',
        'Q3_num',
        'Q3_text',
        'Q4_num',
        'Q4_text',
        'Q5'
    ];
}
