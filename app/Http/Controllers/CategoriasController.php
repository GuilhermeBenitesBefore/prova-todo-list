<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class CategoriasController extends Controller
{

    protected function validarCategoria($request)
    {
        $validator = \Validator::make($request->all(), [
            "descricao" => "required"
        ]);
        return $validator;
    }


    public function index()
    {
        $listaCategorias = Categoria::select('id', 'descricao')->paginate(2);
        return view('categorias.index', compact('listaCategorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }


    public function store(Request $request)
    {
        $dados = $request->all();
        $validacao = $this->validarCategoria($request);
        if ($validacao->fails()) {
            return redirect()->back()->withErrors($validacao->errors())->withInput();
        }
        Categoria::create($dados);
        return redirect()->route('categorias.index')->with('message', 'Categoria Adicionada com sucesso!');
    }


    public function show($id)
    {
        $categoria = Categoria::find($id);
        return view('categorias.show', compact('categoria'));
    }


    public function edit($id)
    {
        $categoria = Categoria::find($id);
        return view('categorias.edit', compact('categoria'));
    }


    public function update(Request $request, $id)
    {
        $validator = $this->validarCategoria($request);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $categoria = Categoria::find($id);
        $dados = $request->all();
        $categoria->update($dados);
        return redirect()->route('categorias.index')->with('message', 'Categoria Atualizada com sucesso!');
    }

    public function delete($id)
    {
        $categoria = Categoria::find($id);
        return view('categorias.delete', compact('categoria'));
    }

    public function destroy($id)
    {
        Categoria::find($id)->delete();
        return redirect()->route('categorias.index')->with('message', 'Categoria Deletada com sucesso!');
    }
}
