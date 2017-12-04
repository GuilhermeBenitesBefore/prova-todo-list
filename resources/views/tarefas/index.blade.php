@extends('layouts.app')

@section('content')
    <pagina>
        @if(session('message'))
            <mensagem classe="alert-success">
                {{session('message')}}
            </mensagem>
        @endif
        <painel titulo="Tarefas" class="panel-primary">

            <listagem
                    v-bind:titulos="['Id','Titulo', 'Data Inicio', 'Data Fim']"
                    v-bind:itens="{{json_encode($listaTarefas)}}"
                    detalhe="/todo/tarefas/" novo="{{route('tarefas.create')}}" editar="/todo/tarefas/" deletar="/todo/tarefas/delete/"
                    token="{{csrf_token()}}"
            ></listagem>

            <div align="center">
                {{$listaTarefas}}
            </div>

        </painel>
    </pagina>
@endsection