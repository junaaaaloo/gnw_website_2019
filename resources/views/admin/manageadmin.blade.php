@extends('admin.template', ["context"=>"admin.manage.administrators"])

@section('substyles')
@endsection

@section('content')
<div id="manageadmin" class="ui container brand page">
    <h2>Manage Admin Accounts</h2>
    <button class="ui green button">
        <i class="icon user plus"> </i>
        Add Admin
    </button>
    <table id="adminTable" class="ui celled padded table">
        <thead>
            <tr>
                <th>ID Number</th>
                <th>Name</th>
                <th>Position</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($adminusers as $admin)
            <tr class="admin-row" >
                <td>{{ $admin->idnum }}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->position }}</td>
                <td>Administrator</td>
            </tr>
            @endforeach
            @foreach ($editusers as $edit)
            <tr class="admin-row" >
                <td>{{ $edit->idnum }}</td>
                <td>{{ $edit->name }}</td>
                <td>{{ $edit->position }}</td>
                <td>Editor</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



<div class="modal fade" tabindex="-1" role="dialog" id="addAdminModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addAdminMethod" method="POST" action="{{ route('admin.store') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="adminid">ID Number</label>
                                <input type="text" class="form-control" id="addid" name="idnum" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="adminname">Name</label>
                                <input type="text" class="form-control" id="addname" name="name" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="addemail">Email</label>
                                <input type="email" class="form-control" id="addemail" name="email" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="addpw">Password</label>
                                <input type="password" class="form-control" id="addpw" name="password" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="adminposition">Position</label>
                                <select class="form-control" id="addposition" name="position" required>
                                    <option value="Editor in Chief OIC">Editor in Chief OIC</option>
                                    <option value="Associate Editor OIC">Associate Editor OIC</option>
                                    <option value="Managing Editor OIC">Managing Editor OIC</option>
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
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="adminrole">Role</label>
                                <select class="form-control" id="addrole" name="role" required>
                                    <option value="Administrator">Administrator</option>
                                    <option value="Editor">Editor</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="adminadd">Add</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="ui modal">
    
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="manageAdminModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Manage</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editAdminMethod" method="POST" action="{{ route('admin.edit') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="adminid">ID Number</label>
                                <input type="text" class="form-control" id="adminid" name="idnum" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="adminname">Name</label>
                                <input type="text" class="form-control" id="adminname" name="name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="adminemail">Email</label>
                                <input type="text" class="form-control" id="adminemail" name="email" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="adminposition">Position</label>
                                <select id="adminposition" class="form-control" name="position">
                                    <option value="Editor in Chief OIC">Editor in Chief OIC</option>
                                    <option value="Associate Editor OIC">Associate Editor OIC</option>
                                    <option value="Managing Editor OIC">Managing Editor OIC</option>
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
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="adminrole">Role</label>
                                <select id="adminrole" class="form-control" name="role" disabled>
                                    <option value="Administrator">Administrator</option>
                                    <option value="Editor">Editor</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="id" name="id">
                        <button type="submit" class="btn btn-primary" id="adminedit">Edit</button>
                        <button type="button" class="btn btn-danger" id="admindelete">Delete</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>   

            <form id="deleteAdminMethod" method="POST" action="{{ route('admin.delete') }}">
                {{ csrf_field() }}
                <input type="hidden" id="deleteid" name="deleteid">
                {{ csrf_field() }}
            </form> 
        </div>
    </div>
</div>
@endsection

@section('subscripts')

@endsection
