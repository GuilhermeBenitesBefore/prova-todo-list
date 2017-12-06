<?php

namespace TodoList\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ToDoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo' => 'required|min:3',
            'descricao' => 'required|max:255',
            'vencimento' => 'required',
            'category_id' => 'required',
            //
        ];
    }

    public function messages(){
        return [
            'required' => 'O campo :attribute é obrigatório'
        ];
    }
}
