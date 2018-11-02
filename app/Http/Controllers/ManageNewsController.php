<?php

namespace App\Http\Controllers;

use Mail;
use App\Announcement;
use App\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageNewsController extends Controller
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
        	$title = "Manage News";
            $announcements = Announcement::all();

            $role = "Administrator";
            if($user->hasRole('editor')) {
                $role = "Editor";
            }

            return view('admin/managenews', 
                ['title' => $title, 'role' => $role,
                'announcements' => $announcements]);
        }
    }

    public function create()
    {
        $user = Auth::user();
        $title = "Home";

        if($user->hasRole('subscriber')) {
            return view('home', ['title' => $title, 'role' => 'Subscriber']);

        } else if ($user->hasRole('administrator') || $user->hasRole('editor')) {
            $title = "Create News";

            $role = "Administrator";
            if($user->hasRole('editor')) {
                $role = "Editor";
            }

            return view('admin/create', 
                ['title' => $title, 'role' => $role]);
        }
    }

    public function store(Request $request)
    {
        $empty = "- -";
        $news = new Announcement;
        if($request->subject == "") {
            $news->subject = "  ";
        } else {
            $news->subject = $request->subject;
        }
        
        if($request->message == "") {
            $news->message = "  ";
        } else {
            $news->message = $request->message;
        }
        $news->created_by = Auth::user()->name;
        $news->save();

        // $emails = array("hazelannebrosas@gmail.com");
        $emails = Subscriber::all()->pluck('dlsu_email')->toArray();
        $data = array("name" => $request->subject, "body" => $request->message);

        Mail::send('email.mail', $data, function($message) use ($emails) {
            $message->to($emails)
                    ->subject('GNW 2018 | Announcement');
            $message->from('info@dlsu-gnw.com','Green & White 2018');
        });

        return redirect()->route('admin.create');
    }

    public function edit(Request $request)
    {
        $news = Announcement::find($request->editid);
        $news->subject = $request->editsubject;
        $news->message = $request->editmessage;
        $news->created_by = $request->editby;
        $news->save();

        return redirect()->route('admin.manage.news');
    }

    public function delete(Request $request)
    {
        $news = Announcement::find($request->deleteid);
        $news->delete();

        return redirect()->route('admin.manage.news');
    }
}
