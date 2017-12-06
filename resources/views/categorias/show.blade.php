@extends('layouts.app')
@section('content')

    <pagina>

        <painel titulo="Detalhes da categoria" classe="panel-info">

            <p>Descrição: {{$categoria->descricao}}</p>

            <div class="text-right">
                <a href="{{route('categorias.index')}}" class="btn btn-default">Voltar</a>
            </div>

        </painel>


    </pagina>

@endsection