<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\RegisteredIds;
use App\Subscriber;
use App\Survey;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user = Auth::user();

        $title = "Home";
        if($user->hasRole('subscriber')) {
            $reg = RegisteredIds::where('idnum', $user->idnum)->first();
            if($reg->status == 0) {
                return redirect()->route('survey');
            } else if($reg->status == 1) {
                $announcements = Announcement::all();
                $collection = collect($announcements);
                $reversed = $collection->reverse();
                $reversed->all();

                return view('subscriber/home', ['title' => $title, 'role' => 'Subscriber',
                    'announcements' => $reversed]);
            }
        } else if ($user->hasRole('administrator') || $user->hasRole('editor')) {
            $date_today = date("l") . ", " . date("Y/m/d");
            $regIds = RegisteredIds::count();
            $subbies = Subscriber::count();
            $surveys = Survey::count();
            $paid = Payment::where('status', '1')->count();

            $role = "Administrator";
            if($user->hasRole('editor')) {
                $role = "Editor";
            }

            return view('admin/home', 
                ['title' => $title, 'role' => $role, 'date_today' => $date_today, 'regIds'=> $regIds, 'subbies' => $subbies, 'surveys' => $surveys, 'paid' => $paid]);
        }
    }
}
