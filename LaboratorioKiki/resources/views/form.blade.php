<style>
   body {
    background-color: #f4f0ec;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
}

.form-container {
    max-width: 740px;
    margin: 60px auto;
    padding: 36px;
    background-color: #fffdfc;
    border-radius: 16px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.07);
}

.form-container h1 {
    font-size: 28px;
    margin-bottom: 30px;
    color: #5b3e1d;
    font-weight: bold;
    text-align: center;
    border-bottom: 2px solid #e0c3a0;
    padding-bottom: 12px;
}

.form-group {
    margin-bottom: 22px;
}

label {
    display: block;
    font-weight: 600;
    margin-bottom: 8px;
    color: #7c4a24;
    font-size: 15px;
}

input[type="text"],
input[type="date"],
select,
textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #e0c3a0;
    border-radius: 8px;
    font-size: 15px;
    background-color: #fff8f1;
    transition: border-color 0.2s ease, background-color 0.2s ease;
}

input:focus,
select:focus,
textarea:focus {
    border-color: #e76f51;
    outline: none;
    background-color: #ffffff;
}

textarea {
    resize: vertical;
}

.form-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 30px;
}

.submit-btn {
    background: linear-gradient(135deg, #f4a261, #e76f51);
    color: #ffffff;
    padding: 10px 24px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: bold;
    font-size: 15px;
    transition: all 0.3s ease-in-out;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.submit-btn:hover {
    background: linear-gradient(135deg, #e76f51, #f4a261);
    transform: translateY(-1px);
    box-shadow: 0 6px 14px rgba(0,0,0,0.12);
}

.btn-voltar {
    background-color: #fdf2e9;
    color: #a15c34;
    padding: 9px 20px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    transition: background-color 0.2s ease;
    border: 1px solid #f4a261;
}

.btn-voltar:hover {
    background-color: #fce8d5;
}

.error-message {
    margin-top: 6px;
    color: #c0392b;
    font-size: 14px;
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
            <select name="tipo" id="tipo" required>
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
            <input type="date" name="data_coleta" id="data_coleta" required>
            @error('data_coleta')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="laudo">Laudo (opcional)</label>
            <textarea name="laudo" id="laudo" maxlength="500" rows="4" placeholder="Descreva o resultado ou observações, se houver.">{{ old('laudo') }}</textarea>
        </div>

        <div class="form-actions">
            <a href="{{ route('exames.listarTodos') }}" class="btn-voltar">Voltar</a>
            <button type="submit" class="submit-btn">Salvar Exame</button>
        </div>
    </form>
</div>
