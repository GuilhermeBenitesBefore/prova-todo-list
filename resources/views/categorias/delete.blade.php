@extends('layouts.app')
@section('content')
    <pagina>
        <painel titulo="Deletar" classe="panel-info">

            <formulario id="deleteCategoria" action="{{route('categorias.destroy', $categoria->id)}}" method="delete" enctype=""
                        token="{{csrf_token()}}">
                <mensagem classe="alert-danger">
                    <p>Deseja excluir a categoria #{{$categoria->id}}? </p>
                </mensagem>
                <div class="text-right">
                    <a href="{{route('categorias.index')}}" class="btn btn-default">Cancelar</a>
                    <button form="deleteCategoria" class="btn btn-danger">Deletar</button>
                </div>
            </formulario>
        </painel>
    </pagina>
@endsection