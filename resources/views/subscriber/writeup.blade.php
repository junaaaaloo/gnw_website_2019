@extends('subscriber.template', ['context' => 'subscriber.writeup'])

@section('subsections')

@endsection
@section('substyles')
<style>
    div#writeup {
        min-height: calc(100vh - 332px);
    }
</style>
@endsection

@section('subcontent')
<div id = "writeup" class = "ui brand page container">  
    <h2 class = "ui header">
        Write Up
    </h2>
    <form method="POST" action="{{ route('writeup.save') }}" class = "ui form">
        {{ csrf_field() }}
        <div class="field">
            <label for="writeup">Please be advised that if you exceed 80 words, the excess words will be deleted. </label>
            <textarea id="writeup" rows="5" name="writeup">{{ $writeup }}</textarea>                  
        </div>
        <button type="submit" class="ui green floated right  button">
            <i class="icon save"></i>
            Save
        </button>
    </form>
    <input type="hidden" name="status" id="status">

    @if (Session::has('status'))
    <div class="ui message" role="alert">
        {{ Session::get('status') }}
    </div>
    @endif
</div>
@endsection

@section('subscripts')

@endsection