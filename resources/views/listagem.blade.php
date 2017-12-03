@extends('principal')
@section('conteudo')

<div class="listaPost">
  <div class="linhaPostIt">
  @foreach($toDos as $toDo)
    <div class="itemPostIt">
      <div class="postIt">
        <a href="Todo/delete/{{$toDo->id}}" class="excluir">X</a>
        <a href="Todo/edit/{{$toDo->id}}" class="excluir">Editar</a>
        <h2>{{$toDo->titulo}}</h2>
        <p>{{$toDo->descricao}}</p>
        <h5>{{$toDo->category->name}}</h5>
      </div>
    </div>
  @endforeach
  </div>
</div>

@endsection
    
