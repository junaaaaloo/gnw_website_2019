<?php

namespace App\Http\Controllers\Subscriber;

use App\Subscriber;
use App\RegisteredIds;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WriteUpController extends Controller {
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('subscriber');
    }

    public function index() {
        $user = Auth::user();
        $title = "Home";

        $reg = RegisteredIds::where('idnum', $user->idnum)->first();
        if($reg->status == 0) {
            return redirect()->route('survey');
        } else if($reg->status == 1) {
            $title = "Write Up";
            $subbie = Subscriber::where('idnum', $user->idnum)->first();
            $text = $subbie->writeup;

            return view('subscriber/writeup', ['title' => $title, 'role' => 'Subscriber', 'writeup' => $text]);
        }
    }

    public function save(Request $request) {
        $user = Auth::user();
        
        $subbie = Subscriber::where('idnum', $user->idnum)->first();
        $subbie->writeup = $request->writeup;
        $subbie->save();

        return back()->with('status', "Write Up saved successfully!"); 
    }
}
