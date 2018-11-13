@extends('subscriber.template', ['context' => 'subscriber.announcements'])

@section('subsections')

@endsection
@section('substyles')
<style>
    div#announcements {
        min-height: calc(100vh - 332px);
    }
</style>
@endsection

@section('subcontent')
<div id = "announcements" class = "ui brand page container">
    <h2 class = "ui header">
        Announcements
    </h2>
    @foreach ($announcements as $announcement)
    <div id="new-updates" class="ui padded segment">
        <h3 class = "ui compact header">{{ $announcement->subject }}</h3>
        <em> by: {{$announcement->created_by }}</em>
        <p>{!!  
                nl2br(e($announcement->message))
            !!}
        </p>
    </div>
    <br>
    @endforeach
</div>
@endsection

@section('subscripts')

@endsection
