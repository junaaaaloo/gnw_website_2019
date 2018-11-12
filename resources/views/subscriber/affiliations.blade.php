@extends('subscriber.template', ['context' => 'subscriber.affiliations'])

@section('subsections')

@endsection
@section('substyles')
<style>
    div#affiliations {
        min-height: calc(100vh - 332px);
    }
</style>
@endsection

@section('subcontent')
<div id = "affiliations" class = "ui brand page container">
    <h2 class = "ui header">
        Affiliations
    </h2>
    <table class="ui celled padded table">
        <thead>
            <tr>
                <th scope="col">Organization</th>
                <th scope="col">Position</th>
                <th scope="col">Year</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($affiliations as $aff)
            <tr>
                <th scope="col">{{ $aff->organization }}</th>
                <th scope="col">{{ $aff->position }}</th>
                <th scope="col">{{ $aff->start_year }}</th>
                <!--<th scope="col">{{ $aff->end_year }}</th>-->
                <!--<th scope="col" class="delete" id="delete" data-id="{{ $aff->id }}">-->
                <!--    Delete-->
                <!--</th>-->
            </tr>
            @endforeach
            @if ($affiliations->count() == 0)
            <tr>
                <th colspan="3">
                    No affiliations loaded.
                </th>
            </tr>
            @endif
        </tbody>
    </table>
</div>


@endsection

@section('subscripts')

@endsection
