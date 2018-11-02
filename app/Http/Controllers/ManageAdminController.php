<?php

namespace App\Http\Controllers;

use App\User;
use App\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageAdminController extends Controller
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
            
        } else if ($user->hasRole('administrator')) {
            $title = "Manage Admin Accounts";
            $adminUsers = User::whereRoleIs('administrator')->get();
            $editUsers = User::whereRoleIs('editor')->get();

            $role = "Administrator";
            if($user->hasRole('editor')) {
                $role = "Editor";
            }

            return view('admin/manageadmin', 
                ['title' => $title, 'role' => $role, 'adminusers' => $adminUsers, 'editusers' => $editUsers]);
                
        } else if ($user->hasRole('editor')) {
            return redirect()->route('home');
        }
    }

    public function create(Request $request)
    {
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

    public function edit(Request $request)
    {
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
