@extends('principal')

@section('conteudo')


<a href="/Todo/new" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Inserir novo Lembrete</a>
<div class="listaPost">
  <div class="linhaPostIt">
  @foreach($toDos as $toDo)
    <div class="itemPostIt">
      <div class="postIt">
        <a href="/Todo/delete/{{$toDo->id}}" class="topoDireito" data-toggle="tooltip" title="Excluir"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
        <a href="/Todo/edit/{{$toDo->id}}" class="topoDireito" data-toggle="tooltip" title="Editar"><i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i></a>
        <h6><u>{{$toDo->category->name}} - {{\Carbon\Carbon::parse($toDo->vencimento)->format('d/m/Y')}} </u></h6>
        <h2>{{$toDo->titulo}}</h2>
        <p>{{$toDo->descricao}}</p>
        
      </div>
    </div>
  @endforeach
  </div>
</div>

@if( $toDos->count() == 0 )
     <div class="alert alert-danger">
        <p>Não há mais nenhuma tarefa</p>
     </div>
@endif

@endsection
    
