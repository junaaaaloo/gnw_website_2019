<?php

namespace App\Http\Controllers\Subscriber;

use App\Subscriber;
use App\RegisteredIds;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasicInfoController extends Controller
{
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
        } else if ($reg->status == 1) {
            $title = "Basic Information";
            $subbie = Subscriber::where('idnum', $user->idnum)->first();
            return view('subscriber/details', ['subbie' => $subbie]);
        }
    }

    public function save(Request $request) {
        $user = Auth::user();
        $subbie = Subscriber::where('idnum', $user->idnum)->first();
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
        $subbie->dlsu_email = $request->dlsu;
        $subbie->non_dlsu_email = $request->nondlsu;
        $subbie->mobile = $request->mobile;
        $subbie->landline = $request->landline;
        $subbie->houseno = $request->houseno;
        $subbie->building = $request->building;
        $subbie->street = $request->street;
        $subbie->subdivision = $request->subdivision;
        $subbie->barangay = $request->barangay;
        $subbie->province = $request->province;
        $subbie->city = $request->city;
        $subbie->save();

        return back()->with('status', "Basic Information saved successfully!");
    }
}
