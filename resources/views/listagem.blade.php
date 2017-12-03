@extends('principal')
@section('conteudo')

<ul>
@foreach($toDos as $toDo)
  <li>
    <div class="postIt">
      <a href="Todo/delete/{{$toDo->id}}" class="excluir">X</a>
      <h2>{{$toDo->titulo}}</h2>
      <p>Lorem Ipsum </p>
    </div>
  </li>
@endforeach
</ul>
@endsection
    
