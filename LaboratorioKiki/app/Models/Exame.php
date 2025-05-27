<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exame extends Model
{
    protected $fillable = [
        'paciente',
        'tipo',
        'data_coleta',
        'laudo',
        'resultado_exame',
    ];

    protected $table = 'exame';
}
