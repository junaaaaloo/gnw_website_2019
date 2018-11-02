<?php

namespace App\Http\Controllers;

use App\Subscriber;
use App\RegisteredIds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WriteUpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $title = "Home";

        if($user->hasRole('subscriber')) {
            $reg = RegisteredIds::where('idnum', $user->idnum)->first();
            if($reg->status == 0) {
                return redirect()->route('survey');
            } else if($reg->status == 1) {
                $title = "Write Up";
                $subbie = Subscriber::where('idnum', $user->idnum)->first();
                $text = $subbie->writeup;

                return view('writeup', ['title' => $title, 'role' => 'Subscriber', 'writeup' => $text]);
            }
        } else if ($user->hasRole('administrator') || $user->hasRole('editor')) {
            return redirect()->route('home');
        }
    }

    public function save(Request $request)
    {
        $user = Auth::user();
        
        if($request->status === "dlsu1gnw") {
            $subbie = Subscriber::where('idnum', $user->idnum)->first();
            $subbie->writeup = $request->writeup;
            $subbie->save();
    
            return back()->with('status', "Write Up saved successfully!");    
        } else if($request->status === "dlsu0gnw") {
            return back()->with('status', "Oops! Write Up not successfully saved.");    
        }
        
    }
}
