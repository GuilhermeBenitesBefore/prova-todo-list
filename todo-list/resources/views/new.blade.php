<form class="form-horizontal" action="/add" method="post">
    <input type="hidden" value="{{ csrf_token() }}" name="_token" />
    <div class="form-group">
        <input type="text" class="form-control" name="title" placeholder="Título">
    </div>
    <div class="form-group">
        <textarea class="form-control no-resizable" rows="3" name="description" placeholder="Descrição"></textarea>
    </div>
    <div class="form-group">
        <select class="form-control" name="category_id" placeholder="Categoria">
            <option value="" disabled selected hidden>Escolha uma categoria</option>
            <option value="1">Trabalho</option>
        </select>
    </div>
    <div class="form-group">
        <input class="form-control" id="deadline" name="deadline" placeholder="Data final" onFocus="changeType(this);" onblur="changeType(this);">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success btn-lg btn-block">Salvar</button>
    </div>
</form>