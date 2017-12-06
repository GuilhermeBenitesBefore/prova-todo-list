@extends('layouts.app')

@section('content')

    <pagina>
        @if($errors->all())
            <mensagem classe="alert-danger">
                @foreach($errors->all() as $key => $value)
                    <li><strong>{{$value}}</strong></li>
                @endforeach
            </mensagem>
        @endif

        <painel titulo="Nova Tarefa" classe="panel-info">
            <formulario id="createTarefa" action="{{route('tarefas.store')}}" method="post" enctype=""
                        token="{{csrf_token()}}">

                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="{{old('titulo')}}"
                           placeholder="Título">
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao">{{old('descricao')}}</textarea>
                </div>

                <div class="form-group">
                    <label for="data_inicio">Data</label>
                    <input type="date" class="form-control" id="data_inicio" name="data_inicio"
                           value="{{old('data_inicio')}}">
                </div>

                <div class="form-group">
                    <label for="data_fim">Data</label>
                    <input type="date" class="form-control" id="data_fim" name="data_fim"
                           value="{{old('data_fim')}}">
                </div>

                <div class="form-group">
                    <label for="categoria_id">Categoria</label>
                    <select id="categoria_id" name="categoria_id" class="form-control">
                        @foreach($categorias as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->descricao}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="text-right">
                    <a href="{{route('tarefas.index')}}" class="btn btn-default">Cancelar</a>
                    <button form="createTarefa" class="btn btn-success">Adicionar Tarefa</button>
                </div>

            </formulario>
        </painel>
    </pagina>

@endsection