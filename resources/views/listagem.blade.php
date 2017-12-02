@extends('principal')
@section('conteudo')
    @foreach($toDos as $toDo)


<div class="quote-container">
  <blockquote class="note yellow">
    <input type="text" class="form-control" id="tituloTodo" 
            name="tituloTodo" placeholder="Título" value="{{$toDo->titulo}}" >
    <textarea  style="overflow:hidden" class="form-control" rows="5" placeholder="Descrição">
    {{$toDo->descricao}}
    </textarea>
    <cite class="botaoLembrar">
    <div class="row">
      <div class="form-check">
      <label for="tituloTodo">Validade: </label>
      <label class="form-check-label" >
        <input type="checkbox" class="form-check-input">1 ano
        </label>
        <label class="form-check-label" >
        <input type="checkbox" class="form-check-input">1 mês
        </label>
        <label class="form-check-label" >
        <input type="checkbox" class="form-check-input">1 dia
        </label>
        <label class="form-check-label" >
        <input type="checkbox" class="form-check-input">1 Hora
      </label>
    </div>
    </div>  
    </cite>
  </blockquote>
    @endforeach

@endsection
    
