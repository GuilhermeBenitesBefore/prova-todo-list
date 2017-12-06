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


        <painel titulo="Editar Categoria" classe="panel-info">
            <formulario id="editCategoria" action="{{route('categorias.update', $categoria->id)}}" method="put"
                        enctype=""
                        token="{{csrf_token()}}">

                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao"
                           value="{{$categoria->descricao}}"
                           placeholder="Descrição">
                </div>

                <div class="text-right">
                    <a href="{{route('categorias.index')}}" class="btn btn-default">Cancelar</a>
                    <button form="editCategoria" class="btn btn-success">Editar Categoria</button>
                </div>

            </formulario>
        </painel>
    </pagina>

@endsection