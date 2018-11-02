@extends('layouts.logsub')

@section('content')
<div class="container main">
    <div class="loginrow">
        <div class="done-section" id="forgotDiv">
            <div class="header text-right" id="back">
                <a href="{{ route('home') }}"><span class="back text-right"><span class="fa fa-angle-left"></span>&nbsp; Back</span></a>
            </div>
            <hr/>
            <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                {{ csrf_field() }}

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group">
                    <label class="lbl" for="idnum">ID Number</label>
                    <input id="idnum" type="text" class="form-control" name="idnum" required autofocus="">
                    @if ($errors->has('idnum'))
                        <small id="emailHelp" class="form-text text-muted">
                            {{ $errors->first('idnum') }}
                        </small>
                    @endif
                </div>

                <div class="form-group">
                    <label class="lbl" for="inputID">Password</label>
                    <input id="password" type="password" class="form-control" name="password" required>
                    @if ($errors->has('password'))
                        <small id="emailHelp" class="form-text text-muted">
                            {{ $errors->first('password') }}
                        </small>
                    @endif
                </div>

                <div class="form-group">
                    <label class="lbl" for="inputID">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    @if ($errors->has('password_confirmation'))
                        <small id="emailHelp" class="form-text text-muted">
                            {{ $errors->first('password_confirmation') }}
                        </small>
                    @endif
                </div>
                <button type="submit" class="btn btn-block btn-success">Reset Password</button>
            </form>
        </div>
    </div>
</div>
@endsection