<?php

namespace App\Http\Controllers\Admin;

use App\Announcement;
use App\Payment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagePaymentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin_editor');
    }

    public function index(Request $request) {
        $user = Auth::user();
        $title = "Home";

        $title = "Manage Payments";
        $role = "Administrator";
        if($user->hasRole('editor')) {
            $role = "Editor";
        }

        $query = Payment::query();
        
        if($request->has('filter') and $request->get('filter') != "") {
            $filter = $request->get('filter');

            $query->where('added_by', 'LIKE', "%".$filter."%") ->
                    orWhere('idnum', 'LIKE', "%".$filter."%");
        }

        $direction = "DESC";
        $sort = ((!$request->has('sort') || $request->get('sort') == "") ? "id" : $request->get('sort'));

        if ($request->has('direction') && $request->get('direction') != "") {
            $direction = $request->get('direction');
        }

        $query->orderBy($sort, $direction);

        $payments = $query -> paginate(10);

        return view('admin/managepayment', 
            ['title' => $title, 'role' => $role, 'payments' => $payments]);
    }
}
