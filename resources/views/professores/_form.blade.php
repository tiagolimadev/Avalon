<!-- Include Mensagem Flash de Sessão -->
@include('flash-message')

<div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
    <label for="nome" class="col-md-4 control-label">Nome*</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control" name="nome" value="{{isset($professor) ? $professor->nome : old('nome') }}" required autofocus placeholder="Nome">
    </div>
</div>

<div class="form-group{{ $errors->has('matricula') ? ' has-error' : '' }}">
    <label for="matricula" class="col-md-4 control-label">Matrícula*</label>

    <div class="col-md-6">
        <input id="matricula" type="text" class="form-control" name="matricula" value="{{isset($professor) ? $professor->matricula : old('matricula') }}" required>
    </div>
</div>

<div class="form-group{{ $errors->has('data_nascimento') ? ' has-error' : '' }}">
    <label for="data_nascimento" class="col-md-4 control-label">Data de Nascimento*</label>

    <div class="col-md-6">
        <input id="data_nascimento" type="text" class="form-control" name="data_nascimento" value="{{isset($professor) ? $professor->data_nascimento->format('d/m/Y') : old('data_nascimento') }}" required>
    </div>

    <input type="hidden" name="user_id" value="{{ isset($professor) ? $professor->user_id : Auth::user()->id }}">
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">{{ isset($professor) ? 'Atualizar Professor' : 'Cadastrar Professor' }}</button>
    </div>
</div>