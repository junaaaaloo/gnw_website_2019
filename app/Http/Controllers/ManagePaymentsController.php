<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagePaymentsController extends Controller
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
        	$title = "Manage Payments";
            $payments =Payment::all();
            $role = "Administrator";
            if($user->hasRole('editor')) {
                $role = "Editor";
            }

            return view('admin/managepayment', 
                ['title' => $title, 'role' => $role, 'payments' => $payments]);
        }
    }
}
