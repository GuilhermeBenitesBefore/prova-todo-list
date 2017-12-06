@extends('principal')
@section('conteudo')



<form action="/Todo/edit/{{$toDo->id}}" method="post" class="cadastrar">
  <input type="hidden" name="_token" value="{{ csrf_token()}}">
  <input type="hidden" name="id" value="{{$toDo->id}}">
  <div class="linhaPostIt">
    <div class="itemPostIt">
      <div class="postIt">
        <h2><input type="text" class="form-control" id="tituloTodo" name="titulo" placeholder="Título" value="{{$toDo->titulo}}"></h2>
        <p><textarea  style="overflow:hidden" class="form-control" rows="5" name="descricao" placeholder="Descrição" >{{$toDo->descricao}}</textarea></p>
          <select name="category_id" class="form-control">
          @foreach($categories as $category)

               @if( $toDo->category->id == $category->id )

                <option value="{{$category->id}}" selected>{{$category->name}}</option>

              @else

               <option value="{{$category->id}}">{{$category->name}}</option>    
               
              @endif
          @endforeach
        </select>
        <input class="form-control"  type="date" name="vencimento" value="{{$toDo->vencimento}}" >
           
         <div class="text-center">
          <button type="submit" class="btn btn-success">Salvar Tarefa</button>
        </div>
      
      </div>
    </div>
  </div>

</form>

@endsection