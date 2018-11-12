@extends('admin.template', ["context"=>"admin.manage.subscribers"])

@section('substyles')
<style>
    div#managesubscribers {
        min-height: calc(100vh - 321px);
    }
</style>
@endsection

@section('content')
<div id = "managesubscribers" class = "ui brand page container">    
    <h2>Manage Subscribers</h2>
    <p>Status meanings: 
        <br> (1) <i class="icon yellow time"></i> Pending - Subscribed already but haven't answered the survey yet; 
        <br> (2) <i class="icon green check"></i> Active - Subscribed and finished answering the survey; 
        <br> (3) <i class="icon red times"></i> Inactive - Haven't subscribed yet.
    </p>
    
    <form id = "filtersort" method="GET">
        <input name = "direction" type="hidden" value = "{{Request::get('direction')}}">
        <input name = "sort" type="hidden" value = "{{Request::get('sort')}}">
        <div class="ui action input">
            <input name = "filter" type="text" value="{{Request::get('filter')}}">
            <button type = "submit" class="ui button">
                <i class="icon search"> </i>
                Search
            </button>
        </div>
    </form>
    <table class="ui six column celled selectable sortable padded table">
        <thead>
            <tr class = "sortable">
                <th class = "header {{Request::get('direction') == 'ASC' && Request::get('sort') == 'created_at' ? 'ascending' : 'descending'}} {{Request::get('sort') == 'created_at' ? 'sorted' : ''}} " data-column="created_at">Created At</th>
                <th class = "header {{Request::get('direction') == 'ASC' && Request::get('sort') == 'idnum' ? 'ascending' : 'descending'}} {{Request::get('sort') == 'idnum' ? 'sorted' : ''}} " data-column="idnum">ID Number</th>
                <th class = "header {{Request::get('direction') == 'ASC' && Request::get('sort') == 'firstname' ? 'ascending' : 'descending'}} {{Request::get('sort') == 'firstname' ? 'sorted' : ''}}" data-column="firstname">First Name</th>
                <th class = "header {{Request::get('direction') == 'ASC' && Request::get('sort') == 'middlename' ? 'ascending' : 'descending'}} {{Request::get('sort') == 'middlename' ? 'sorted' : ''}}" data-column="middlename">Middle Name</th>
                <th class = "header {{Request::get('direction') == 'ASC' && Request::get('sort') == 'lastname' ? 'ascending' : 'descending'}} {{Request::get('sort') == 'lastname' ? 'sorted' : ''}}" data-column="lastname">Last Name</th>
                <th class = "header {{Request::get('direction') == 'ASC' && Request::get('sort') == 'college' ? 'ascending' : 'descending'}} {{Request::get('sort') == 'college' ? 'sorted' : ''}}" data-column="college">College</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subbies as $sub)
            <tr onclick = accessSubscriber('{{ $sub->id }}') class = "clickable">
                <td>{{ $sub->created_at }}</td>
                <td>{{ $sub->idnum }}</td>
                <td>{{ $sub->firstname }}</td>
                <td> {{ $sub->middlename }} </td>
                <td> {{ $sub->lastname }} {{ $sub->suffix }}</td>
                <td>{{ $sub->college }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                @if ($subbies->count() == 0) 
                <th colspan = 6>
                    No results returned. 
                </th>
                @else
                <th colspan = 6>
                    {{ $subbies->appends(["filter" => Request::get('filter'), "direction" => Request::get('direction'), "sort" => Request::get('sort')])->links('layouts.pagination')}} 
                </th>
                @endif
            </tr>
        </tfoot>
    </table>
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

function accessSubscriber (id) {
    window.location.href = "/manage/subscriber/" + id
}
</script>
@endsection
