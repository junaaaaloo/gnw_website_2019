<?php

namespace App\Http\Controllers\Admin;

use App\Payment;
use App\Timeslot;
use App\SchedDate;
use App\Reservation;
use App\Subscriber;
use App\RegisteredIds;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SchedPictorialController extends Controller {
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin_editor');
    }

    public function index() {
        $user = Auth::user();
        $title = "Schedule Pictorial";
        $isClosed = "true";

        if($user->hasRole('subscriber')) {
            $reg = RegisteredIds::where('idnum', $user->idnum)->first();
            if($reg->status == 0) {
                return redirect()->route('survey');
            } else if($reg->status == 1) {
            	$subbie = Subscriber::where('idnum', $user->idnum)->first();
            	$college = $subbie->college;
            	$reservation = null;
            	$reservation = Reservation::where('userId', $user->idnum)->first();
            	// if($reservation != null) {
            	// 	$slot = Timeslot::where('slotId', $reservation->slotId)->first();
            	// 	return view('subscriber/pictorial', ['title' => $title, 'role' => 'Subscriber', 'subbie' => $subbie, 'status' => 1, 'slot' => $slot, 'isClosed' => $isClosed]);	
            	// } else {
            		$dates = null;
	            	switch($college) {
	            		case "Ramon V. del Rosario College of Business (RVR-COB)":
	            			$dates = SchedDate::where('collegeid', 1)->get();
	            			break;
	            		case "College of Liberal Arts (CLA)":
	            			$dates = SchedDate::where('collegeid', 2)->get();
	            			break;
	            		case "Gokongwei College of Engineering (GCOE)":
	            			$dates = SchedDate::where('collegeid', 3)->get();
	            			break;
	            		case "School of Economics (SOE)":
	            			$dates = SchedDate::where('collegeid', 6)->get();
	            			break;
	            		case "College of Science (COS)":
	            			$dates = SchedDate::where('collegeid', 4)->get();
	            			break;
	            		case "College of Computer Studies (CCS)":
	            			$dates = SchedDate::where('collegeid', 5)->get();
	            			break;
	            		case "Br. Andrew Gonzalez FSC College of Education (BAGCED)":
	            			$dates = SchedDate::where('collegeid', 7)->get();
	            			break;
	            		case "Graduate Studies (GS)":
	            			$dates = SchedDate::where('collegeid', 8)->get();
	            			break;
                    }
                    
            		return view('subscriber/pictorial', ['title' => $title, 'role' => 'Subscriber', 'subbie' => $subbie, 'status' => 0, 'dates' => $dates, 'hasTimeslots' => 0, 'selectedDate' => "none", 'slots' => null, 'slot' => Timeslot::where('slotId', $reservation->slotId)->first(), 'isClosed' => $isClosed]);
            	// }
                
            }
        } else if ($user->hasRole('administrator') || $user->hasRole('editor')) {
            $reservations = DB::table('reservations')
                        ->join('timeslots', 'reservations.slotId', '=', 'timeslots.slotId')
                        ->join('subscribers', 'subscribers.idnum', '=', 'reservations.userId')
                        ->select('reservations.userId', 'subscribers.firstname', 'subscribers.lastname', 'subscribers.college', 'timeslots.startTime', 'timeslots.endTime', 'timeslots.month', 'timeslots.day', 'reservations.slotId')
                        ->get();
            $timeslots = Timeslot::all();
            return view('admin/managepictorial', ['title' => $title, 'role' => 'Administrator', 'reservations' => $reservations, 'timeslots' => $timeslots, 'currentTimeslot' => "All"]);
        }
    }
    
    public function view(Request $request)
    {
        $user = Auth::user();
        $title = "Schedule Pictorial";
        $isClosed = "true";

        if($user->hasRole('subscriber')) {
            $reg = RegisteredIds::where('idnum', $user->idnum)->first();
            if($reg->status == 0) {
                return redirect()->route('survey');
            } else if($reg->status == 1) {
            	$subbie = Subscriber::where('idnum', $user->idnum)->first();
            	$college = $subbie->college;
            	$reservation = null;
            	$reservation = Reservation::where('userId', $user->idnum)->first();
            	if($reservation != null) {
            		$slot = Timeslot::where('slotId', $reservation->slotId)->first();
            		return view('sched-pictorial', ['title' => $title, 'role' => 'Subscriber', 'subbie' => $subbie, 'status' => 1, 'slot' => $slot, 'isClosed' => $isClosed]);	
            	} else {
            		$dates = null;
	            	switch($college) {
	            		case "Ramon V. del Rosario College of Business (RVR-COB)":
	            			$dates = SchedDate::where('collegeid', 1)->get();
	            			break;
	            		case "College of Liberal Arts (CLA)":
	            			$dates = SchedDate::where('collegeid', 2)->get();
	            			break;
	            		case "Gokongwei College of Engineering (GCOE)":
	            			$dates = SchedDate::where('collegeid', 3)->get();
	            			break;
	            		case "School of Economics (SOE)":
	            			$dates = SchedDate::where('collegeid', 6)->get();
	            			break;
	            		case "College of Science (COS)":
	            			$dates = SchedDate::where('collegeid', 4)->get();
	            			break;
	            		case "College of Computer Studies (CCS)":
	            			$dates = SchedDate::where('collegeid', 5)->get();
	            			break;
	            		case "Br. Andrew Gonzalez FSC College of Education (BAGCED)":
	            			$dates = SchedDate::where('collegeid', 7)->get();
	            			break;
	            		case "Graduate Studies (GS)":
	            			$dates = SchedDate::where('collegeid', 8)->get();
	            			break;
	            	}
            		return view('sched-pictorial', ['title' => $title, 'role' => 'Subscriber', 'subbie' => $subbie, 'status' => 0, 'dates' => $dates, 'hasTimeslots' => 0, 'selectedDate' => "none", 'slots' => null, 'slot' => null, 'isClosed' => $isClosed]);
            	}
                
            }
        } else if ($user->hasRole('administrator') || $user->hasRole('editor')) {
            $college = "";
            $month = 0;
            $day = 0;
            $startTime = "";
            $endTime = "";
            $monthString = "";
            
            switch($request->tsscollege) {
                case "1": 
                    $college = "rvr-cob";
                    switch($request->tssdate) {
                        case "0": $month = 2; $day = 26;
                            break;
                        case "1": $month = 2; $day = 27;
                            break;
                        case "2": $month = 2; $day = 28;
                            break;
                        case "3": $month = 3; $day = 1;
                            break;
                        case "4": $month = 3; $day = 2;
                            break;
                        case "5": $month = 3; $day = 3;
                            break;
                    }
                    break;
                case "2":
                    $college = "cla";
                    switch($request->tssdate) {
                        case "0": $month = 1; $day = 29;
                            break;
                        case "1": $month = 1; $day = 30;
                            break;
                        case "2": $month = 1; $day = 31;
                            break;
                        case "3": $month = 2; $day = 1;
                            break;
                        case "4": $month = 2; $day = 2;
                            break;
                        case "5": $month = 2; $day = 17; $college = "cos-ccs";
                            break;
                    }
                    break;
                case "3": $college = "gcoe-soe";
                    switch($request->tssdate) {
                        case "0": $month = 2; $day = 5;
                            break;
                        case "1": $month = 2; $day = 6;
                            break;
                        case "2": $month = 2; $day = 7;
                            break;
                        case "3": $month = 2; $day = 8;
                            break;
                        case "4": $month = 2; $day = 9;
                            break;
                        case "5": $month = 2; $day = 10;
                            break;
                    }
                    break;
                case "4": $college = "cos-ccs";
                    switch($request->tssdate) {
                        case "0": $month = 2; $day = 12;
                            break;
                        case "1": $month = 2; $day = 13;
                            break;
                        case "2": $month = 2; $day = 14;
                            break;
                        case "3": $month = 2; $day = 15;
                            break;
                        case "4": $month = 3; $day = 9;
                            break;
                        case "5": $month = 2; $day = 17;
                            break;
                    }
                    break;
                case "5": $college = "bagced-gs";
                    switch($request->tssdate) {
                        case "0": $month = 2; $day = 19;
                            break;
                        case "1": $month = 2; $day = 20;
                            break;
                        case "2": $month = 2; $day = 21;
                            break;
                        case "3": $month = 2; $day = 22;
                            break;
                        case "4": $month = 2; $day = 23;
                            break;
                        case "5": $month = 2; $day = 24;
                            break;
                    }
                    break;
                case "6": $college = "others";
                    switch($request->tssdate) {
                        case "0": $month = 3; $day = 5;
                            break;
                        case "1": $month = 3; $day = 6;
                            break;
                        case "2": $month = 3; $day = 7;
                            break;
                        case "3": $month = 3; $day = 10;
                            break;
                    }
                    break;
                case "7": $college = "gnw";
                    switch($request->tssdate) {
                        case "0": $month = 3; $day = 5;
                            break;
                    }
                    break;
            }
            
            $times = explode("-", $request->tsstime);
            $startTime = $times[0];
            $endTime = $times[1];
            
            $slot = Timeslot::where('month', $month)->
    	                   where('day', $day)->
    	                   where('startTime', $startTime)->
    	                   where('endTime', $endTime)->
    	                   where('college', $college)->first();
    	                   
    	   switch($month) {
    	       case 1: $monthString = "January"; break;
    	       case 2: $monthString = "February"; break;
    	       case 3: $monthString = "March"; break;
    	   }
            
            $reservations = DB::table('reservations')
                        ->join('timeslots', 'reservations.slotId', '=', 'timeslots.slotId')
                        ->join('subscribers', 'subscribers.idnum', '=', 'reservations.userId')
                        ->select('reservations.userId', 'subscribers.firstname', 'subscribers.lastname', 'subscribers.college', 'timeslots.startTime', 'timeslots.endTime', 'timeslots.month', 'timeslots.day', 'reservations.slotId')
                        ->where('reservations.slotId', $slot->slotId)
                        ->get();
            $timeslots = Timeslot::all();
            
            $currentTimeslot = "";
            if($request->tsscollege == "2" && $request->tssdate == "5") {
                $currentTimeslot = $monthString . " " . $day . ", 2018 " . $request->tsstime . "  |  " . "cos-ccs-cla";
            } else {
                $currentTimeslot = $monthString . " " . $day . ", 2018 " . $request->tsstime . "  |  " . $college;
            }
            
            return view('admin/managepictorial', ['title' => $title, 'role' => 'Administrator', 'reservations' => $reservations, 'timeslots' => $timeslots, 
                        'currentTimeslot' => $currentTimeslot ]);
        }
    }

    public function chooseDate(Request $request) {
        $isClosed = "true";
    	$title = "Schedule Pictorial";
    	$user = Auth::user();
    	$subbie = Subscriber::where('idnum', $user->idnum)->first();
        $college = $subbie->college;
        $month = ((int)$request->month) + 0;
        $day = ((int)$request->day) + 0;
        $slots = null;
        $slots = Timeslot::where('college', $college)->where('month', $month)->where('day', $day)->get();
        switch($college) {
    		case "Ramon V. del Rosario College of Business (RVR-COB)":
    			$slots = Timeslot::where('college', "rvr-cob")->where('month', $month)->where('day', $day)->get();
    			break;
    		case "College of Liberal Arts (CLA)":
    			$slots = Timeslot::where('college', "cla")->where('month', $month)->where('day', $day)->get();
    			break;
    		case "Gokongwei College of Engineering (GCOE)":
    			$slots = Timeslot::where('college', "gcoe-soe")->where('month', $month)->where('day', $day)->get();
    			break;
    		case "School of Economics (SOE)":
    			$slots = Timeslot::where('college', "gcoe-soe")->where('month', $month)->where('day', $day)->get();
    			break;
    		case "College of Science (COS)":
    			$slots = Timeslot::where('college', "cos-ccs")->where('month', $month)->where('day', $day)->get();
    			break;
    		case "College of Computer Studies (CCS)":
    			$slots = Timeslot::where('college', "cos-ccs")->where('month', $month)->where('day', $day)->get();
    			break;
    		case "Br. Andrew Gonzalez FSC College of Education (BAGCED)":
    			$slots = Timeslot::where('college', "bagced-gs")->where('month', $month)->where('day', $day)->get();
    			break;
    		case "Graduate Studies (GS)":
    			$slots = Timeslot::where('college', "bagced-gs")->where('month', $month)->where('day', $day)->get();
    			break;
    	}
    	
        $dates = null;
        	switch($college) {
        		case "Ramon V. del Rosario College of Business (RVR-COB)":
        			$dates = SchedDate::where('collegeid', 1)->get();
        			break;
        		case "College of Liberal Arts (CLA)":
        			$dates = SchedDate::where('collegeid', 2)->get();
        			break;
        		case "Gokongwei College of Engineering (GCOE)":
        			$dates = SchedDate::where('collegeid', 3)->get();
        			break;
        		case "School of Economics (SOE)":
        			$dates = SchedDate::where('collegeid', 6)->get();
        			break;
        		case "College of Science (COS)":
        			$dates = SchedDate::where('collegeid', 4)->get();
        			break;
        		case "College of Computer Studies (CCS)":
        			$dates = SchedDate::where('collegeid', 5)->get();
        			break;
        		case "Br. Andrew Gonzalez FSC College of Education (BAGCED)":
        			$dates = SchedDate::where('collegeid', 7)->get();
        			break;
        		case "Graduate Studies (GS)":
        			$dates = SchedDate::where('collegeid', 8)->get();
        			break;
        	}

        return view('sched-pictorial', ['title' => $title, 'role' => 'Subscriber', 'subbie' => $subbie, 'status' => 0, 'dates' => $dates, 'hasTimeslots' => 1, 'selectedDate' => $request->dayWeek, 'slots' => $slots, 'isClosed' => $isClosed]);
    }

    public function reserve(Request $request) {
    	$user = Auth::user();
    	
    	$payment = Payment::where('idnum', $user->idnum)->first();
    	
    	if($payment->status == 1) {
    	    $slot = Timeslot::where('slotId', $request->slotId)->first();
            $currSlot = $slot->currSlots + 1;
            Timeslot::where('slotId', $request->slotId)->update(['currSlots' => $currSlot]);

            $reservation = new Reservation;
            $reservation->userId = $user->idnum;
            $reservation->slotId = $request->slotId;
            $reservation->save();
    	}
    	
        return redirect()->route('sched.pictorial');
    }
    
    public function schedule(Request $request) {
    	$user = Subscriber::where('idnum', $request->idnum)->first();
    	
    	if($user != null) {
    	    $res = Reservation::where('userId', $user->idnum)->first();
    	    $slot = Timeslot::where('month', $request->month)->
    	                   where('day', $request->day)->
    	                   where('startTime', $request->startTime)->
    	                   where('endTime', $request->endTime)->first();
    	                   
    	    if($res != null) {
    	        Reservation::where('slotId', $res->slotId)->where('userId', $res->userId)->update(['slotId' => $slot->slotId]);
    	    } else {
                $reservation = new Reservation;
                $reservation->userId = $user->idnum;
                $reservation->slotId = $slot->slotId;
                $reservation->save();
    	    }
    	}
    	
        return redirect()->route('admin.manage.pictorial');
    }

    public function cancel(Request $request) {
    	$user = Auth::user();
    	$reservation = Reservation::where('userId', $user->idnum)->first();

    	$slot = Timeslot::where('slotId', $reservation->slotId)->first();
        $currSlot = ($slot->currSlots) - 1;
        Timeslot::where('slotId', $reservation->slotId)->update(['currSlots' => $currSlot]);

        Reservation::where('userId', $user->idnum)->delete();
        return redirect()->route('sched.pictorial');
    }
}
