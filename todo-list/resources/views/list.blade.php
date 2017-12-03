
@foreach($todos as $todo)

    <div class="row todo-base">
        <div class="col-md-11">
            <h3 class="title">{{ $todo->title }} </h3>
        </div>
        <div class="col-md-1">
                <a href="#">
                    <i class="fa fa-pencil-square-o pull-right" aria-hidden="true" title="Editar"></i>
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
