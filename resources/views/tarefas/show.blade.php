@extends('layouts.app')
@section('content')

    <pagina>

        <painel titulo="Detalhes da tarefa" classe="panel-info">

            <h4>{{$tarefa->titulo}}</h4>
            <p>Descrição: {{$tarefa->descricao}}</p>
            <p>Data Inicial: {{date('d/m/Y', strtotime($tarefa->data_inicio))}}</p>
            <p>Data Final: {{date('d/m/Y', strtotime($tarefa->data_fim))}}</p>
            <p>Categoria: {{$tarefa->categoria->descricao}}</p>


            <div class="text-right">
                <a href="{{route('tarefas.index')}}" class="btn btn-default">Voltar</a>
            </div>

        </painel>


    </pagina>

@endsection