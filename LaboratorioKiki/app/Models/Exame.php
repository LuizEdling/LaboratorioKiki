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
    ];

    protected $table = 'registro_exame';

    // Accessor para compatibilidade com os campos antigos
    public function setPacienteAttribute($valor)
    {
        $this->attributes['paciente'] = $valor;
    }

    public function getPacienteAttribute()
    {
        return $this->attributes['paciente'] ?? null;
    }

    public function setTipoAttribute($valor)
    {
        $this->attributes['tipo'] = $valor;
    }

    public function getTipoAttribute()
    {
        return $this->attributes['tipo'] ?? null;
    }

    public function setDataColetaAttribute($valor)
    {
        $this->attributes['data_coleta'] = $valor;
    }

    public function getDataColetaAttribute()
    {
        return $this->attributes['data_coleta'] ?? null;
    }

    public function setLaudoAttribute($valor)
    {
        $this->attributes['laudo'] = $valor;
    }

    public function getLaudoAttribute()
    {
        return $this->attributes['laudo'] ?? null;
    }
}
