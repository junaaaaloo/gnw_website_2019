<?php

namespace App\Http\Controllers\Subscriber;

use Mail;
use App\Subscriber;
use App\SchedDate;
use App\Timeslot;
use App\Reservation;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchedulePictorialController extends Controller {
    public function __construct()
    {
		    $this->middleware('auth');
		    $this->middleware('subscriber');
    }

    public function index()
    {
        $subscriber = Subscriber::where('idnum', Auth::user()->idnum)->first();
        $college = SchedDate::where('college', $subscriber->college)->first();

        $timeslots = Timeslot::where("colleges", "LIKE","%".($college -> id).",%")->get();
        $reservation = Reservation::where('userId', '=', Auth::user()->id)->first();
        if ($reservation)
            $reservation->slot = Timeslot::find($reservation->slotId);

        return view("subscriber/pictorial", ["college" => $college, "timeslots" => $timeslots, "reservation" => $reservation]);
    }

    public function schedule(Request $request)
    {
        $user = Auth::user();
        $subscriber = Subscriber::where('idnum', $user->idnum)->first();

        if (!isset($subscriber -> college))
            return back()->with("error", "Fill up you basic information first.");

        $slot_id = $request->slot_id;

        $reservation = Reservation::where('userId', '=', $user->id)->first();
        $reservation_exists = true;
        if (!($reservation)) {
            $reservation_exists = false;
            $reservation = new Reservation();
        }

        $reservation->slotId = $slot_id;
        $reservation->userId = $user->id;
        $reservation->save();

        if (!$reservation_exists) {
            $timeslot = Timeslot::find($slot_id);
            $timeslot->current_slot = $timeslot->current_slot - 1;
            $timeslot->save();
        }

        return redirect()->route("sched.pictorial");
    }
    
    public function cancel(Request $request) {
        $user = Auth::user();
        $subscriber = Subscriber::where('idnum', $user->idnum)->first();
        
        $reservation = Reservation::where('userId', '=', $user->id);
        if (!$reservation) 
            return back()->with("error", "There is no reservation!");
        $reservation->delete();

        $slot_id = $request->slot_id;
        $timeslot = Timeslot::find($slot_id);
        if (!$timeslot) 
            return back()->with("error", "There is no timeslot!");
        $timeslot->current_slot = $timeslot->current_slot + 1;
        $timeslot->save();
        
        return redirect()->route("sched.pictorial");
    }
}
