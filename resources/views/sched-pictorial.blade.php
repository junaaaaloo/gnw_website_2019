@extends('layouts.dashboard')

@section('stylesheets')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('css/fontastic.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.green.css') }}" id="theme-stylesheet">
<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/data-carousel.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('navbar')
<li>
    <a href="{{ route('home') }}"><i class="fa fa-home"></i><span>Home</span></a>
</li>
<li>
    <a href="{{ route('sub.basic') }}"><i class="fa fa-user"></i><span>Basic Information</span></a>
</li>
<li>
    <a href="{{ route('sub.payment') }}"><i class="fa fa-credit-card"></i><span>Payment Information</span></a>
</li>
<li>
    <a href="{{ route('sub.affiliations') }}"><i class="fa fa-star"></i><span>Affiliations</span></a>
</li>
<li>
    <a href="{{ route('sub.writeup') }}"><i class="fa fa-pencil-square-o"></i><span>Write Up</span></a>
</li>
<li class="active">
    <a href="{{ route('sched.pictorial') }}"><i class="fa fa-calendar-check-o"></i><span>Schedule Pictorial &nbsp; 
        <span class="badge badge-primary">Now Available!</span></span></a>
</li>
@endsection

@section('content')
<section class="updates section-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h2 class="h5 display display">Online Schedule for Pictorial</h2>
                    </div>
                    <div class="card-body">
                        @if ($subbie->college === null || $subbie->college === "" || $subbie->college === "-")
                            <div class="alert alert-primary" role="alert">
                                Kindly fill out your Basic Information first.
                            </div>
                        @elseif($isClosed === "true")
                            <div class="alert alert-danger" role="alert">
                                Online Scheduling for Pictorial is already closed.
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="college">College</label>
                                    <input type="text" class="form-control" placeholder="college" 
                                            name="college" value="{{ $subbie->college }}" disabled>
                                </div>
                                <div class="col-lg-6">
                                    <label for="chosen">Reserved Timeslot</label>
                                    @if ($status === 1)
                                        <input type="text" class="form-control" disabled placeholder="MM - DD - YYYY  HH:MM - HH:MM" value="0{{ $slot->month }} - {{ $slot->day }} - 2018  {{ $slot->startTime }} - {{ $slot->endTime }}">
                                    @else
                                        <input type="text" class="form-control" disabled placeholder="MM - DD - YYYY  HH:MM - HH:MM">
                                    @endif
                                </div>
                            </div>
                        @else
                        @if ($status === 1)
                            <div class="alert alert-success" role="alert">
                                You have successfully reserved a slot.
                            </div>
                        @else
                            <div class="alert alert-primary" role="alert">
                                In order to reserve a slot, you must check first whether your payment status in Yearbook, Photo, and Delivery are all <b>PAID</b>. You can see your payment status in the Payment Information page.
                            </div>
                        @endif
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="college">College</label>
                                <input type="text" class="form-control" placeholder="college" 
                                        name="college" value="{{ $subbie->college }}" disabled>
                            </div>
                            <div class="col-lg-6">
                                <label for="chosen">Reserved Timeslot</label>
                                @if ($status === 1)
                                    <input type="text" class="form-control" disabled placeholder="MM - DD - YYYY  HH:MM - HH:MM" value="0{{ $slot->month }} - {{ $slot->day }} - 2018  {{ $slot->startTime }} - {{ $slot->endTime }}">
                                    <form method="POST" action="{{ route('cancel.slot') }}">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-block">Cancel</button>
                                    </form>
                                @else
                                    <input type="text" class="form-control" disabled placeholder="MM - DD - YYYY  HH:MM - HH:MM">
                                @endif
                            </div>
                        </div>
                        @if ($status === 0)
                           <br> 
                           <span class="date-title">Choose Pictorial Date</span>
                            <div class="row">
                                @foreach ($dates as $date)
                                    @if ($selectedDate === $date->dayOfWeek)
                                       <div class="col-lg-2 date-cont" id="date-btn">
                                            <div class="date-item chosen" id="date-item" data-month="{{ $date->monthNum }}" data-date="{{ $date->date }}" data-day="{{ $date->dayOfWeek }}">
                                                {{ $date->month }} {{ $date->date }}, 2018<br>
                                                {{ $date->dayOfWeek }}
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-lg-2 date-cont" id="date-btn">
                                           <div class="date-item" id="date-item" data-month="{{ $date->monthNum }}" data-date="{{ $date->date }}" data-day="{{ $date->dayOfWeek }}">
                                                {{ $date->month }} {{ $date->date }}, 2018<br>
                                                {{ $date->dayOfWeek }}
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <br>
                            <form id="chooseDate" method="POST" action="{{ route('choose.date') }}">
                                {{ csrf_field() }}
                                <input type="hidden" id="month" name="month">
                                <input type="hidden" id="day" name="day">
                                <input type="hidden" id="dayWeek" name="dayWeek">
                            </form>
                            <span class="date-title">Choose Timeslot</span>
                            <div class="row">
                                @if ($hasTimeslots === 0)
                                    <div class="col-lg-12" id="noTimeslot">
                                        <h4 class="h4-timeslot">No timeslots available</h4>
                                    </div>
                                @else
                                    <div class="col-lg-12" id="timeslots">
                                        <div class="list-group">
                                            @foreach ($slots as $slot)
                                                @if($slot->currSlots >= $slot->totalSlots)
                                                    <li class="list-group-item disabled">
                                                        <div class="col-lg-6 slot-detail">
                                                            <h5 class="time">{{ $slot->startTime }} - {{ $slot->endTime }}</h5>
                                                            @switch($slot->month)
                                                                @case(1)
                                                                    <h5 class="date">January {{ $slot->day }}, 2018</h5>
                                                                @break
                                                                @case(2)
                                                                    <h5 class="date">February {{ $slot->day }}, 2018</h5>
                                                                @break
                                                                @case(3)
                                                                    <h5 class="date">March {{ $slot->day }}, 2018</h5>
                                                                @break
                                                            @endswitch
                                                        </div>
                                                        <div class="col-lg-6 slot-num pull-right">
                                                            {{ $slot->currSlots }}/{{ $slot->totalSlots }} slot/s &nbsp;&nbsp;
                                                        </div>
                                                    </li>
                                                @else
                                                    <li class="list-group-item">
                                                        <div class="col-lg-6 slot-detail">
                                                            <h5 class="time">{{ $slot->startTime }} - {{ $slot->endTime }}</h5>
                                                            @switch($slot->month)
                                                                @case(1)
                                                                    <h5 class="date">January {{ $slot->day }}, 2018</h5>
                                                                @break
                                                                @case(2)
                                                                    <h5 class="date">February {{ $slot->day }}, 2018</h5>
                                                                @break
                                                                @case(3)
                                                                    <h5 class="date">March {{ $slot->day }}, 2018</h5>
                                                                @break
                                                            @endswitch
                                                        </div>
                                                        <div class="col-lg-6 slot-num pull-right">
                                                            {{ $slot->currSlots }}/{{ $slot->totalSlots }} slot/s &nbsp;&nbsp;
                                                            <button type="button" id="reserveBtn" class="btn btn-default" data-id="{!! $slot->slotId !!}">Reserve Slot</button>
                                                        </div>
                                                    </li>
                                                @endif
                                            @endforeach
                                            <form id="reserveSlot" method="POST" action="{{ route('reserve.slot') }}">
                                                {{ csrf_field() }}
                                                <input type="hidden" id="slotId" name="slotId">
                                            </form>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                        @endif
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
<script src="{{ asset('js/date-carousel.js') }}"></script>
<script src="{{ asset('js/front.js') }}"></script>
@endsection
