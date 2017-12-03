<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TODO List @yield('title')</title>

        <link href="/css/app.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <script type="text/javascript">
            function changeType(e) {
                console.log('aehoo');
                if (e.value)
                    return;
                
                e.type = e.type === 'text' ? 'date' : 'text';
            };
        </script>
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
