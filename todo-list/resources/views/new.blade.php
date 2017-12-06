@component('form', [
    'action' => '/add',
    'showValues' => false, 
    'formatDate' => false,
    'categories' => $categories])

    @slot('options')
        <option value="" disabled selected hidden>Escolha uma categoria</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    @endslot

    @slot('buttons')
        <button type="submit" class="btn btn-success btn-lg btn-block">Salvar</button>
    @endslot
@endcomponent