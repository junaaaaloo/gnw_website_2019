<?php

namespace App\Http\Controllers;

use App\RegisteredIds;
use App\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageRegIDController extends Controller
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
        	$title = "Manage Registered IDs";
            $regIds = RegisteredIds::all();

            $role = "Administrator";
            if($user->hasRole('editor')) {
                $role = "Editor";
            }

            return view('admin/manageid', 
                ['title' => $title, 'role' => $role, 'regIds' => $regIds]);
        }
    }

    public function create(Request $request) {
        $regid = new RegisteredIds;
        $regid->idnum = $request->idnum;
        $regid->added_by = Auth::user()->name;
        $regid->status = -1;
        $regid->save();

        return redirect()->route('admin.manage.regid');
    }

    public function edit(Request $request)
    {
        $regId = RegisteredIds::find($request->editid);
        $regId->idnum = $request->editidnum;
        $regId->added_by = Auth::user()->name;
        $regId->status = -1;
        $regId->save();

        return redirect()->route('admin.manage.regid');
    }

    public function activate(Request $request) {
        $regid = RegisteredIds::find($request->editid);
        $regid->status = 1;
        $regid->save();
    }
}
