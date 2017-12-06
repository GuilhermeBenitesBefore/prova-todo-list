<!DOCTYPE html>
<html >
<head>
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <link rel="stylesheet" type="text/css" href="/css/toDo.css">
    
    <title>ToDoList</title>
</head>
<body>
    <div class="container">

        @if($errors->all())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <ul>
                <li>{{$error}}</li>
            </ul>
            @endforeach
        </div>
        @endif

        @yield('conteudo')
    </div>
</body>
<footer>
<div class="text-center">
    <p class="modal-footer"> @Copyrigth Marlom Figueiredo Souza<p>
</div>
</footer>
</html>