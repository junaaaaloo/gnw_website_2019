<!DOCTYPE html>
<html lang="en">
	<head>
        <meta charset="utf-8">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="width=device-width, initial-scale=1" name="viewport">

        <!-- FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Barlow|Roboto|Roboto+Condensed" rel="stylesheet">
        <link href="{{ asset('css/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/shapes.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/subscribe.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css">
    </head>

    <body>
        @yield('content')
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/login.js') }}"></script>
        <script src="{{ asset('js/parallax.min.js') }}js/parallax.min.js"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>
</html>