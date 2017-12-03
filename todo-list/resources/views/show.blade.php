<form class="form-horizontal" action="/update/{{ $selectedTodo->id }}" method="post">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="form-group">
        <input type="text" class="form-control" name="title" value="{{ $selectedTodo->title }}" placeholder="Título">
    </div>
    <div class="form-group">
        <textarea class="form-control no-resizable" rows="3" name="description" placeholder="Descrição">{{ $selectedTodo->description }}</textarea>
    </div>
    <div class="form-group">
        <select class="form-control" name="category_id" placeholder="Categoria">
            @foreach($categories as $category)
                <option <? if ($selectedTodo->category_id === $category->id) : echo "selected"; endif; ?> value="{{ $category->id }}">
                        {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <input class="form-control" id="deadline" name="deadline" placeholder="Data final" 
            onFocus="changeType(this);" onblur="changeType(this);" value="{{ $selectedTodo->deadline }}">
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <button type="button" class="btn btn-primary btn-lg btn-block col-md-6">Cancelar</button>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-success btn-lg btn-block col-md-6">Alterar</button>
            </div>
        </div>
    </div>
</form>