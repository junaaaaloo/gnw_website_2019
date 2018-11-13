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
        $this->middleware("auth");
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
            }

            $announcements = Announcement::all();
            $collection = collect($announcements);
            $reversed = $collection->reverse();
            $reversed->all();

            return view('subscriber/home', ['announcements' => $reversed]);
        } 
        
        if ($user->hasRole('administrator') || $user->hasRole('editor')) {
            $regIds = RegisteredIds::count();
            $subbies = Subscriber::count();
            $surveys = Survey::count();
            $paid = Payment::where('status', '1')->count();

            return view('admin/home', ['regIds'=> $regIds, 'subbies' => $subbies, 'surveys' => $surveys, 'paid' => $paid]);
        }
    }
}
