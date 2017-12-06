<form class="form-horizontal" action="{{ $action }}" method="post">
    {{ csrf_field() }}
    @if (isset($method))
        {{ method_field($method) }}
    @endif
    <div class="form-group">
        <input type="text" class="form-control" name="title" placeholder="Título" 
            @if ($showValues)
                value="{{ $selectedTodo->title }}"
            @endif
        />
    </div>
    <div class="form-group">
        <textarea class="form-control no-resizable" rows="3" name="description" placeholder="Descrição">@if ($showValues){{ $selectedTodo->description }}@endif</textarea>
    </div>
    <div class="form-group">
        <select class="form-control" name="category_id" placeholder="Categoria">
            {{ $options }}
        </select>
    </div>
    <div class="form-group">
        <input @if ($formatDate)type="date"@endif class="form-control" id="deadline" name="deadline" placeholder="Data final" onFocus="changeType(this);" onblur="changeType(this);"
            @if ($showValues)
                value='{{ $selectedTodo->deadline }}'
            @endif
        />
    </div>
    <div class="form-group">
        {{ $buttons }}
    </div>
</form>