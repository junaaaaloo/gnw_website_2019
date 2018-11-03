@extends('layouts.app')

@section('styles')
<style>
    #about_gnw {
        padding: 30px;
    }

</style>
@endsection

@section('content') 
<div id = "about_gnw">
    <h2> About Green & White </h2>
    <h3 class="ui horizontal divider header">
        HISTORY
    </h3>
    <div class="flex-center flex-column" id = "history">
        <img src="{{ asset('img/logo.png') }}" width="200px" /><br>
        <p>
            Founded in 1924 as the first student organization of De La Salle College, Green & White came to be the official yearbook publication of DLSC in 1938. Over ninety years since its birth, we continue the legacy of capturing images of Lasallian excellence and providing the Lasallian community a testimonial of its brilliant history.
        </p>
    </div>
    <h3 class="ui horizontal divider header">
        WHAT WE DO?
    </h3>
    <h3 class="ui horizontal divider header">
        THE TEAM
    </h3>
</div>
@endsection

@section('scripts')

@endsection