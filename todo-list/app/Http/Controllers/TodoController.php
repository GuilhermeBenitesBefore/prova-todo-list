<?php namespace App\Http\Controllers;

use App\Todo;
use App\Category;
use App\Http\Requests\TodoRequest;
use Request;

class TodoController extends Controller {
    public function all() {
        $todos = Todo::all();

        return view('todo')->with('todos', $todos);
    }

    public function add(TodoRequest $request) {
        $params = $request->all();

        Todo::create($params);

        return redirect('/');
    }

    public function show($id) {
        $todos = Todo::all();
        $selectedTodo = $todos->where('id', $id)->first();

        return view('todo')->with(['selectedTodo' => $selectedTodo, 'todos' => $todos]);
    }

    public function update(TodoRequest $request, $id) {
        $params = $request->all();

        $todo = Todo::where('id', $id)->first();
        $todo->update($params);
        // $todo->title = $params->title;
        // $todo->description = $params->description;
        // $todo->category_id = $params->category_id;
        // $todo->deadline = $params->deadline;
        // $todo->save();

        return redirect('/');
    }
}