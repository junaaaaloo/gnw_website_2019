<?php

namespace App\Http\Controllers\Admin;

use App\SchedDate;
use App\Timeslot;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ManagePictorialController extends Controller {
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin_editor');
    }

    public function index () {
        $schedules = SchedDate::all();

        foreach ($schedules as $schedule) {
            $schedule->timeslots = Timeslot::where('colleges', 'LIKE', "%".$schedule->id.",%")->get();
        }

        return view("admin/managepictorial", ["colleges" => $schedules]);
    }

    public function college (Request $request) {

        $college_id = $request->college;
        $start_date = new Carbon($request->start_date);
        $end_date = new Carbon($request->end_date);
        
        Timeslot::where("colleges", "LIKE","%".$college_id.",%")->delete();

        $end_date_itr = $end_date->copy()->addDay();
        $curr_date = $start_date->copy();

        $college_id_arr = [];
        
        if ($college_id == 4 || $college_id == 5)
            $college_id_arr = [4, 5];
        else if ($college_id == 3 || $college_id == 6)
            $college_id_arr = [3, 6];
        else if ($college_id == 7 || $college_id == 8)
            $college_id_arr = [7, 8];
        else
            $college_id_arr = [$college_id];

        foreach ($college_id_arr as $college_id_it) {
            if ($college_id_it != "") {
                $scheduledDate = SchedDate::find($college_id_it);
                $scheduledDate -> start_day = $start_date->format("Y-m-d");
                $scheduledDate -> end_day = $end_date->format("Y-m-d");
                $scheduledDate -> save();        
            }
        }

        while ($end_date_itr != $curr_date) {
            $curr_date = $curr_date->copy();

            $start_time = Carbon::createFromTime(9, 0);
            $end_time = Carbon::createFromTime(17, 0);
            
            for ($current_time = $start_time->copy(); $current_time -> lt($end_time) ;$current_time = $current_time->copy()->addMinutes(45)) {
                $timeslot = new Timeslot();

                $timeslot -> start_time = $current_time -> format("H:i:s");
                $timeslot -> end_time = $current_time -> copy()->addMinutes(45) -> format("H:i:s");

                $timeslot -> total_slot = 15;
                $timeslot -> current_slot = 15;
                $timeslot -> date = $curr_date->format("Y-m-d");
                $timeslot -> colleges = ""; 

                if ($college_id == 4 || $college_id == 5)
                    $timeslot -> colleges = "4,5,";
                else if ($college_id == 3 || $college_id == 6)
                    $timeslot -> colleges = "3,6,";
                else if ($college_id == 7 || $college_id == 8)
                    $timeslot -> colleges = "7,8,";
                else
                    $timeslot -> colleges = $college_id.",";

                $timeslot -> save();

                if ($current_time == Carbon::createFromTime(12, 0)) {
                    $current_time = $current_time->copy()->addMinutes(60);
                    $lunch = new Timeslot();
                    $lunch -> start_time = $current_time -> format("H:i:s");
                    $lunch -> end_time = $current_time -> copy()->addMinutes(45) -> format("H:i:s");
                    
                    $lunch -> total_slot = 15;
                    $lunch -> current_slot = 15;
                    $lunch -> date =  $curr_date->format("Y-m-d");
                    $lunch -> colleges = ""; 
                
                    if ($college_id == 4 || $college_id == 5)
                        $lunch -> colleges = "4,5";
                    else if ($college_id == 3 || $college_id == 6)
                        $lunch -> colleges = "3,6,";
                    else if ($college_id == 7 || $college_id == 8)
                        $lunch -> colleges = "7,8,";
                    else
                        $lunch -> colleges = $college_id.",";

                    $lunch -> save();
                }
            }

            $curr_date->addDay();
        }

        return redirect() -> route('admin.manage.pictorial');
    }
}
