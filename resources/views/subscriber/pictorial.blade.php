@extends('admin.template', ["context"=>"admin.manage.pictorial"])

@section('substyles')
<style>
    div#pictorials {
        min-height: calc(100vh - 332px);
    }

    div.filler {
        padding-top: 20px;
    }
</style>
@endsection

@section('content')
<div id = "pictorials" class = "ui brand page container">
    <div class="ui accordion">
        <div class="active title">
            <i class="dropdown icon"></i>
            <span class = "ui header"> Timeslot </span>
        </div>
        <div class="active content">
            @if(!isset($reservation))  
            <div class="ui blue message">
                Schedule your appointment today!
            </div>
            @else
            <div class = "ui segment">
                <p>Please be there 10 minutes before the scheduled time slot.</p>
                <label class = "ui compact">    
                    <i class="icon calendar"></i>                    
                    {{$reservation->slot->date}}
                </label>
                <br>
                <label  class = "ui compact">  
                    <i class="icon clock"></i>
                    {{$reservation->slot->start_time}} - 
                    {{$reservation->slot->end_time}}
                </label>
                <form action="{{route('subscriber.schedule.cancel')}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="slot_id" value="{{$reservation->slotId}}">
                    <div class = "filler">
                        <button class="ui red button"> 
                        <i class="icon times"></i>
                        Cancel Schedule 
                        </button>
                    </div>
                </form>
            </div>
            @endif
        </div>
    </div>
    <div class = "ui accordion">
        <div class="active title">
            <i class="dropdown icon"></i>
            <span class = "ui header"> Time Slots </span>
        </div>
        <div class="active content">
            @if(!isset($college))
            <div class="ui red message">
                Set up your basic information first!
            </div>
            @else
            <table class="ui celled padded table">
                <thead>
                    <tr>
                        <th class="header"> Date </th>
                        <th class="header"> Start Time </th>
                        <th class="header"> End Time </th>
                        <th class="header"> Slots Occupied </th>
                        <th class="header"> Actions </th>
                    </tr>
                </thead>
                <tbody>
                <tbody>
                    @foreach($timeslots as $slots)
                    <tr>
                        <td> {{$slots->date}} </td>
                        <td> {{$slots->start_time}} </td>
                        <td> {{$slots->end_time}}</td>
                        <td> {{$slots -> total_slot - $slots->current_slot}}/{{$slots->total_slot}}</td>
                        <td>
                            <form action="{{route('subscriber.schedule')}}" method = "POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="slot_id" value = "{{$slots->id}}">
                                <button class="ui icon green button {{$reservation?'disabled':''}}"> 
                                    <i class="icon clock"></i> Schedule 
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection

@section('subscripts')
<script>    

@endsection
