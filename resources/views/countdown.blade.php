<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- METADATA -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Green & White </title>

        <!-- FAVICON -->
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('favicon/android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">

        <!-- LIBRARIES -->
        <link href="https://fonts.googleapis.com/css?family=Barlow|Istok+Web" rel="stylesheet"/>
        <script src="{{asset('lib/particles.min.js')}}"> </script>
        
        <!-- STYLES -->
        <link href = "{{asset('css/countdown.css')}}" rel = "stylesheet"/>
    </head>
    <body>
        <div id = "bg"> </div>
        <div id = "overlay"> </div>
        <div id = "main"> 
            <div class = "content">
                <div class = "cover container">        
                    <img class = "brand" src="{{ asset('img/vertical-logo.png')}}">
                    <div class = "timer">
                        <div class = "time">
                            <div class = "value" id = "days"> 00 </div>
                            <div class = "label"> DAYS </div>
                        </div>
                        <div class = "colon"> : </div>
                        <div class = "time">
                            <div class = "value" id = "hours"> 00 </div>
                            <div class = "label"> HOURS </div>
                        </div>
                        <div class = "colon"> : </div>
                        <div class = "time">
                            <div class = "value" id = "minutes"> 00 </div>
                            <div class = "label"> MINUTES </div>
                        </div>
                        <div class = "colon"> : </div>
                        <div class = "time">
                            <div class = "value" id = "seconds"> 00 </div>
                            <div class = "label"> SECONDS </div>
                        </div>
                    </div>
                    <div class = "message"> We'll be live soon. </div>
                </div>
            </div>
            <div class = "footer">
                <img class = "brand" src="{{ asset('img/all_logos.png')}}"><br>
                Green & White © All Rights Reserved 2018
            </div>
        </div>
    </body>

    <!-- SCRIPTS -->
    <script src="{{asset('js/countdown.js')}}"></script>
</html>