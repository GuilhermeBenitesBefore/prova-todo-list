<form class="form-horizontal" action="/update/1" method="post">
    <input type="hidden" value="{{ csrf_token() }}" name="_token" />
    <div class="form-group">
        <input type="text" class="form-control" name="title" value="{{ $selectedTodo->title }}" placeholder="Título">
    </div>
    <div class="form-group">
        <textarea class="form-control no-resizable" rows="3" name="description" placeholder="Descrição">{{ $selectedTodo->description }}</textarea>
    </div>
    <div class="form-group">
        <select class="form-control" name="category_id" placeholder="Categoria">
            <option value="1">Trabalho</option>
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