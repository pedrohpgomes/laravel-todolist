<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TODO LIST</title>

        <link rel="stylesheet" href="{{asset('assets/bootstrap/bootstrap.min.css')}}" />
        <script src="{{asset('assets/jquery-3.6.0.js')}}"></script>
         <link rel="stylesheet" href="{{asset('assets/fontawesome/css/all.css')}}" />

    </head>
    <body>
        @include('flash-message')
        @yield('content')
        
        <script src="{{asset('assets/bootstrap/bootstrap.bundle.min.js')}}"></script>
    </body>
</html>