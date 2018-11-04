@extends('layouts.app')

@section('libraries')
@yield('libraries')
@endsection

@section('styles')
<link href="{{asset('css/sidebar.css')}}" rel="stylesheet">
@yield('styles')
@endsection

@section('content')


<nav class = "sidebar">
    
</nav>

<nav class="side-navbar">
    <div class="side-navbar-wrapper">
        <div class="sidenav-header d-flex align-items-center justify-content-center">
            <div class="sidenav-header-inner text-center">
                <h2 class="h5 text-uppercase display-name"> {{ Auth::user() }} </h2>
                <span class="text-uppercase">{{ $role }}</span>
            </div>
            <div class="sidenav-header-logo">
                <a href="dashboard.html" class="brand-small text-center">
                    <strong class="text-primary">G</strong><strong>W</strong>
                </a>
            </div>
        </div>
        <div class="main-menu">
            <ul id="side-main-menu" class="side-menu list-unstyled">                  
                <li>
                    <a href="javascript:void(0)" id="changepass"><i class="fa fa-lock"></i><span>Change Password</span></a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i><span>Logout</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="page home-page">
    <!-- navbar-->
    <header class="header">
        <nav class="navbar">
            <div class="container">
                <div class="navbar-holder d-flex align-items-center justify-content-between">
                    <div class="navbar-header">
                        <a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"></i></a>
                    </div>

                    <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                        <a href="index.html" class="navbar-brand">
                            <div class="brand-text d-none d-md-inline-block">
                                <img src="img/vertical-logo-white.png" class="img-responsive" height="45px">
                            </div>
                        </a>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    @yield('content')

    <footer class="main-footer">
        <div class="container-fluid">
            <div class="row text-right">
                <div class="col-sm-12 text-footer">
                    <p> <a href="#" class="external">Green &amp; White</a> All Rights Reserved &copy; 2017-2018</p>
                </div>
            </div>
        </div>
    </footer>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="changePassModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" id="changeForm">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="currPass">Current Password</label>
                        <input type="password" class="form-control" id="currPass" required>
                    </div>
                    <div class="form-group">
                        <label for="newPass">New Password</label>
                        <input type="password" class="form-control" id="newPass" required>
                    </div>
                    <div class="form-group">
                        <label for="confNewPass">Confirm New Password</label>
                        <input type="password" class="form-control" id="confNewPass" required>
                    </div>
                    <div class="alert alert-danger" id="changeerror" role="alert">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="changepwmodal" class="btn btn-primary">Change Password</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/pw.js') }}"></script>
@yield('scripts')
@endsection