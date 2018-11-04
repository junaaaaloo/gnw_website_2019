<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StartController extends Controller {
    public function index() {
    	if(Auth::check()) {
	    	return redirect()->route('home');
	    }

	    return view('welcome', ['context' => "home"]);
	}
	
	public function about() {
		return view('about', ['context' => "about"]);
	}

	public function contact() {
		return view('contact', ['context' => "contact"]);
	}
}
