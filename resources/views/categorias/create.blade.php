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

        <painel titulo="Nova Categoria" classe="panel-info">
            <formulario id="createCategoria" action="{{route('categorias.store')}}" method="post" enctype=""
                        token="{{csrf_token()}}">

                <div class="form-group">
                    <label for="descricao">Categoria</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" value="{{old('descricao')}}"
                           placeholder="Categoria">
                </div>



                <div class="text-right">
                    <a href="{{route('categorias.index')}}" class="btn btn-default">Cancelar</a>
                    <button form="createCategoria" class="btn btn-success">Adicionar Categoria</button>
                </div>

            </formulario>
        </painel>
    </pagina>

@endsection