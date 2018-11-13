<?php

namespace App\Http\Controllers\Admin;

use App\RegisteredIds;
use App\Announcement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageRegIDController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin_editor');
    }

    public function index(Request $request) {
        $user = Auth::user();

        $query = RegisteredIds::query();
        
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

        $regIds = $query -> paginate(10);

        return view('admin/manageid',  ['regIds' => $regIds]);
    }

    public function create(Request $request) {
        $regid = new RegisteredIds;
        $regid->idnum = $request->idnum;
        $regid->added_by = Auth::user()->name;
        $regid->status = -1;
        $regid->save();

        return redirect()->route('admin.manage.regid');
    }

    public function edit(Request $request) {
        $regId = RegisteredIds::find($request->editid);
        $regId->idnum = $request->editidnum;
        $regId->added_by = Auth::user()->name;
        $regId->status = -1;
        $regId->save();

        return redirect()->route('admin.manage.regid');
    }

    public function loadCSV (Request $request) {
        $text = $request->text_id;

        $ids = explode("\r\n", $text);

        foreach ($ids as $id) {
            $regid = new RegisteredIds;
            $regid->idnum = $id;
            $regid->added_by = Auth::user()->name;
            $regid->status = -1;
            $regid->save();
        }

        return redirect()->route('admin.manage.regid');
    }

    public function activate(Request $request) {
        $regid = RegisteredIds::find($request->editid);
        $regid->status = 1;
        $regid->save();
    }

    public function delete(Request $request) {
        $regid = RegisteredIds::find($request->deleteid);
        $regid->delete();

        return redirect()->route('admin.manage.regid');
    }
}
