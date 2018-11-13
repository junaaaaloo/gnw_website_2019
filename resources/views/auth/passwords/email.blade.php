@extends('layouts.app', ["context"=>"email"])

@section('styles')
<style>
div#email_send {
    margin: 50px 0px 100px 0px;
    min-height: calc(100vh - 405px);
}
</style>
@endsection

@section('content')
<div id="email_send" class="ui container brand page">
    <form class = "ui form" method = "POST" action="{{route('password.email')}}">
        {{ csrf_field() }}
        <div class="field">
            <label for="idnum"> ID Number </label>
            <input type="text" class="form-control" id="inputID" name="idnum" aria-describedby="emailHelp" placeholder="e.g 11245678" required>
            <small id="emailHelp" class="form-text text-muted">An email will be sent to you shortly</small>    
        </div>
        
        <button type="submit" class="ui green button">Send me an email</button>
    </form>
</div>
@endsection