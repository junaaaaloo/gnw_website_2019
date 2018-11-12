<?php

namespace App\Http\Controllers\Subscriber;

use App\Affiliation;
use App\RegisteredIds;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AffiliationsController extends Controller {
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
            $aff = Affiliation::where('idnum', $user->idnum)->get();

            return view('subscriber/affiliations', ['title' => $title, 'role' => 'Subscriber', 'affiliations' => $aff]);
        }
    }

    public function add(Request $request) {
        $user = Auth::user();

        $aff = new Affiliation;
        $aff->idnum = $user->idnum;
        $aff->organization = $request->organization;
        $aff->position = $request->position;
        $aff->start_year = $request->yearstart;
        $aff->end_year = $request->yearend;
        $aff->save();

        return redirect()->route('sub.affiliations');
    }

    public function delete(Request $request) {
        $aff = Affiliation::find($request->deleteid);
        $aff->delete();

        return redirect()->route('sub.affiliations');
    }
}
