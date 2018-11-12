@extends('layouts.app')

@section('styles')
<style>
    div#register {
        padding: 50px 0px 100px 0px;
    }

    button#register_submit {
        float: right
    }
</style>
@endsection

@section('content')
<div id = "register" class = "ui container">
    <h1> Green &amp White 2019 Subscription </h1>
    <form class = "ui form"> 
        {{ csrf_field() }}
        <div class = "field">
            <label> ID Number </label>
            <div class="ui left icon action input">
                <i class="icon check"></i>
                <input type="number" class="form-control" name="idnum" id="idnum" required>
                <button class="ui green button" id="checkid">
                    Check ID number
                </button>
            </div>
        </div>
        <div id = "verified" class = "verify ui green message">
            Your ID has been verified!
        </div>
        <div id = "not_verified" class = "verify ui red message">
            Your ID has not yet been verified yet. Please email {email} if you think this is a mistake.
        </div> 
        <div id = "initial" class = "verify ui message">
            Please first check if your ID number has been verified.
        </div>     
        <div class="field">
            <label> First Name</label>
            <input type="text" name="firstname" required>
        </div>
        <div class="field">
            <label> Middle Name</label>
            <input type="text" name="middlename" required>
        </div>
        <div class="field">
            <label> Last Name</label>
            <input type="text" name="lastname" required>
        </div>
        <div class="field">
            <label> DLSU Email </label>
            <input type="email" name="email" required>
        </div>
        <div class="field">
            <label> Non-DLSU Email </label>
            <input type="email" name="nondlsu" required>
        </div>
        <div class ="field">
            <label> Password </label>
            <input type="password" name="password" required>
        </div>
        <div class="field">
            <label> Confirm Password </label>
            <input type="password" name="password_confirmation" required>
        </div>

        <button id = "register_submit" type="submit" class="ui icon labeled green button">
            <i class = "icon send"> </i>
            Subscribe
        </button>
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
    $("#checkid").click((e) => {
        e.preventDefault();
        console.log($("#idnum").val())
        $.ajax ({
            type: "GET",
            url: "/verify/" + $("#idnum").val(),
            success: function (data) {
                if(data == "valid") {
                    $(".verify#verified").show()
                    $(".verify").hide()
                    $("#isVerified").val("verified");
                } else if(data == "error") {
                    $(".verify#verified").hide()
                    $(".verify#not_verified").show()
                    $("#isVerified").val("notverified");
                }
            },
            error: function (data) {
                    $(".verify#verified").hide()
                    $(".verify").show()
                    $("#isVerified").val("notverified");
            }
        });
    })
</script>
@endsection