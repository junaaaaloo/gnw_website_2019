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
    <div class = "text"> </div>
    <i class="dropdown icon"></i>
    <div class="menu">
        <a data-value = "subscriber.announcements" class="item"  href="{{ route('home') }}">
            <i class="icon home"> </i>
            ANNOUNCEMENTS
        </a>
        <a data-value = "subscriber.basic_info" class = "item" href="{{ route('sub.basic') }}">
            <i class="icon user"></i>
            <span>BASIC INFORMATION</span>
        </a>
        <a data-value = "subscriber.payment_info" href="{{ route('sub.payment') }}" class = "item">
            <i class="icon credit card"></i>
            <span>PAYMENT INFORMATION<span>
        </a>
        <a data-value = "subscriber.affiliations" href="{{ route('sub.affiliations') }}" class = "item">
            <i class="icon star"></i>
            <span>AFFILIATIONS</span>
        </a>
        <a data-value = "subscriber.writeup" href="{{ route('sub.writeup') }}" class = "item">
            <i class="icon pencil"></i>
            <span>WRITE UP</span>
        </a>
        <!-- <a data-value = "subscriber.pictorial" href="{{ route('sched.pictorial') }}" class = "item">
            <i class="icon calendar check"></i>
            <span>SCHEDULE PICTORIAL </span>
        </a> -->
    </div>
</div>
<div class = "menu mobile">
    <a class="item"  href="{{ route('home') }}">
        <i class="icon home"> </i>
        ANNOUNCEMENTS
    </a>
    <a class = "item" href="{{ route('sub.basic') }}">
        <i class="icon user"></i>
        <span>BASIC INFORMATION</span>
    </a>
    <a href="{{ route('sub.payment') }}" class = "item">
        <i class="icon credit card"></i>
        <span>PAYMENT INFORMATION<span>
    </a>
    <a href="{{ route('sub.affiliations') }}" class = "item">
        <i class="icon star"></i>
        <span>AFFILIATIONS</span>
    </a>
    <a href="{{ route('sub.writeup') }}" class = "item">
        <i class="icon pencil"></i>
        <span>WRITE UP</span>
    </a>
    <!-- <a href="{{ route('sched.pictorial') }}" class = "item">
        <i class="icon calendar check"></i>
        <span>SCHEDULE PICTORIAL </span>
    </a> -->
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
@endsection

@section('scripts')
@yield('subscripts')
@endsection