@extends('admin.template', ["context"=>"admin.manage.pictorial"])

@section('substyles')
<style>
    div#pictorials {
        min-height: calc(100vh - 321px);
    }
</style>
@endsection

@section('content')
<div id = "pictorials" class = "ui brand page container">
    <h2>
        Pictorial Schedules
    </h2>
    @foreach($colleges as $college) 
    <div class = "ui segment"> 
        
        <div class = "ui accordion">
            <div class="title">
                <i class="dropdown icon"></i>
                <span class = "ui header"> {{$college->college}} </span>
            </div>
            <div class="content">
                <div class="buttons">
                    <form action="{{route('admin.manage.college')}}" method = "POST" class="ui form">
                        {{ csrf_field() }}
                        <input type="hidden" name="college" value="{{$college->id}}">
                        @if(isset($college->start_day))
                        <div class = "ui input"> 
                            <input type="date" name="start_date" id="start_date" value="{{$college->start_day}}">
                        </div>
                        @else
                        <div class = "ui input"> 
                            <input type="date" name="start_date" id="start_date">
                        </div>
                        @endif
                        
                        @if(isset($college->end_day))
                        <div class = "ui input"> 
                            <input type="date" name="end_date" id="end_date" value="{{$college->end_day}}">
                        </div>
                        @else
                        <div class = "ui input"> 
                            <input type="date" name="end_date" id="end_date">
                        </div>
                        @endif
                        <button class="ui green button">
                            Update
                        </button>
                    </form>
                </div>
                <table class="ui celled padded table">
                    <thead>
                        <tr>
                            <th class="header"> Date </th>
                            <th class="header"> Start Time </th>
                            <th class="header"> End Time </th>
                            <th class="header"> Slots Occupied </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($college->timeslots as $slots)
                        <tr>
                            <td> {{$slots->date}} </td>
                            <td> {{$slots->start_time}} </td>
                            <td> {{$slots->end_time}}</td>
                            <td> {{$slots -> total_slot - $slots->current_slot}}/{{$slots->total_slot}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endforeach
    
</div>
@endsection

@section('subscripts')
<script>    

@endsection
