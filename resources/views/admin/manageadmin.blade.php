@extends('layouts.dashboard')

@section('stylesheets')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('css/fontastic.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">
<link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('css/style.green.css') }}" id="theme-stylesheet">
<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/admindb.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('navbar')
<li>
	<a href="{{ route('home') }}"><i class="fa fa-home"></i><span>Home</span></a>
</li>
<li> 
    <a href="#sub-list" data-toggle="collapse" aria-expanded="false"><i class="fa fa-users"></i><span>Subscriber</span>
    <div class="arrow pull-right"><i class="fa fa-angle-down"></i></div></a>
    <ul id="sub-list" class="collapse list-unstyled">
        <li> <a href="{{ route('admin.manage.regid') }}">Manage Registered IDs</a></li>
        <li> <a href="{{ route('admin.manage.subs') }}">Manage Subscribers</a></li>
        <li> <a href="{{ route('admin.manage.payments') }}">Manage Payment</a></li>
        <li> <a href="{{ route('admin.manage.pictorial') }}">Manage Pictorial</a></li>
    </ul>
</li>
<li> 
    <a href="#announcement-list" data-toggle="collapse" aria-expanded="false"><i class="fa fa-paper-plane-o"></i><span>News</span>
    <div class="arrow pull-right"><i class="fa fa-angle-down"></i></div></a>
    <ul id="announcement-list" class="collapse list-unstyled">
        <li> <a href="{{ route('admin.create') }}">Add News</a></li>
        <li> <a href="{{ route('admin.manage.news') }}">Manage News</a></li>
    </ul>
</li>
@if ($role === "Administrator")
<li> 
    <a href="#admin-list" data-toggle="collapse" aria-expanded="false"><i class="fa fa-group"></i><span>Admin</span>
    <div class="arrow pull-right"><i class="fa fa-angle-down"></i></div></a>
    <ul id="admin-list" class="collapse list-unstyled">
        <li> <a href="{{ route('admin.manage.admin') }}">Manage Admin Accounts</a></li>
    </ul>
</li>
@endif
@endsection

@section('content')
<section class="dashboard-header section-padding">
    <div class="container-fluid">
        <h1>Manage Admin Accounts &nbsp; &nbsp; <button class="btn btn-info" id="addadmin"><i class="fa fa-plus"></i>&nbsp;Add Account</button></h1>
        <br>
        <table id="adminTable" class="table table-bordered" cellspacing="0" width="100%">
            <thead class="table-dark">
                <tr>
                    <th>ID Number</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($adminusers as $admin)
                <tr class="admin-row" data-id="{{ $admin->id }}" data-idnum="{{ $admin->idnum }}" data-email="{{ $admin->email }}" data-name="{{ $admin->name }}" data-position="{{ $admin->position }}" data-role="Administrator">
                    <td>{{ $admin->idnum }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->position }}</td>
                    <td>Administrator</td>
                </tr>
                @endforeach
                @foreach ($editusers as $edit)
                <tr class="admin-row" data-id="{{ $edit->id }}" data-idnum="{{ $edit->idnum }}" data-email="{{ $edit->email }}" data-name="{{ $edit->name }}" data-position="{{ $edit->position }}" data-role="Editor">
                    <td>{{ $edit->idnum }}</td>
                    <td>{{ $edit->name }}</td>
                    <td>{{ $edit->position }}</td>
                    <td>Editor</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

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

@section('javascripts')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"> </script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/grasp_mobile_progress_circle-1.0.0.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/front.js') }}"></script>
<script src="{{ asset('js/admindb.js') }}"></script>
@endsection
