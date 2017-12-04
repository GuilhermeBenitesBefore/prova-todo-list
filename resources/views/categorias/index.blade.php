@extends('layouts.app')

@section('content')
    <pagina>
        @if(session('message'))
            <mensagem classe="alert-success">
                {{session('message')}}
            </mensagem>
        @endif
        <painel titulo="Categorias" class="panel-primary">

            <listagem
                    v-bind:titulos="['Id','Descrição']"
                    v-bind:itens="{{json_encode($listaCategorias)}}"
                    detalhe="/todo/categorias/" novo="{{route('categorias.create')}}" editar="/todo/categorias/" deletar="/todo/categorias/delete/"
                    token="{{csrf_token()}}"
            ></listagem>

            <div align="center">
                {{$listaCategorias}}
            </div>

        </painel>
    </pagina>
@endsection