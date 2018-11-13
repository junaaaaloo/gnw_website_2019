@extends('layouts.app')

@section('libraries')
@yield('sublibraries')
@endsection

@section('styles')
    @yield('substyles')
@endsection

@section('menu.left')
<div id = "subscriber_menu" class="desktop ui dropdown item">
    <input type="hidden" name="subscriber_menu" value="{{$context or 'subscriber.announcements'}}">
    <div class ="text"> </div>
    <i class="dropdown icon"></i>
    <div class="menu">
        <a data-value = "admin.home" class="item"  href="{{ route('home') }}">
            <i class="icon home"> </i>
            HOME
        </a>
        <div class="item">
            <i class="dropdown icon"></i>
            <span class="text">            
                <i class="icon users"></i>
                <span>SUBSCRIBERS</span>
            </span>
            <div class="menu">
                <a data-value = "admin.manage.subscribers" href="{{ route('admin.manage.subs') }}" class="item"> 
                    <i class="icon users"></i>
                    MANAGE SUBSCRIBERS
                </a>
                <a data-value = "admin.manage.registeredIDs" href="{{ route('admin.manage.regid') }}" class="item"> 
                    <i class="icon address card"></i>
                    MANAGE REGISTERED ID
                </a>
                <a data-value = "admin.manage.payments" href="{{ route('admin.manage.payments') }}" class="item">
                    <i class="icon credit card"></i>
                    MANAGE PAYMENT
                </a>
            </div>
        </div>
        <a data-value = "admin.manage.announcements" href="{{ route('admin.manage.news') }}" class="item">  
            <i class="icon newspaper"></i>
            <span>ANNOUNCEMENTS </span>
        </a>
        @if (Auth::user() -> hasRole ("administrator"))
        <a data-value = "admin.manage.administrators" href="{{ route('admin.manage.admin') }}" class="item">  
            <i class="icon user secret"></i>
            <span>ADMINISTRATORS </span>
        </a>
        @endif
    </div>
</div>
@if ($context == "admin.manage.subscribers")
@isset($subbie)
<div class="desktop item">
    SUBSCRIBER: {{$subbie->lastname}}, {{$subbie->firstname}}
</div>  
@endisset
@endif
<div class = "menu mobile">
    <a data-value = "admin.home" class="item"  href="{{ route('home') }}">
        <i class="icon home"> </i>
        HOME
    </a>
    <a data-value = "admin.manage.subscribers" href="{{ route('admin.manage.subs') }}" class="item"> 
        <i class="icon users"></i>
        MANAGE SUBSCRIBERS
    </a>
    <a data-value = "admin.manage.registeredIDs" href="{{ route('admin.manage.regid') }}" class="item"> 
        <i class="icon address card"></i>
        MANAGE REGISTERED ID
    </a>
    <a data-value = "admin.manage.payments" href="{{ route('admin.manage.payments') }}" class="item">
        <i class="icon credit card"></i>
        MANAGE PAYMENT
    </a>
    <a data-value = "admin.manage.announcements" href="{{ route('admin.manage.news') }}" class="item">  
        <i class="icon newspaper"></i>
        <span>ANNOUNCEMENTS </span>
    </a>
    @if (Auth::user() -> hasRole ("administrator"))
    <a data-value = "admin.manage.administrators" href="{{ route('admin.manage.admin') }}" class="item">  
        <i class="icon user secret"></i>
        <span>ADMINISTRATORS </span>
    </a>
    @endif
</div>
@endsection

@section('content')
<div class = "ui container">
    @yield('subcontent')
    <!-- <div class="modal fade" tabindex="-1" role="dialog" id="changePassModal">
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
    </div> -->
</div>

<div id = "change" class="ui modal">
    <form action="#" id="changepassword_form">
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
@endsection

@section('scripts')
<script src="{{ asset('js/pw.js') }}"></script>
@yield('subscripts')
@endsection