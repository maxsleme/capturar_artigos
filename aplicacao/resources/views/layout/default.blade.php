<!DOCTYPE html>
<html>
    <head>
        <title>Sistema de captura de informação</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/lightbox.min.css') }}" rel="stylesheet"> 
        <link rel="stylesheet" href="{{ asset('css/admin/jquery.datetimepicker.css') }}">
        <link href="{{ asset('css/base.css') }}" rel="stylesheet"> 

        
    </head>
    <body>

        @yield('content')
       
       <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

        <!-- fim dos scripts -->
    </body>
</html>
