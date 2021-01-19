<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey_empresa extends Model
{


    protected $fillable = [
        'Q1',
        'Q2_num',
        'Q2_text',
        'Q3_Coneixements',
        'Q3_Experience',
        'Q3_Soft_skills',
        'Q3_text',
        'Q4_num',
        'Q4_text',
        'Q5_num',
        'Q5_Si_text',
        'Q5_No_text',
        'Q6'
    ];

}
