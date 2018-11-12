<?php

namespace App\Http\Controllers\Admin;

use App\Announcement;
use App\Subscriber;
use App\Affiliation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageSubscribersController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin_editor');
    }

    public function index(Request $request) {
        $user = Auth::user();
        
        $query = Subscriber::query();
        
        if($request->has('filter') and $request->get('filter') != "") {
            $filter = $request->get('filter');

            $query->where('firstname', 'LIKE', "%".$filter."%") ->
                    orWhere('idnum', 'LIKE', "%".$filter."%") ->
                    orWhere('middlename', 'LIKE', "%".$filter."%") ->
                    orWhere('lastname', 'LIKE', "%".$filter."%") ->
                    orWhere('college', 'LIKE', "%".$filter."%");
        }

        $direction = "DESC";
        $sort = $request->get('sort') == "" ? "created_at" : $request->get('sort');
        if ($request->has('direction') && $request->get('direction') != "") {
            $direction = $request->get('direction');
        }

        $query->orderBy($sort, $direction);

        $role = "Administrator";

        $subbies = $query->paginate(10);

        return view('admin/managesub', ['subbies' =>  $subbies]);
    }
    
    public function save(Request $request) {
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
