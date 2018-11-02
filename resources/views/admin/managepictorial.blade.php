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
        <li class="active"> <a href="{{ route('admin.manage.pictorial') }}">Manage Pictorial</a></li>
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
        <h1>Manage Pictorial Schedule &nbsp; &nbsp; <button type="button" class="btn btn-success" id="schedulePhoto"><i class="fa fa-calendar-plus-o"></i>&nbsp; Schedule</button></h1>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <strong> Current Timeslot: </strong>{{ $currentTimeslot }}
                </div>
            </div><br>
            <form method="POST" action="{{ route('admin.view.timeslot') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-3">
                        <select id="college" class="form-control" onchange="changeDate();" name="tsscollege">
                            <option selected disabled>College</option>
                            <option value="1">RVR-COB</option>
                            <option value="2">CLA</option>
                            <option value="3">COE-SOE</option>
                            <option value="4">COS-CCS</option>
                            <option value="5">BAGCED-GS</option>
                            <option value="6">Newly Added</option>
                            <option value="7">Green & White</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select id="date" class="form-control" name="tssdate">
                            <option selected disabled>Date</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select id="time" class="form-control" name="tsstime">
                            <option selected disabled>Time</option>
                            <option value="9:00-9:45">9:00-9:45</option>
                            <option value="9:45-10:30">9:45-10:30</option>
                            <option value="10:30-11:15">10:30-11:15</option>
                            <option value="11:15-12:00">11:15-12:00</option>
                            <option value="13:00-13:45">13:00-13:45</option>
                            <option value="13:45-14:30">13:45-14:30</option>
                            <option value="14:30-15:15">14:30-15:15</option>
                            <option value="15:15-16:00">15:15-16:00</option>
                            <option value="16:00-16:45">16:00-16:45</option>
                            <option disabled>For Green & White Only</option>
                            <option value="9:00-13:45">9:00-13:45</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-block btn-info">View Timeslot</button>
                    </div>
                </div>
            </form>
        </div>
        <br>
        <table id="pictorialTable" class="table table-bordered" cellspacing="0" width="100%">
            <thead class="table-dark">
                <tr>
                    <th>ID Number</th>
                    <th>Name</th>
                    <th>College</th>
                    <th>Pictorial Schedule</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $r)
                    <tr class="pictorial-row" data-id="{{ $r->userId }}"
                    data-name="{{ $r->firstname }} {{ $r->lastname }}" data-college="{{ $r->college }}"  data-slot="{{ $r->slotId }}">
                        <td>{{ $r->userId }}</td>
                        <td>{{ $r->firstname }} {{ $r->lastname }}</td>
                        <td>{{ $r->college }}</td>
                        <td>
                            @switch($r->month)
                                @case(1)
                                    January
                                    @break

                                @case(2)
                                    February
                                    @break

                                @case(3)
                                    March
                                    @break
                            @endswitch
                            {{ $r->day }}, 2018 &nbsp;&nbsp; {{ $r->startTime }}-{{ $r->endTime }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

<div class="modal fade" tabindex="-1" role="dialog" id="schedModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Schedule Pictorial</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form method="POST" action="{{ route('admin.reserve.pictorial') }}">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="alert alert-info" role="alert">
                        If the subscriber already has a slot, it will automatically be rescheduled.
                    </div>
                    <label for="idn">ID Number</label>
                    <input type="text" class="form-control" id="idn" name="idnum" required>
                    
                    <label for="timeslot">Timeslot</label>
                    <select class="form-control" id="tsDate" onchange="timeslotDate();">
                        <option selected disabled>Choose Date</option>
                        <option disabled>CLA</option>
                        <option value="1/29">January 29, 2018</option>
                        <option value="1/30">January 30, 2018</option>
                        <option value="1/31">January 31, 2018</option>
                        <option value="2/1">February 1, 2018</option>
                        <option value="2/2">February 2, 2018</option>
                        <option value="2/17">February 17, 2018</option>
                        <option disabled>COE & SOE</option>
                        <option value="2/5">February 5, 2018</option>
                        <option value="2/6">February 6, 2018</option>
                        <option value="2/7">February 7, 2018</option>
                        <option value="2/8">February 8, 2018</option>
                        <option value="2/9">February 9, 2018</option>
                        <option value="2/10">February 10, 2018</option>
                        <option disabled>COS & CCS</option>
                        <option value="2/12">February 12, 2018</option>
                        <option value="2/13">February 13, 2018</option>
                        <option value="2/14">February 14, 2018</option>
                        <option value="2/15">February 15, 2018</option>
                        <option value="3/9">March 9, 2018</option>
                        <option value="2/17">February 17, 2018</option>
                        <option disabled>BAGCED & GS</option>
                        <option value="2/19">February 19, 2018</option>
                        <option value="2/20">February 20, 2018</option>
                        <option value="2/21">February 21, 2018</option>
                        <option value="2/22">February 22, 2018</option>
                        <option value="2/23">February 23, 2018</option>
                        <option value="2/24">February 24, 2018</option>
                        <option disabled>RVR-COB</option>
                        <option value="2/26">February 26, 2018</option>
                        <option value="2/27">February 27, 2018</option>
                        <option value="2/28">February 28, 2018</option>
                        <option value="3/1">March 1, 2018</option>
                        <option value="3/2">March 2, 2018</option>
                        <option value="3/3">March 3, 2018</option>
                        <option disabled>Newly Added</option>
                        <option value="3/5">March 5, 2018</option>
                        <option value="3/6">March 6, 2018</option>
                        <option value="3/7">March 7, 2018</option>
                        <option value="3/10">March 10, 2018</option>
                    </select>
                    <br>
                    <select class="form-control" id="tsTime" onchange="timeslotTime();">
                        <option selected disabled>Choose Time</option>
                        <option value="1">9:00 - 9:45</option>
                        <option value="2">9:45 - 10:30</option>
                        <option value="3">10:30 - 11:15</option>
                        <option value="4">11:15 - 12:00</option>
                        <option value="5">13:00 - 13:45</option>
                        <option value="6">13:45 - 14:30</option>
                        <option value="7">14:30 - 15:15</option>
                        <option value="8">15:15 - 16:00</option>
                        <option value="9">16:00 - 16:45</option>
                        <option disabled>For Green & White</option>
                        <option value="10">9:00 - 13:45</option>
                    </select>
                    <input type="hidden" name="month" id="month">
                    <input type="hidden" name="day" id="day">
                    <input type="hidden" name="startTime" id="startTime">
                    <input type="hidden" name="endTime" id="endTime">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Schedule</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
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
<script src="{{ asset('js/pictorial.js') }}"></script>
@endsection
