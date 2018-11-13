@extends('admin.template', ["context"=>"admin.manage.announcements"])

@section('substyles')
<style>
    div#managenews {
        min-height: calc(100vh - 321px);
    }
</style>
@endsection


@section('substyles')
<style>

</style>
@endsection

@section('content')
<div id="managenews" class="ui container brand page">
    <h2>Manage Announcements</h2>
    <button class = "ui green addnews_button button">
        Create Announcement
    </button>
    <table class="announcments ui selectable three column table celled padded">
        <thead class="table-dark">
            <tr>
                <th> Subject</th>
                <th> Created/Updated By</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($announcements as $announcement)
            <tr onclick="accessAnnouncement({{$announcement}})">
                <td>{{ $announcement->subject }}</td>
                <td>{{ $announcement->created_by }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div id = "addnews_modal" class="ui modal">
        <i class="icon close"></i>
        <div class = "icon header">                       
            CREATE ANNOUNCEMENT
        </div>
        <div class="content"> 
            <form class = "ui form" method="POST" action="{{ route('news.store') }}">
                {{ csrf_field() }}
                
                <div class="field">
                    <label for="message">Subject/Title</label>
                    <input type="text" id="message" name = "subject">
                </div>
                <div class="field">
                    <label for="message">Created By</label>
                    <input type="text" name = "created_by" id="addnews_createdby" readonly>
                </div>
                <div class="field">
                    <label for="message">Message</label>
                    <textarea type="text" rows="11" wrap="hard" name="message"></textarea>
                </div>
                <button type="submit" class="ui green button"> 
                    <i class="icon paper plane"></i>
                    POST
                </button>
                @if ($errors->any())
                <div class="ui red message">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
                @endif
            </form>
        </div>
    </div>
    <div id="viewnews_modal" class="ui modal">
        <i class="icon close"></i>
        <div class="content">
            <form class = "ui centered form" method="POST" action="{{ route('news.edit') }}">
                {{ csrf_field() }}
                
                <div class="field">
                    <label for="message">Subject</label>
                    <input type="text" id="editsubject" name="editsubject">
                </div>
                <div class="field">
                    <label for="message">Created By</label>
                    <input type="text" id="editby" name="editby" readonly>
                </div>
                <div class="field">
                    <label for="message">Message</label>
                    <textarea type="text" id = "editmessage" name="editmessage" rows="11" wrap="hard"></textarea>
                </div>
                <input type="hidden" id="editid" name="editid">
                <button id= "update" class="ui green button"> 
                    <i class="icon paper plane"></i>
                    UPDATE
                </button>
                <button onclick="event.preventDefault(); deleteNews();" class="ui red button"> 
                    <i class="icon times"></i>
                    DELETE
                </button>
            </form>
            <form id="deletenews" method="POST" action="{{ route('news.delete') }}">
                <input type="hidden" id="deleteid" name="deleteid">
                {{ csrf_field() }}
            </form>
        </div>
        
    </div>
</div>
@endsection

@section('subscripts')
<script>
let user = "{{Auth::user()->name}}"
$(".addnews_button").click(() => {
    $("#addnews_createdby").val(user)
    $("#addnews_modal").modal('show')
})

function deleteNews (event) {
    $("form#deletenews").submit();
}

function accessAnnouncement (announcement) {
    $("#view_subject").val(announcement.subject)
    $("#view_message").val(announcement.message)
    $("#view_createdby").val(announcement.created_by)
    $("#editsubject").val(announcement.subject)
    $("#editmessage").val(announcement.message)
    $("#editid").val(announcement.id)
    $("#editby").val(user)

    $("#deleteid").val(announcement.id)
    $("#viewnews_modal").modal('show')
}
</script>
@endsection
