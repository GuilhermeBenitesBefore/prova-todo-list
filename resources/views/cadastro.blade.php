@extends('principal')
@section('conteudo')

<div class="alert alert-danger">
@foreach($errors->all() as $error)
  <ul>
    <li>{{$error}}</li>
  </ul>
  @endforeach
</div>

<form action="/Todo/cadastrado" method="post" class="cadastrar">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="linhaPostIt">
    <div class="itemPostIt">
      <div class="postIt">
        <h2><input type="text" class="form-control" id="tituloTodo" name="titulo" placeholder="Título"></h2>
        <p><textarea  style="overflow:hidden" class="form-control" rows="5" name="descricao" placeholder="Descrição" ></textarea></p>
          <select name="category_id" class="form-control">
          @foreach($categories as $category )
            <option  value="{{$category->id}}">{{$category->name}}</option>    
          @endforeach
        </select>
        <input class="form-control"  type="date" name="vencimento" >
         <div class="botaoLembrar">
          <button type="submit" class="btn btn-primary">Criar Tarefa</button>
        </div>
      
      </div>
    </div>
  </div>

</form>

@endsection