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
<li class="active">
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
        <li class="d-flex justify-content-between">
            <div class="left-col d-flex">
                <div class="title">
                    <strong>Hi {!! Auth::user()->name !!}!</strong>
                    <p>Today is {!! $date_today !!}. <br> Below are the subscriber statistics.</p>
                </div>
            </div>
        </li>
    </div>
</section>

<section class="dashboard-counts section-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-md-5 col-7">
                <div class="wrapper count-title d-flex">
                    <div class="icon"><i class="fa fa-user"></i></div>
                    <div class="name"><strong class="text-uppercase">Number of Registered IDs</strong><span>Since November 22, 2017</span>
                        <div class="count-number">{!! $regIds !!}</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-5 col-7">
                <div class="wrapper count-title d-flex">
                    <div class="icon"><i class="fa fa-edit"></i></div>
                    <div class="name"><strong class="text-uppercase">Survey Answers</strong><span>Since November 22, 2017</span>
                        <div class="count-number">{!! $surveys !!}</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-5 col-7">
                <div class="wrapper count-title d-flex">
                    <div class="icon"><i class="fa fa-user"></i></div>
                    <div class="name"><strong class="text-uppercase">Number of Subscribers</strong><span>Since November 22, 2017</span>
                        <div class="count-number">{!! $subbies !!}</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-5 col-7">
                <div class="wrapper count-title d-flex">
                    <div class="icon"><i class="fa fa-money"></i></div>
                    <div class="name"><strong class="text-uppercase">Number of Paid Subscribers</strong><span>Since November 22, 2017</span>
                        <div class="count-number">{!! $paid !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
