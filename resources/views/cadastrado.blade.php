@extends('principal')
@section('conteudo')
<h1>oi
    {{$toDo->titulo}}
    {{$toDo->descricao}}
    {{$toDo->vencimento}}
</h1>
    
@endsection
