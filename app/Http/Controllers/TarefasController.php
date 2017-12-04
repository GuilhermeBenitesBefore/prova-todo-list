<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use App\Tarefa;

class TarefasController extends Controller
{

    protected function validarTarefa($request)
    {
        $validator = \Validator::make($request->all(), [
            "titulo" => "required",
            "descricao" => "required",
            "data_inicio" => "required",
            "data_fim" => "required",
            "categoria_id" => "required"
        ]);
        return $validator;
    }

    public function index()
    {

        $listaTarefas = Tarefa::select('id', 'titulo', 'data_inicio', 'data_fim')->paginate(2);

        foreach ($listaTarefas as $index => $tarefa) {
            $data_inicio = new \DateTime($listaTarefas[$index]->data_inicio);
            $listaTarefas[$index]->data_inicio = $data_inicio->format('d/m/Y');
            $data_fim = new \DateTime($listaTarefas[$index]->data_fim);
            $listaTarefas[$index]->data_fim = $data_fim->format('d/m/Y');
        }
        return view('tarefas.index', compact('listaTarefas'));
    }

    public function create()
    {

        $categorias = Categoria::all();
        return view('tarefas.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $dados = $request->all();
        $validacao = $this->validarTarefa($request);
        if ($validacao->fails()) {
            return redirect()->back()->withErrors($validacao->errors())->withInput();
        }
        Tarefa::create($dados);
        return redirect()->route('tarefas.index')->with('message', 'Tarefa Adicionada com sucesso!');
    }


    public function show($id)
    {
        $tarefa = Tarefa::find($id);
        return view('tarefas.show', compact('tarefa'));
    }


    public function edit($id)
    {
        $categorias = Categoria::all();
        $tarefa = Tarefa::find($id);
        return view('tarefas.edit', compact('tarefa', 'categorias'));
    }


    public function update(Request $request, $id)
    {
        $validator = $this->validarTarefa($request);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $tarefa = Tarefa::find($id);
        $dados = $request->all();
        $tarefa->update($dados);
        return redirect()->route('tarefas.index')->with('message', 'Tarefa Atualizada com sucesso!');
    }

    public function delete($id)
    {
        $tarefa = Tarefa::find($id);
        return view('tarefas.delete', compact('tarefa'));
    }


    public function destroy($id)
    {
        Tarefa::find($id)->delete();
        return redirect()->route('tarefas.index')->with('message', 'Tarefa Deletada com sucesso!');
    }
}
