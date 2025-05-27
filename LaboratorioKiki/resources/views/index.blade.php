<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Exames Genéticos Registrados</title>
    <style>
       body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f0ec;
            padding: 40px;
            margin: 0;
        }

        .wrapper {
            max-width: 920px;
            margin: 0 auto;
            background-color: #fffdfc;
            padding: 35px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.07);
        }

        h1 {
            color: #5b3e1d;
            font-size: 30px;
            margin-bottom: 24px;
            border-bottom: 2px solid #e0c3a0;
            padding-bottom: 10px;
        }

        .btn-action {
            background: linear-gradient(135deg, #f4a261, #e76f51);
            color: #ffffff;
            padding: 10px 24px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            border: none;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transition: all 0.3s ease-in-out;
        }

        .btn-action:hover {
            background: linear-gradient(135deg, #e76f51, #f4a261);
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(0,0,0,0.12);
        }

        .success-message {
            background-color: #e3fcec;
            border: 1px solid #95e3b4;
            color: #276749;
            padding: 14px 18px;
            border-radius: 8px;
            font-size: 15px;
            margin-bottom: 20px;
            font-weight: 500;
        }

        .no-results {
            background-color: #fef6e4;
            color: #b45309;
            border: 1px solid #fcd34d;
            padding: 20px;
            text-align: center;
            border-radius: 8px;
            font-size: 16px;
            margin-top: 20px;
            font-weight: 500;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 16px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        th {
            background-color: #fef3c7;
            color: #78350f;
            font-weight: bold;
            font-size: 15px;
        }

        tr:nth-child(even) {
            background-color: #fffaf0;
        }

        tr:hover {
            background-color: #fdf6e3;
        }

    </style>
</head>
<body>
    <div class="wrapper">
        @if(!empty(session('success')))
            <div class="success-message">
               <?php echo session('success') ?> 
            </div>
        @endif

        <h1>Exames Registrados</h1>

        <a href="{{ route('exames.form') }}" class="btn-action">Cadastrar Novo Exame</a>

        @if(empty($listaExames))
            <div class="no-results">
                Nenhum exame cadastrado até o momento.
            </div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Paciente</th>
                        <th>Tipo</th>
                        <th>Data de Coleta</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listaExames as $exame)
                        <tr>
                            <td>{{ $exame->exame_id }}</td>
                            <td>{{ $exame->paciente }}</td>
                            <td>{{ $exame->tipo }}</td>
                            <td>{{ \Carbon\Carbon::parse($exame->data_coleta)->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>
