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
        <li class="active"> <a href="{{ route('admin.manage.news') }}">Manage News</a></li>
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
        <h1>Manage News/Announcements</h1>
        <br>
        <table id="newsTable" class="table table-bordered" cellspacing="0" width="100%">
            <thead class="table-dark">
                <tr>
                    <th>Subject</th>
                    <th>Created/Updated By</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($announcements as $announcement)
                <tr class="news-row" data-subject="{{ $announcement->subject }}" data-id="{{ $announcement->id }}" data-message="{{ $announcement->message }}" data-user="{{ Auth::user()->name }}">
                    <td>{{ $announcement->subject }}</td>
                    <th>{{ $announcement->created_by }}</th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

<div class="modal fade" tabindex="-1" role="dialog" id="manageNewsModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Manage</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="managesubject">Subject/Title</label>
                                <input type="text" class="form-control" id="managesubject" disabled>
                    </div>
                    <div class="form-group">
                        <label for="managemessage">Message</label>
                                <textarea type="text" class="form-control" id="managemessage" rows="11" wrap="hard" disabled></textarea>
                    </div>
                </form>
            </div>

            <form id="editNewsMethod" method="POST" action="{{ route('news.edit') }}">
                {{ csrf_field() }}
                <input type="hidden" id="editsubject" name="editsubject">
                <input type="hidden" id="editmessage" name="editmessage">
                <input type="hidden" id="editby" name="editby">
                <input type="hidden" id="editid" name="editid">
                {{ csrf_field() }}
            </form>

            <form id="deleteNewsMethod" method="POST" action="{{ route('news.delete') }}">
                {{ csrf_field() }}
                <input type="hidden" id="deleteid" name="deleteid">
                {{ csrf_field() }}
            </form>

            <div class="modal-footer">
                <div id="manageBtns">
                    <button type="button" class="btn btn-primary" id="manageedit">Edit</button>
                    <button type="button" class="btn btn-danger" id="managedelete">Delete</button>
                </div>
                <div id="submitedit">
                    <button type="button" class="btn btn-primary" id="editNewsBtn">Edit</button>
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
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
