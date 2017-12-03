<?php
namespace TodoList\Http\Controllers;

use TodoList\Todo;
use Request;
use Validador;
use TodoList\Category;
use Illuminate\Support\Facades\DB;
use TodoList\Http\Requests\ToDoRequest;

class ToDoController extends Controller {
    
    public function getAll(){
        $todos = Todo::All();
        return view('listagem')->with('toDos',$todos);
    }

    public function getById($id){
        //
    }

    public function delete($id){
        $toDo = Todo::find($id);
        $toDo->delete();
        return redirect('/Todo');
    }


    public function postToDo(ToDoRequest $request){
       Todo::create($request->all());        
       return redirect('/Todo');
    }

    public function newTodo(){
        return view('cadastro')->with('categories', Category::all());
    }

    public function put($id){
        $toDo = Todo::find($id); 
        return view('editar')->with(['toDo'=> $toDo,'categories'=>  Category::all()]);
    }

    public function putSave(ToDoRequest $request, $id){
        $toDo = Todo::find($id); 
        $toDoUpdated = $request->all();
        $toDo->update(  $toDoUpdated);
          
        return redirect('/Todo');
    }
}