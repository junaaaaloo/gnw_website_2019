<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Announcement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()  {
        $user = Auth::user();
        $title = "Home";

        $adminUsers = User::whereRoleIs('administrator')->get();
        $editUsers = User::whereRoleIs('editor')->get();

        return view('admin/manageadmin', 
            ['adminusers' => $adminUsers, 'editusers' => $editUsers]);

    }

    public function create(Request $request) {
        $admin = User::create([
            'idnum' => $request->idnum,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'position' => $request->position,
        ]);

        $role = $request->role;
        if($role == "Administrator") {
            $admin->attachRole('administrator');
        } else if ($role == "Editor") {
            $admin->attachRole('editor');
        }

        return redirect()->route('admin.manage.admin');
    }

    public function edit(Request $request) {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->position = $request->position;
        $user->save();

        return redirect()->route('admin.manage.admin');
    }

    public function delete(Request $request)
    {
        $user = User::find($request->deleteid);
        $user->delete();

        return redirect()->route('admin.manage.admin');
    }
}
