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
    <button id = "addaffiliation_button" class="ui green button"> Add Affiliation </button>
    <table class="ui celled padded stackable table">
        <thead>
            <tr>
                <th scope="col">Organization</th>
                <th scope="col">Position</th>
                <th scope="col">Start Year</th>
                <th scope="col">End Year</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($affiliations as $aff)
            <tr>
                <th scope="col">{{ $aff->organization }}</th>
                <th scope="col">{{ $aff->position }}</th>
                <th scope="col">{{ $aff->start_year }}</th>
                <th scope="col">{{ $aff->end_year }}</th>
                <th scope="col">
                    <button class="ui red button" onclick = "delete_aff({{$aff->id}})"> 
                        Delete 
                    </button>   
                </th>
            </tr>
            @endforeach
            @if ($affiliations->count() == 0)
            <tr>
                <th colspan="5">
                    No affiliations.
                </th>
            </tr>
            @endif
        </tbody>
    </table>
    <div id="addaffiliation_modal" class="ui modal">
        <i class="icon close"></i>
        <div class="header"> ADD AFFILIATION </div>
        <div class="content">
            <form action="{{route('aff.add')}}" method="POST" class="ui form">
                {{csrf_field()}}
                <div class="field">
                    <label for="organization">Organization</label>
                    <input type="text" name="organization">
                </div>
                <div class="field">
                    <label for="position">Positiion</label>
                    <input type="text" name="position">
                </div>
                <div class="two fields">
                    <div class="field">
                        <label for="start_year">Start Year</label>
                        <input type="text" name="start_year">
                    </div>
                    <div class="field">
                        <label for="end_year">End Year</label>
                        <input type="text" name="end_year">
                    </div>
                </div>
                <button class = "ui green button" type="submit"> Add </button>
            </form>
            <form id = "deleteaff_form" action="{{route('aff.delete')}}" method="POST" class="ui form">
                {{csrf_field()}}
                <input type="hidden" name="deleteid" id = "deleteid">
            </form>
        </div>
    </div>
    <div id="deletemodal" class = "ui mini modal">
        <i class="icon close"></i> 
        <div class="header">CONFIRMATION</div>
        <div class="content">
            <p>Are you sure you want to delete this?</p>
        </div>
        <div class="actions">
            
        <button class="ui cancel button"> No </button>
        <button class="ui approve green button"> Yes </button>
        </div>
    </div>
</div>

@endsection

@section('subscripts')
<script>
$("#addaffiliation_button").click(() => {
    $("#addaffiliation_modal").modal('show')
})

function delete_aff (id) {
    $("#deleteid").val(id)
    $("#deletemodal").modal({
        onApprove: function () {
            $("form#deleteaff_form").submit()
        }
    })
    $("#deletemodal").modal('show')
}
</script>
@endsection
