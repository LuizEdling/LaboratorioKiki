<?php

namespace App\Http\Controllers;

use App\Models\Exame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RegistroExameController extends Controller
{
    public function listarTodos()
    {
        $listaExames = Exame::all();
        Log::debug($listaExames);
        return view('index', compact('listaExames'));
    }

    public function salvarNovo(Request $requisicao)
    {
        $requisicao->validate([
            'paciente' => 'required|string|max:100',
            'tipo' => 'required',
            'data_coleta' => [
                'required',
                'date',
                'before_or_equal:today',
                function ($atributo, $valor, $falha) {
                    $ano = date('Y', strtotime($valor));
                    if ($ano < 1900 || $ano > date('Y')) {
                        $falha('Informe um ano entre 1900 e o ano atual para a Data de Coleta.');
                    }
                },
            ],
        ], [
            'paciente.required' => 'Por favor, informe o nome do paciente.',
            'paciente.max' => 'O nome do paciente não pode ultrapassar 100 caracteres.',
            'tipo.required' => 'É necessário informar o tipo do exame.',
            'data_coleta.required' => 'Informe a data em que a coleta foi realizada.',
            'data_coleta.date' => 'A data de coleta precisa ser válida.',
            'data_coleta.before_or_equal' => 'A data de coleta não pode ser uma data futura.',
        ]);

        $dadosFormulario = $requisicao->all();
        
        $novoExame = Exame::create($dadosFormulario);

        $todosExames = Exame::all();

        return redirect()->route('exames.listarTodos')->with([
            'listaExames' => $todosExames,
            'success' => 'Exame registrado com sucesso!',
        ]);
    }
}
