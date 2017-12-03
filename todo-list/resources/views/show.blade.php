@component('form', [
    'action' => ('/update' . (isset($selectedTodo) ? '/' . $selectedTodo->id : '')),
    'showValues' => true,
    'formatDate' => true,
    'categories' => $categories, 
    'selectedTodo' => $selectedTodo,
    'method' => 'PUT'])

    @slot('options')
        @foreach($categories as $category)
            <option <? if ($selectedTodo->category_id === $category->id) : echo "selected"; endif; ?> value="{{ $category->id }}">
                    {{ $category->name }}
            </option>
        @endforeach 
    @endslot

    @slot('buttons')
        <div class="row">
            <div class="col-md-6">
                <button type="button" class="btn btn-primary btn-lg btn-block col-md-6">Cancelar</button>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-success btn-lg btn-block col-md-6">Alterar</button>
            </div>
        </div>
    @endslot

@endcomponent