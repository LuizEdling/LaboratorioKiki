<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Exames Genéticos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            padding: 40px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .btn {
            background-color: #4f46e5;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 8px;
            display: inline-block;
            margin-bottom: 20px;
        }

        .btn:hover {
            background-color: #3730a3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #e5e7eb;
        }

        tr:hover {
            background-color: #f9fafb;
        }

        .empty-message {
            padding: 20px;
            background-color: #fef2f2;
            color: #991b1b;
            border: 1px solid #fca5a5;
            border-radius: 8px;
            text-align: center;
        }

        .alert-success {
            background-color: #d1e7dd;
            color: #0f5132;
            border: 1px solid #badbcc;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 16px;
            font-weight: 500;
        }
    </style>
</head>
<body>
    @if(!empty($success))
        <div class="alert-success">
            {{ $success }}
        </div>
    @endif
    <div class="container">
        <h1>Exames Cadastrados</h1>

        <a href="{{ route('exames.form') }}" class="btn">Cadastrar Novo Exame</a>

        @if(empty($exames))
            <div class="empty-message">
                Nenhum exame cadastrado até o momento.
            </div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Paciente</th>
                        <th>Tipo</th>
                        <th>Data de Coleta</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($exames as $exame)
                        <tr>
                            <td>{{ $exame->id }}</td>
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