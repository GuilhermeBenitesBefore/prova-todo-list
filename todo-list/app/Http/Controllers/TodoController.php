<?php namespace App\Http\Controllers;

use App\Todo;
use App\Category;
use App\Http\Requests\TodoRequest;
use Request;

class TodoController extends Controller {
    public function all() {
        $todos = Todo::all();
        $categories = Category::all();

        return view('todo')->with(['todos' => $todos, 'categories' => $categories]);
    }

    public function add(TodoRequest $request) {
        $params = $request->all();

        Todo::create($params);

        return redirect('/');
    }

    public function show($id) {
        $todos = Todo::all();
        $selectedTodo = $todos->where('id', $id)->first();
        $categories = Category::all();

        return view('todo')->with(['selectedTodo' => $selectedTodo, 'todos' => $todos, 'categories' => $categories]);
    }

    public function update(TodoRequest $request, $id) {
        $params = $request->all();

        $todo = Todo::where('id', $id)->first();
        $todo->update($params);

        return redirect('/');
    }

    public function destroy($id) {
        Todo::find($id)->delete();
        return redirect('/');
    }
}