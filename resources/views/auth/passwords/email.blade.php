@extends('layouts.logsub')

@section('content')
<div class="container main">
    <div class="loginrow">
        <div class="done-section" id="forgotDiv">
            <div class="header text-right" id="back">
                <a href="{{ route('home') }}"><span class="back text-right"><span class="fa fa-angle-left"></span>&nbsp; Back</span></a>
            </div>
            <hr/>
            <form method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="lbl" for="inputID">ID Number</label>
                    <input type="text" class="form-control" id="inputID" name="idnum" aria-describedby="emailHelp" placeholder="e.g 11245678" required>
                    <small id="emailHelp" class="form-text text-muted">An email will be sent to you shortly</small>
                </div>
                @if (Session::has('status'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('status') }}
                </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $errors)
                        {{ $errors }}
                    @endforeach
                </div>
                @endif
                <button type="submit" class="btn btn-block btn-success">Send me an email</button>
            </form>
        </div>
    </div>
</div>
@endsection