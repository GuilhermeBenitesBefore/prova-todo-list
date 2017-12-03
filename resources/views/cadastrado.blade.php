@extends('principal')
@section('conteudo')
<h1>
    {{$toDo->titulo}}
    {{$toDo->descricao}}
    {{$toDo->vencimento}}
</h1>
    
@endsection
