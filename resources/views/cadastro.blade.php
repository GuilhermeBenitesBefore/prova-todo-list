@extends('principal')
@section('conteudo')

<div class="alert alert-danger">
@foreach($errors->all() as $error)
  <ul>
    <li>{{$error}}</li>
  </ul>
  @endforeach
</div>

<form action="/Todo/cadastrado" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="quote-container">
    <blockquote class="note yellow">
      <input type="text" class="form-control" id="tituloTodo" name="titulo" placeholder="Título">
      <textarea  style="overflow:hidden" class="form-control" rows="5" name="descricao" placeholder="Descrição" ></textarea>
      <cite class="botaoLembrar">
        <div class="row">
          <div class="form-check">
            <label for="tituloTodo">Validade: </label>
            <label class="radio-inline"><input type="radio" value="2016-01-01 00:00:00'" name="vencimento">1 Mês</label>
            <label class="radio-inline"><input type="radio" value="2017-04-02 00:00:00'" name="vencimento">1 Semana</label>
            <label class="radio-inline"><input type="radio" value="2018-06-03 00:00:00'" name="vencimento">1 Dia</label>
            <label class="radio-inline"><input type="radio" value="2019-10-04 00:00:00'" name="vencimento">1 Hora</label>
          </div>
        </div>
        <div class="row">
          <button type="submit" class="btn btn-primary">Criar Tarefa</button>
        </div>
      </cite>
    </blockquote>
  </div>
</form>

@endsection