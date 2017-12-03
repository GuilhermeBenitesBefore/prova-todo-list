
@foreach($todos as $todo)

    <div class="row todo-base">
        <div class="col-md-10">
            <h3 class="title">{{ $todo->title }} </h3>
        </div>
        <div class="col-md-2">
            <a href="/delete/{{ $todo->id }}">
                <i class="fa fa-trash-o pull-right btn-trash" aria-hidden="true" title="Excluir"></i>
            </a>
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

@endforeach
