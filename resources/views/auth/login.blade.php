@extends('layouts.logsub')

@section('content')
<div class="container main">
    <div class="loginrow">
        <div class="done-section" id="loginDiv">
            <div class="header text-right" id="back">
                <a href="{{ route('index') }}"><span class="back text-right"><span class="fa fa-angle-left"></span>&nbsp; Back</span></a>
            </div>
            <hr/>
            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="lbl" for="inputID">ID Number</label>
                    <input type="text" class="form-control" id="inputID" name="idnum" aria-describedby="emailHelp" placeholder="e.g 11245678">
                    <small id="emailHelp" class="form-text text-muted">Follows DLSU ID format</small>
                </div>

                <div class="form-group">
                    <label class="lbl" for="inputPW">Password</label>
                    <input type="password" class="form-control" id="inputPW" name="password" placeholder="Password">
                </div>
                <div class="form-check">
                    <a href="{{ route('password.request') }}" class="forgot">Forgot Password?</a>
                </div>

                @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    Incorrect ID Number and/or Password
                </div>
                @endif
                <button type="submit" class="btn btn-block btn-success">Login</button>
            </form>
        </div>
    </div>
</div>
@endsection
