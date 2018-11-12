@extends('admin.template', ["context" => 'admin.home'])

@section('substyles')
<style>
    div#adminhome {
        margin: 40px 0px;
        min-height: calc(100vh - 318px);
    }
</style>
@endsection

@section('content')
<div id="adminhome" class = "ui container">
    <h2 class = "ui header"> 
        <div class="content">
            {!! Auth::user()->name !!}
            <div class = "sub header"> {!! (App\User::find(Auth::user()->id)->roles[0])->display_name !!} </div>
        </div>
    </h2>
    <h3> 
        Today is {!! Carbon\Carbon::now() -> toDateString() !!}. <br> 
        Below are the subscriber statistics.
    </h3>
    <div class = "ui four column stackable grid statistics">
        <div class="column statistic">
            <div class="value">
                <i class="icon address card"></i>
                {!! $regIds !!}
            </div>
            <div class="label">
                Number of Register IDs
            </div>
        </div>
        <div class="column statistic">
            <div class="value">
                <i class="icon wpforms"></i>
                {!! $surveys !!}
            </div>
            <div class="label">
                Number of Surveys Answered
            </div>
        </div>
        <div class="column statistic">
            <div class="value">
                <i class="icon user circle"></i>
                {!! $subbies !!}
            </div>
            <div class="label">
                Number of Subscribers
            </div>
        </div>
        <div class="column statistic">
            <div class="value">
                <i class="icon user"></i>
                {!! $paid !!}
            </div>
            <div class="label">
                Number of Paid Subscribers
            </div>
        </div>
        
    </div>
</div>
@endsection

@section('subscripts')
@endsection
