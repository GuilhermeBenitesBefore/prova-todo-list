<?php
namespace TodoList\Http\Controllers;

use TodoList\Todo;
use Request;
use Validador;
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
}