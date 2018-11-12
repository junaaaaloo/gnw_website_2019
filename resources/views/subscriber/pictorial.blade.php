@extends('subscriber.template', ["context" => "subscriber.pictorial"])

@section('substyles')
<style>
    div#pictorial {
        min-height: calc(100vh - 332px);
    }
</style>
@endsection

@section('subcontent')
<div id = "pictorial" class = "ui brand page container">
    <h2 class = "ui header">
        Online Schedule for Pictorial
    </h2>
    
    <div class="ui red message" role="alert">
        Kindly fill out your Basic Information first.
    </div>

    <div class="ui green message" role="alert">
        You have successfully reserved a slot.
    </div>

    <div class="ui primary message" role="alert">
        In order to reserve a slot, you must check first whether your payment status in Yearbook, Photo, and Delivery are all <b>PAID</b>. <br>
        You can see your payment status in the <a href = "{{route('sub.payment')}}"> <b> Payment Information </b> </a> page.
    </div>

    <div class = "ui form">
        <div class="two fields">
            <div class="field">
                <label for="college"> College </label>
                <input type="text" name = "college" value = "{{$subbie->college}}" disabled>
            </div>
            <div class="field">
                <label for="college"> Reserved Timeslot </label>
                <input type="text" disabled placeholder="MM - DD - YYYY  HH:MM - HH:MM" value="0{{ $slot->month }} - {{ $slot->day }} - 2018  {{ $slot->startTime }} - {{ $slot->endTime }}">
            </div>
        </div>
        <div class="two fields">
            <div class="field"> </div>
            <div class="field">
                <form class = "ui right floated" method="POST" action="{{ route('cancel.slot') }}">
                    {{ csrf_field() }}
                    <button type="submit" class="ui right floated red button">Cancel</button>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($subbie->college === null || $subbie->college === "" || $subbie->college === "-")
            <div class="alert alert-primary" role="alert">
                Kindly fill out your Basic Information first.
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
@endsection

@section('subscripts')

@endsection
