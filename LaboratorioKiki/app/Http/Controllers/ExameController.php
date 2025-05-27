<?php

namespace App\Http\Controllers;

use App\Models\Exame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ExameController extends Controller
{
    public function index(){
        $exames = Exame::all();
        return view('index', compact('exames'));
    }

    public function store(Request $request){
        $request->validate([
            'paciente' => 'required|string|max:100',
            'tipo' => 'required',
            'data_coleta' => [
                'required',
                'date',
                'before_or_equal:today',
                function ($attribute, $value, $fail) {
                    $year = date('Y', strtotime($value));
                    if ($year < 1900 || $year > date('Y')) {  // Ajuste o limite inferior se quiser
                        $fail('O campo Data de Coleta deve ter um ano válido entre 1900 e o ano atual.');
                    }
                },
            ],
            'resultado_exame' => 'nullable|string',
        ], [
            'paciente.required' => 'O campo Paciente é obrigatório.',
            'paciente.max' => 'O campo Paciente deve ter no máximo 100 caracteres.',
            'tipo.required' => 'O Tipo do Exame é obrigatório.',
            'data_coleta.required' => 'O campo Data de Coleta é obrigatório.',
            'data_coleta.date' => 'O campo Data de Coleta deve ser uma data válida.',
            'data_coleta.before_or_equal' => 'A Data de Coleta não pode ser futura.',
        ]);

        $data = $request->all();

        $exame = Exame::create($data);

        $exames = Exame::all(); 

        return view('index', [
            'exames' => $exames,
            'success' => 'Exame cadastrado com sucesso!',
        ]);
    }
}
