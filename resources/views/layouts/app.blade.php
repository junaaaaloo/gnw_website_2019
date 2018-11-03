<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- METADATA -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Green &amp; White </title>

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

    <!-- CSRF TOKEN -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- LIBRARIES -->
    <link href="https://fonts.googleapis.com/css?family=Barlow|Roboto|Roboto+Condensed|Istok+Web" rel="stylesheet">
    <link href="{{ asset('lib/semantic/semantic.min.css') }}" rel="stylesheet">
    <script src="{{ asset('lib/jquery.min.js')}}"></script>
    <script src="{{ asset('lib/semantic/semantic.min.js') }}"> </script>
    @yield('libraries')

    <!-- STYLES -->
    <link href="{{ asset('css/brand.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
    <div id="background"> </div>
    <div id="overlay"> </div>
    <nav id="navbar" class="ui labeled stackable secondary menu">
        <div>
            <a class = "hamburger_menu brand link inverted">
                <i class="icon bars"> </i>
            </a>
            <a href="/">
                <img class = "header brand image" src="{{ asset('img/vertical-logo.png')}}">
            </a>    
        </div>
        <div class="right menu">
            <a href="{{ route ('about') }}" class="{{ $context == 'about' ? 'active' : '' }} nav item">
                ABOUT
            </a>
            <a href= "{{ route('contact') }}" class="{{ $context == 'contact' ? 'active' : '' }} nav item">
                CONTACT
            </a>

            @if(!Auth::user())
            <a id = "login" class="login-button nav item">
                LOGIN
            </a>
            <a href="{{ route('register') }}" class="{{ $context == 'register' ? 'active' : '' }} nav item">
                SUBSCRIBE
            </a>
            @else
            <a href="{{ route('home') }}" class="{{ $context == 'subscriber-home' ? 'active' : '' }}  nav labeled item">
                <i class="icon home layout"> </i>
                HOME
            </a>
            <!-- TO DO -->
            <a href="{{ route('home') }}" class="nav labeled item">
                <i class="icon lock layout"> </i>
                CHANGE PASSWORD
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class = "nav labeled item">
                <button type = "submit"> 
                    <i class="icon  layout sign out alternate"></i>
                    LOGOUT 
                </button>
                {{ csrf_field() }}
            </form>
            @endif

        </div>
        <div id = "login_modal" class="ui  mini modal">
            <div class = "icon header">                       
                <img src="{{ asset('favicon/favicon-16x16.png')}}">
                SUBSCRIBER'S LOGIN
            </div>
            <div class="content">
                <form method="POST" action="{{ route('login') }}" class="ui large form">
                    {{ csrf_field() }}
                    <div class = "wide field">
                        <label> ID Number </label>
                        <input type="number" placeholder="e.g. 11526785">
                    </div>
                    <div class = "wide field">
                        <label> Password </label>
                        <input type="password" placeholder="Password">
                    </div>

                    <a class = "brand link inverted" href="{{ route('password.request') }}">
                        Forgot Password? 
                    </a>
                    <br>
                    <button type="submit" id = "login_submit" class="ui green button"> LOGIN </button>
                    @if ($errors->any())
                        <div class="ui red message" role="alert">
                            Wrong Credentials
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </nav>
    <div id="content"> 
        @yield('content')
        <div class = "footer">
            <img src="{{asset('img/all_logos.png')}}" width = "300px">
            <div class = "all_rights_reserved"> 
                Green & White © All Rights Reserved 2018 
            </div>
            
            <div class = "social_media">
                <a class = "brand link" href = "https://www.facebook.com/GnW2019"> 
                    <i class = "icon facebook"> </i>
                </a> 
                <a class = "brand link" href = "mailto:gnw2019@gmail.com">
                    <i class = "icon envelope"> </i>
                </a>
            </div>
        </div>
    </div>
    
    <!-- SCRIPTS -->
    <script src="{{ asset('js/index.js') }}"></script>
    <script src="{{ asset('js/navbar.js') }}"></script>
    <script>
        let has_login_error = "{{$errors->any()?'true':'false'}}"
        if (has_login_error === "true") {
            $('#login_modal').modal('show');
        }
    </script>
    @yield('scripts')
</body>
</html>
