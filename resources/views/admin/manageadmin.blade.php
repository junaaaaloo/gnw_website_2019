@extends('admin.template', ["context"=>"admin.manage.administrators"])

@section('substyles')
@endsection

@section('content')
<div id="manageadmin" class="ui container brand page">
    <h2>Manage Admin Accounts</h2>
    <button id = "addadmin_button" class="ui green button">
        <i class="icon user plus"> </i>
        Add Admin
    </button>
    <table id="adminTable" class="ui four column selectable celled padded table">
        <thead>
            <tr>
                <th>ID Number</th>
                <th>Name</th>
                <th>Position</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr onclick = "accessAdmin({{$user}}, {{$user->roles[0]}})">
                <td>{{ $user->idnum }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->position }}</td>
                <td>{{ $user->roles[0]->display_name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div id = "addadmin_modal" class="ui modal">
    <i class="close icon"></i> 
    <div class = "icon header">                       
        ADD ADMIN
    </div>
    <div class="scrolling content"> 
        <form class = "ui form" method="POST" action="{{ route('admin.store') }}">    
            {{ csrf_field() }}
            <div class="field">
                <label for="adminid">ID Number</label>
                <input type="text" id="addid" name="idnum" required>
            </div>
            <div class="field">
                <label for="adminname">Name</label>
                <input type="text" id="addname" name="name" required>
            </div>
            <div class="field">
                <label for="addemail">Email</label>
                <input type="email" id="addemail" name="email" required>
            </div>
            <div class="field">
                <label for="addpw">Password</label>
                <input type="password" id="addpw" name="password" required>
            </div>
            <div class="field">
                <label for="adminposition">Position</label>
                <select class="ui search dropdown" id="addposition" name="position" required>
                    <option value="Editor in Chief OIC">Editor in Chief</option>
                    <option value="Associate Editor OIC">Associate Editor</option>
                    <option value="Managing Editor OIC">Managing Editor</option>
                    <option value="Customer Care Manager">Customer Care Manager</option>
                    <option value="Marketing Manager">Marketing Manager</option>
                    <option value="Literary Editor">Literary Editor</option>
                    <option value="Photo Editor">Photo Editor</option>
                    <option value="Web Manager">Web Manager</option>
                    <option value="Customer Care Staffer">Customer Care Staffer</option>
                    <option value="Marketing Staffer">Marketing Staffer</option>
                    <option value="Literary Staffer">Literary Staffer</option>
                    <option value="Photo Staffer">Photo Staffer</option>
                    <option value="Web Staffer">Web Staffer</option>
                    <option value="Layout Staffer">Layout Staffer</option>
                    <option value="Office Staffer">Office Staffer</option>
                </select>
            </div>
            <div class="field">
                <label for="adminrole">Role</label>
                <select class="ui dropdown" id="addrole" name="role" required>
                    <option value="Administrator">Administrator</option>
                    <option value="Editor">Editor</option>
                </select>
            </div>
            <button type="submit" class="ui green button">
                <i class="icon user plus"></i>
                Add
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

<div id = "editadmin_modal" class="ui modal">
    <i class="close icon"></i> 
    <div class = "icon header">                       
        ADD ADMIN
    </div>
    <div class="content"> 
        <form class = "ui form" method="POST" action="{{ route('admin.store') }}">    
            {{ csrf_field() }}
            <input type="hidden" id="editid" name="idnum" required>
            <div class="field">
                <label for="editidnum">ID Number</label>
                <input type="text" id="editidnum" name="idnum" disabled required>
            </div>
            <div class="field">
                <label for="editname">Name</label>
                <input type="text" id="editname" name="name" required>
            </div>
            <div class="field">
                <label for="editemail">Email</label>
                <input type="email" id="editemail" name="email" required>
            </div>
            <div class="field">
                <label for="editposition">Position</label>
                <select class="ui dropdown" id="editposition" name="position" required>
                    <option value="Editor in Chief OIC">Editor in Chief</option>
                    <option value="Associate Editor OIC">Associate Editor</option>
                    <option value="Managing Editor OIC">Managing Editor</option>
                    <option value="Customer Care Manager">Customer Care Manager</option>
                    <option value="Marketing Manager">Marketing Manager</option>
                    <option value="Literary Editor">Literary Editor</option>
                    <option value="Photo Editor">Photo Editor</option>
                    <option value="Web Manager">Web Manager</option>
                    <option value="Customer Care Staffer">Customer Care Staffer</option>
                    <option value="Marketing Staffer">Marketing Staffer</option>
                    <option value="Literary Staffer">Literary Staffer</option>
                    <option value="Photo Staffer">Photo Staffer</option>
                    <option value="Web Staffer">Web Staffer</option>
                    <option value="Layout Staffer">Layout Staffer</option>
                    <option value="Office Staffer">Office Staffer</option>
                </select>
            </div>
            <div class="field">
                <label for="editrole">Role</label>
                <select class="ui dropdown" id="editrole" name="role" disabled required>
                    <option value="administrator">Administrator</option>
                    <option value="editor">Editor</option>
                </select>
            </div>
            <button type="submit" class="ui green button">
                <i class="icon save"></i>
                Save
            </button>
            <button id = "deletebutton" onclick = "event.preventDefault(); deleteAdmin()" class="ui red button">
                <i class="icon user times"></i>
                Delete
            </button>
            @if ($errors->any())
            <div class="ui red message">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
            @endif
        </form>
        <form id="deleteadmin" method="POST" action="{{ route('admin.delete') }}">
            {{ csrf_field() }}
            <input type="hidden" id="deleteid" name="deleteid">
        </form>
    </div>
</div>
@endsection

@section('subscripts')
<script>
let user = {!!Auth::user()!!}
$("#addadmin_button").click(() => {
    $("#addadmin_modal").modal("show")
})

function accessAdmin (admin, role) {
    $("#editid").val(admin.id)
    $("#editidnum").val(admin.idnum)
    $("#editname").val(admin.name)
    $("#editemail").val(admin.email)
    $("#editposition").dropdown("set selected", admin.position)
    $("#editrole").dropdown("set selected", role.name)

    if (admin.id == user.id)
        $("#deletebutton").hide()
    else {
        $("#deletebutton").show()
        $("#deleteid").val(admin.id)
    }

    $("#editadmin_modal").modal("show")
}

function resetModal () {
    $("#editid").val()
    $("#editidnum").val()
    $("#editname").val()
    $("#editemail").val()
    $("#editposition").dropdown("set selected", null)
    $("#editrole").dropdown("set selected", null)
}

function deleteAdmin (id) {
    $("form#deleteadmin").submit()
}
</script>
@endsection
