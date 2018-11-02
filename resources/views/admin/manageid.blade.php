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
        <li class="active"> <a href="{{ route('admin.manage.regid') }}">Manage Registered IDs</a></li>
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
        <h1>Manage Registered IDs &nbsp; &nbsp; <button class="btn btn-info" id="addID"><i class="fa fa-plus"></i>&nbsp;Add new ID</button></h1>
        <small class="form-text text-muted">Status meanings: (1) Pending - Subscribed already but haven't answered the survey yet; (2) Active - Subscribed and finished answering the survey; (3) Inactive - Haven't subscribed yet.</small>
        <br>
        <table id="idTable" class="table table-bordered" cellspacing="0" width="100%">
            <thead class="table-dark">
                <tr>
                    <th>ID Number</th>
                    <th>Status</th>
                    <th>Created/Updated By</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($regIds as $regId)
                <tr class="reg-row" data-id="{{ $regId->id }}" data-idnum="{{ $regId->idnum }}" data-status="{{ $regId->status }}">
                    <td>{{ $regId->idnum }}</td>
                    @switch($regId->status)
                        @case(1)
                        <td>Active</td>
                        @break
                        
                        @case(-1)
                        <td>Inactive</td>
                        @break
                        
                        @case(0)
                        <td>Pending</td>
                        @break
                    @endswitch
                    <td>{{ $regId->added_by }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

<div class="modal fade" tabindex="-1" role="dialog" id="addIDModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('id.create') }}">
                {{ csrf_field() }}
                <div class="modal-header">
                    <h5 class="modal-title">Add ID</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" name="idnum" placeholder="ID Number">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="editIDModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit ID</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('id.edit') }}">
                {{ csrf_field() }}
                <div class="modal-body">
                        <div class="form-group">
                            <label for="editidstatus">Status</label>
                            <input type="text" class="form-control" id="editidstatus" disabled>
                        </div>
                        <div class="form-group">
                            <label for="editidnum">ID Number</label>
                            <input type="text" class="form-control" name="editidnum" id="editidnum">
                        </div>
                        <input type="hidden" id="editid" name="editid">
                </div>
                <div class="modal-footer">
                    <div id="editIDBtn">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
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
