<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Subscriber;
use App\Affiliation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageSubscribersController extends Controller
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
            return redirect()->route('home');

        } else if ($user->hasRole('administrator') || $user->hasRole('editor')) {
        	$title = "Manage Subscribers";
            $subbies = Subscriber::all();
            $role = "Administrator";
            if($user->hasRole('editor')) {
                $role = "Editor";
            }
            // var_dump($subbies);
            return view('admin/managesub', ['title' => $title, 
                'role' => $role, 'subbies' =>  $subbies]);
        }
    }
    
    public function save(Request $request)
    {
        $subbie = Subscriber::where('idnum', $request->idnum)->first();
        
        if($subbie === null) {
            return back()->with('status', "Oops! An error has encountered"); 
        } else {
           $subbie->firstname = $request->firstname;
            $subbie->lastname = $request->lastname;
            $subbie->middlename = $request->middlename;
            $subbie->suffix = $request->suffix;
            $subbie->nickname = $request->nickname;
            $subbie->gender = $request->gender;
            $subbie->bday_month = $request->month;
            $subbie->bday_day = $request->day;
            $subbie->bday_year = $request->year;
            $subbie->degreeprogram = $request->degree;
            $subbie->college = $request->college;
            $subbie->mobile = $request->mobile;
            $subbie->landline = $request->landline;
            $subbie->houseno = $request->houseno;
            $subbie->building = $request->building;
            $subbie->street = $request->street;
            $subbie->subdivision = $request->subdivision;
            $subbie->barangay = $request->barangay;
            $subbie->province = $request->province;
            $subbie->city = $request->city;
            $subbie->writeup = $request->writeup;
            $subbie->save();
    
            return back()->with('status', "Basic Information saved successfully!"); 
        }
        
    }
}
