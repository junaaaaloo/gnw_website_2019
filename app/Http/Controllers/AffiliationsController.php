<?php

namespace App\Http\Controllers;

use App\Affiliation;
use App\RegisteredIds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AffiliationsController extends Controller
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
                $title = "Affiliations";
                $aff = Affiliation::where('idnum', $user->idnum)->get();

                return view('affiliations', ['title' => $title, 'role' => 'Subscriber', 'affiliations' => $aff]);
            }
        } else if ($user->hasRole('administrator') || $user->hasRole('editor')) {
            return redirect()->route('home');
        }
    }

    public function add(Request $request)
    {
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

    public function delete(Request $request)
    {
        $aff = Affiliation::find($request->deleteid);
        $aff->delete();

        return redirect()->route('sub.affiliations');
    }
}
