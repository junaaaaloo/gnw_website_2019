<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StartController extends Controller {
    public function index() {
    	if(Auth::check()) {
	    	return redirect()->route('home');
	    }

	    return view('index.welcome');
	}
	
	public function about() {
		return view('index.about');
	}

	public function contact() {
		return view('index.contact');
	}

	public function email(Request $request) {
		$validatedData = $request->validate([
			'email' => 'required|email',
			'subject' => 'required',
			'message' => 'required',
			'name' => 'required'
		]);

		$emails = array("gnw2019@gmail.com");
		$cc = array($request->get('email'));
		$bcc = array("jonal_ticug@dlsu.edu.ph");

        $data = array("name" => $request->get('name'), "body" => $request->get('message'), 'email' => $request->get('email'));

		Mail::send('email.mail', $data, function($message) use ($emails) {
            $message->to($emails)
                    ->subject('Green & White | Inquiries');
            $message->from('info@dlsu-gnw.com','Green & White');
        });
		return back()->with('success', 'Thanks for contacting us!'); 
	}
}
