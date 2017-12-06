@extends('layouts.app')
@section('content')
    <pagina>
        <painel titulo="Deletar" classe="panel-info">

            <formulario id="deleteTarefa" action="{{route('tarefas.destroy', $tarefa->id)}}" method="delete" enctype=""
                        token="{{csrf_token()}}">
                <mensagem classe="alert-danger">
                    <p>Deseja excluir a tarefa #{{$tarefa->id}}? </p>
                </mensagem>
                <div class="text-right">
                    <a href="{{route('tarefas.index')}}" class="btn btn-default">Cancelar</a>
                    <button form="deleteTarefa" class="btn btn-danger">Deletar</button>
                </div>
            </formulario>
        </painel>
    </pagina>
@endsection