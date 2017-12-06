
@foreach($todos as $todo)
<form action="/delete/{{ $todo->id }}" method="post">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <div class="row todo-base">
        <div class="col-md-10">
            <h3 class="title">{{ $todo->title }} </h3>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn-no-decoration pull-right">
                <i class="fa fa-trash-o pull-right btn-trash" aria-hidden="true" title="Excluir"></i>
            </button>
            <a href="/show/{{ $todo->id }}">
                <i class="fa fa-pencil-square-o pull-right btn-edit" aria-hidden="true" title="Editar"></i>
            </a>
        </div>
        <div class="col-md-12">
            <label>{{ $todo->description }}</label>
        </div>
    
        <div class="col-md-12">
            <button type="button" class="btn btn-primary btn-xs pull-right">{{ $todo->category->name }}</button>
            <div class="deadline pull-right">
                <i class="fa fa-flag-checkered" aria-hidden="true" title="Faltam X dia(s)"></i>{{ $todo->deadline }}
            </div>
        </div>
    </div>
</form>
@endforeach
@if (count($todos) === 0)
    <div class="alert alert-success col-md-12">
        <strong>Que legal!</strong> Parece que você existem tarefas pendentes. Hora do café ;)
    </div>
@endif