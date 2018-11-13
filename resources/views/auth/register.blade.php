@extends('layouts.app')

@section('styles')
<style>
    div#register {
        padding: 50px 0px 100px 0px;
    }

    button#register_submit {
        float: right
    }

    .verify,
    .icon.verify {
        display: none;
    }

    .verify.start,
    .icon.verify.start {
        display: block;
    }
</style>
@endsection

@section('content')
<div id = "register" class = "ui container">
    <h1> Green &amp White 2019 Subscription </h1>
    <form class = "ui form" method = "POST" action="{{route('register')}}"> 
        {{ csrf_field() }}
        <div class = "field">
            <label> ID Number </label>
            <div class="ui left icon action input">
                <i class="start verify icon gray check"></i>
                <i class="verified verify icon green check"></i>
                <i class="notverified verify icon red times"></i>
                <input type="number" name="idnum" id="idnum" required>
                <button class="ui green button" id="checkid">
                    Check ID number
                </button>
            </div>
        </div>
        <div id = "start" class = "ui start verify blue message">
            Please verify your ID number first.
        </div> 
        <div id = "verified" class = "verified verify ui green message">
            Your ID has been verified!
        </div>
        <div id = "not_verified" class = "notverified verify ui red message">
            Your ID has not yet been verified yet. Please email gnw2019@gmail.com if you think this is a mistake.
        </div> 
        <div class="field">
            <label> First Name</label>
            <input type="text" name="firstname" required disabled>
        </div>
        <div class="field">
            <label> Middle Name</label>
            <input type="text" name="middlename" required disabled>
        </div>
        <div class="field">
            <label> Last Name</label>
            <input type="text" name="lastname" required disabled>
        </div>
        <div class="field">
            <label> DLSU Email </label>
            <input type="email" name="email" required disabled>
        </div>
        <div class="field">
            <label> Non-DLSU Email </label>
            <input type="email" name="nondlsu" required disabled>
        </div>
        <div class ="field">
            <label> Password </label>
            <input type="password" name="password" required disabled>
        </div>
        <div class="field">
            <label> Confirm Password </label>
            <input type="password" name="password_confirmation" required disabled>
        </div>

        <button id = "register_submit" type="submit" class="ui icon labeled green button" disabled>
            <i class = "icon send"> </i>
            Subscribe
        </button>
        <input type="hidden" name="isVerified" id = "isVerified">
        @if ($errors->any())
        <div class="ui red message">
            @foreach ($errors->all() as $error)
                - {{ $error }}<br>
            @endforeach
        </div>
        @endif
    </form>
</div>
@endsection

@section('scripts')
<script>

function open_form () {
    $("#register input").attr('disabled', null);
    $("#register button").attr('disabled', null);
}

function close_form () {
    $("#register input").attr('disabled', true);
    $("#register button").attr('disabled', true);
    $("#idnum").attr("disabled", null);
    $("#checkid").attr("disabled", null);
}

function verify_id (valid) {
    $(".verify").hide()
    valid ? $(".verify.verified").show() : $(".verify.notverified").show()
    valid ? $("#isVerified").val("verified") : $("#isVerified").val("notverified");
    valid ? open_form() : close_form();
}

$("#checkid").click((e) => {
    e.preventDefault();
    $.ajax ({
        type: "GET",
        url: "/verify/" + $("#idnum").val(),
        success (data) { verify_id(data == "valid") },
        error () { verify_id(false) }
    });
})

</script>
@endsection