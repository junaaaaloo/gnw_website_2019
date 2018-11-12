<?php

namespace App\Http\Controllers;

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
}
