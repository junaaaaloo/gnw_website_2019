<?php

namespace App\Http\Controllers;

use Mail;
use App\Survey;
use App\Subscriber;
use App\Announcement;
use App\RegisteredIds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$user = Auth::user();
        $title = "Survey";

        if($user->hasRole('subscriber')) {
            $reg = RegisteredIds::where('idnum', $user->idnum)->first();
            if($reg->status == 0) {
                return view('survey', ['title' => "Survey"]);
            } else if($reg->status == 1) {
                return redirect()->route('home');
            }
        } else if ($user->hasRole('administrator') || $user->hasRole('editor')) {
            return redirect()->route('home');
        }
    }

    public function submit(Request $request)
    {
    	$survey = new Survey;
    	$survey->q1 = $request->q1;
    	$survey->q2 = $request->q2;
    	$survey->q3 = $request->q3;
    	$survey->q4 = $request->q4;
    	$survey->q5 = $request->q5;
    	$survey->q6 = $request->q6;
    	$survey->q7 = $request->q7;
    	$survey->q8 = $request->q8;
    	$survey->q9 = $request->q9;
    	$survey->q10 = $request->q10;

    	$socialmedia = "";
    	if( $request->has('Facebook')) {
    		$socialmedia .= "Facebook; ";
    	}
    	if( $request->has('Twitter')) {
    		$socialmedia .= "Twitter; ";
    	}
    	if( $request->has('Youtube')) {
    		$socialmedia .= "Youtube; ";
    	}
    	if( $request->has('Other')) {
    		$socialmedia .= $request->otherbox . "; ";
    	}

		$survey->socialmedia = $socialmedia;
		$class = "";

		if( $request->has('ls')) {
    		$class .= "LS Hall; ";
    	}
    	if( $request->has('yuch')) {
    		$class .= "Yuchengco Building; ";
    	}
    	if( $request->has('joseph')) {
    		$class .= "St. Joseph Hall; ";
    	}
    	if( $request->has('miguel')) {
    		$class .= "Miguel Hall; ";
    	}
    	if( $request->has('mutien')) {
    		$class .= "Mutien Marie Building; ";
    	}
    	if( $request->has('william')) {
    		$class .= "William Hall; ";
    	}
    	if( $request->has('velasco')) {
    		$class .= "Velasco Building; ";
    	}
    	if( $request->has('strc')) {
    		$class .= "STRC; ";
    	}
    	if( $request->has('andrew')) {
    		$class .= "Bro. Andrew Gonzales Building; ";
    	}
    	if( $request->has('gokongwei')) {
    		$class .= "Gokongwei Building; ";
    	}
    	if( $request->has('razon')) {
    		$class .= "E. Razon Sports Complex; ";
    	}

    	$survey->class = $class;
    	$survey->save();

    	$user = Auth::user();
    	$regId = RegisteredIds::where('idnum', $user->idnum)->first();
        $regId->status = 1;
        $regId->save();

        $sub = Subscriber::where('idnum', $user->idnum)->first();
        $emails = [$sub->dlsu_email];
        $subject = "Survey Answers Received";
        $message = "Hi " . $sub->firstname . ". Thank you for answering our survey. You can now go directly to your dashboard. Have fun!";
        $data = array("name" => $subject, "body" => $message);

        Mail::send('email.mail', $data, function($message) use ($emails) {
            $message->to($emails)
                    ->subject('GNW 2018 | Survey');
            $message->from('info@dlsu-gnw.com','Green & White 2018');
        });

        return redirect()->route('home');
    }
}
