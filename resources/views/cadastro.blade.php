@extends('principal')
@section('conteudo')

<form action="/Todo/cadastrado" method="post" class="cadastrar">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="linhaPostIt">
    <div class="itemPostIt">
      <div class="postIt">
        <h2><input type="text" class="form-control" id="tituloTodo" name="titulo" placeholder="Título"></h2>
        <p><textarea  style="overflow:hidden" class="form-control" rows="5" name="descricao" placeholder="Descrição" id="descricao" ></textarea></p>
          <select name="category_id" class="form-control">
          @foreach($categories as $category )
            <option  value="{{$category->id}}">{{$category->name}}</option>    
          @endforeach
        </select>
        
        <input class="form-control"  type="date" name="vencimento" >
        
         <div class="text-center">
          <button type="submit" class="btn btn-success ">Criar Tarefa</button>
        </div>
      
      </div>
    </div>
  </div>

</form>

@endsection