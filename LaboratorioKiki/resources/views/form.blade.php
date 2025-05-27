<style>
    .form-container {
        max-width: 700px;
        margin: 50px auto;
        padding: 30px;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        font-family: Arial, sans-serif;
    }

    .form-container h1 {
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 6px;
        color: #555;
    }

    input[type="text"],
    input[type="date"],
    select,
    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
        box-sizing: border-box;
    }

    textarea {
        resize: vertical;
    }

    .form-actions {
        text-align: right;
    }

    .submit-btn {
        background-color: #4a69bd;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .submit-btn:hover {
        background-color: #3b55a0;
    }

    .btn-voltar {
        display: inline-block;
        padding: 8px 16px;
        background-color: #ccc;
        color: #333;
        text-decoration: none;
        border-radius: 4px;
        font-weight: 600;
        transition: background-color 0.2s ease;
    }

    .btn-voltar:hover {
        background-color: #999;
        color: white;
    }
</style>

<div class="form-container">
    <h1>Cadastrar Exame Genético</h1>

    <form action="{{ route('exames.store') }}" method="POST" onsubmit="this.querySelector('button[type=submit]').disabled = true;">
        @csrf

        <div class="form-group">
            <label for="paciente">Nome do Paciente *</label>
            <input type="text" name="paciente" value="{{ old('paciente') }}" maxlength="100" placeholder="Digite o nome do paciente" required>
            @error('paciente')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="tipo">Tipo de Exame *</label>
            <select name="tipo" id="tipo">
                <option value="">Selecione...</option>
                <option value="Sequenciamento">Sequenciamento</option>
                <option value="PCR">PCR</option>
                <option value="Microarray">Microarray</option>
            </select>
             @error('tipo')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="data_coleta">Data de Coleta *</label>
            <input type="date" name="data_coleta" id="data_coleta">
            @error('data_coleta')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="laudo">Laudo (opcional)</label>
            <textarea name="laudo" id="laudo" maxlength="500" rows="4"></textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="submit-btn">Salvar Exame</button>
        </div>
    </form>

    <div class="form-actions">
        <a href="{{ route('exames.index') }}" class="btn-voltar">Voltar</a>
    </div>
</div>