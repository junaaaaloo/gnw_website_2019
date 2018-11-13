@extends('layouts.app', ["context"=>"reset"])

@section('styles')
<style>
div#reset {
    margin: 50px 0px 100px 0px;
    min-height: calc(100vh - 405px);
}
</style>
@endsection

@section('content')
<div id="reset" class="ui container brand page">
    <form class = "ui form" method = "POST" action="{{route('password.request')}}">
        {{ csrf_field() }}
        <div class="field">
            <label for="idnum">ID Number</label>
            <input id="idnum" type="text" class="form-control" name="idnum" required autofocus="">
            @if ($errors->has('idnum'))
                <small id="emailHelp" class="form-text text-muted">
                    {{ $errors->first('idnum') }}
                </small>
            @endif
        </div>

        <div class="field">
            <label for="inputID">Password</label>
            <input id="password" type="password" class="form-control" name="password" required>
            @if ($errors->has('password'))
                <small id="emailHelp" class="form-text text-muted">
                    {{ $errors->first('password') }}
                </small>
            @endif
        </div>

        <div class="field">
            <label for="inputID">Confirm Password</label>
            <input id="password-confirm" type="password" name="password_confirmation" required>
            @if ($errors->has('password_confirmation'))
                <small id="emailHelp" class="form-text text-muted">
                    {{ $errors->first('password_confirmation') }}
                </small>
            @endif
        </div>
        <button type="submit" class="ui green button">Reset Password</button>
    </form>
</div>
@endsection