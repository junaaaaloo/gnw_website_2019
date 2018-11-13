@extends('admin.template', ["context"=>"admin.manage.registeredIDs"])

@section('substyles')
<style>
    div#manageids {
        min-height: calc(100vh - 321px);
    }
</style>
@endsection

@section('content')
<div id = "manageids" class = "ui brand page container">
    <h2>
        Manage Registered IDs
    </h2>
    <p>Status meanings: 
        <br> (1) <i class="icon yellow time"></i> Pending - Subscribed already but haven't answered the survey yet; 
        <br> (2) <i class="icon green check"></i> Active - Subscribed and finished answering the survey; 
        <br> (3) <i class="icon red times"></i> Inactive - Haven't subscribed yet.
    </p>
    <th colspan = 5">
        <form class = "ui form" id = "filtersort" method="GET">
            <input name = "direction" type="hidden" value = "{{Request::get('direction')}}">
            <input name = "sort" type="hidden" value = "{{Request::get('sort')}}">
            <div class="ui two fields">  
                <div class="field">
                    <div class="ui action input">
                        <input name = "filter" type="text" value="{{Request::get('filter')}}">
                        <button type = "submit" class="ui button">
                            <i class="icon search"> </i>
                            Search
                        </button>
                    </div>
                </div>
                <div class="field">
                    <button id = "addid_button" class="ui column green button">
                        <i class="icon address card"> </i>
                        Add ID
                    </button>
                </div>
            </div>
        </form>
    </th>
    <table class="ui four column celled selectable sortable padded table">
        <thead>
            <tr class = "sortable">
                <th class = "header {{Request::get('direction') == 'ASC' && Request::get('sort') == 'created_at' ? 'ascending' : 'descending'}} {{Request::get('sort') == 'created_at' ? 'sorted' : ''}} " data-column="created_at">Created At</th>
                <th class = "header {{Request::get('direction') == 'ASC' && Request::get('sort') == 'idnum' ? 'ascending' : 'descending'}} {{Request::get('sort') == 'idnum' ? 'sorted' : ''}} " data-column="idnum">ID Number</th>
                <th class = "header {{Request::get('direction') == 'ASC' && Request::get('sort') == 'status' ? 'ascending' : 'descending'}} {{Request::get('sort') == 'status' ? 'sorted' : ''}}" data-column="status">Status</th>
                <th class = "header {{Request::get('direction') == 'ASC' && Request::get('sort') == 'added_by' ? 'ascending' : 'descending'}} {{Request::get('sort') == 'added_by' ? 'sorted' : ''}}" data-column="added_by">Added By</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($regIds as $regId)
            <tr onclick="accessRegisteredID({{$regId}})">
                <td>{{ $regId->created_at }}</td>
                <td>{{ $regId->idnum }}</td>
                @switch($regId->status)
                    @case(1)
                    <td><i class="icon green check"></i> Active</td>
                    @break
                    
                    @case(-1)
                    <td><i class="icon red times"></i> Inactive</td>
                    @break
                    
                    @case(0)
                    <td><i class="icon yellow time"></i> Pending</td>
                    @break
                @endswitch
                <td>{{ $regId->added_by }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                @if ($regIds->count() == 0) 
                <th colspan = 5">
                    No results returned. 
                </th>
                @else
                <th colspan = 5">
                    {{ $regIds->appends(["filter" => Request::get('filter'), "direction" => Request::get('direction'), "sort" => Request::get('sort')])->links('layouts.pagination')}} 
                </th>
                @endif
            </tr>
        </tfoot>
    </table>
</div>

<div id = "editid_modal" class="ui modal">
    <i class="close icon"></i> 
    <div class = "icon header">                       
        <img src="{{ asset('favicon/favicon-16x16.png')}}">
        EDIT ID
    </div>
    <div class="content"> 
        <form class = "ui large form" method="POST" action="{{ route('id.edit') }}">    
            {{ csrf_field() }}
            <div class = "wide field">
                <label for="editidstatus">Status</label>
                <div id="editidstatus" class="ui disabled dropdown selection">
                    <input type="hidden" name="editidstatus">
                    <div class="text"> </div>
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <div class="item" data-value="1"> 
                            <i class="icon green check"> </i>
                            Active
                        </div>
                        <div class="item" data-value="0">
                            <i class="icon yellow clock"> </i>
                            Pending
                        </div>
                        <div class="item" data-value="-1">
                            <i class="icon red times"> </i>
                            Inactive
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class = "wide field">
                <label for="editidnum">ID Number</label>
                <input type="text" name="editidnum" id="editidnum">
            </div>
            <input type="hidden" id="editid" name="editid">
            <button type="submit" class="ui green button"> 
                <i class="icon pencil"></i>
                EDIT 
            </button>
            <button onclick="event.preventDefault(); deleteID();" class="ui red button"> 
                <i class="icon times"></i>
                DELETE 
            </button>
            @if ($errors->any())
            <div class="ui red message">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
            @endif
        </form>
        <form id="deleteid_form" method="POST" action="{{ route('id.delete') }}">
            {{ csrf_field() }}
            <input type="hidden" id="deleteid" name="deleteid">
        </form>
    </div>
</div>
<div id = "addid_modal" class="ui small modal">
    <i class="close icon"></i> 
    <div class = "icon header">                       
        ADD ID
    </div>
    <div class="content"> 
        @if ($errors->any())
        <div class="ui red message">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
        @endif
        <form class = "ui large form" method="POST" action="{{ route('id.create') }}">    
            {{ csrf_field() }}
            <div class = "wide field">
                <label for="idnum">ID Number</label>
                <input type="text" name="idnum">
            </div>
            <button type="submit" class="ui green button"> 
                <i class="icon address card"></i>
                ADD ID 
            </button>
        </form>
        <div class="ui horizontal divider">
            OR
        </div>
        <form class = "ui large form" method="POST" action="{{ route('id.csv') }}">    
            {{ csrf_field() }}
            <div class = "wide field">
                <label for="reg_ids">File </label>
                <textarea  name="text_id"></textarea>
            </div>
            <button type="submit" class="ui green button"> 
                <i class="icon address card"></i>
                UPLOAD 
            </button>
        </form>
    </div>
</div>
@endsection

@section('subscripts')
<script>    
$("th.header").on('click', (evt) => {
    let column = $(evt.target).data('column')
    let direction = $(evt.target).hasClass('ascending') ? "DESC" : "ASC"
    $('form#filtersort input[name="sort"]').val(column)
    $('form#filtersort input[name="direction"]').val(direction)
    $("form#filtersort").submit()
});

$("#addid_button").click((evt) => {
    evt.preventDefault()
    $("#addid_modal").modal('show')
})

function deleteID () {
    $("form#deleteid_form").submit()
}

function accessRegisteredID (regID) {
    $("#editid").val(regID.id)
    $("#editidnum").val(regID.idnum)
    $("#editidstatus").dropdown('set selected', regID.status)
    
    $("#deleteid").val(regID.id)

    $("#editid_modal").modal('show')
}
</script>
@endsection
