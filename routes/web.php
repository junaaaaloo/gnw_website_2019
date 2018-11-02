<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'StartController@index')->name('index');
Route::get('/about', 'StartController@about')->name('about');
Route::get('/contact', 'StartController@contact')->name('contact');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/verify/{idnum?}', function($idnum){
	$regId = DB::table('registered_ids')
			->where('idnum', $idnum)
			->where('status', -1)
			->get();

	if($regId->isEmpty()) {
		return Response::json("error");
	}

	return Response::json("valid");
});

// Admins
Route::get('/manage/registration', 'ManageRegIDController@index')->name('admin.manage.regid');
Route::get('/manage/subscribers', 'ManageSubscribersController@index')->name('admin.manage.subs');
Route::get('/manage/payment', 'ManagePaymentsController@index')->name('admin.manage.payments');
Route::get('/create', 'ManageNewsController@create')->name('admin.create');
Route::get('/manage/news', 'ManageNewsController@index')->name('admin.manage.news');
Route::get('/manage/admin', 'ManageAdminController@index')->name('admin.manage.admin');
Route::get('/manage/pictorial', 'SchedPictorialController@index')->name('admin.manage.pictorial');
Route::post('/reserve/pictorial', 'SchedPictorialController@schedule')->name('admin.reserve.pictorial');
Route::post('/view/timeslot', 'SchedPictorialController@view')->name('admin.view.timeslot');
Route::post('/manage/subscribers/save', 'ManageSubscribersController@save')->name('admin.subscriber.save');


// Subscribers
Route::get('/basic', 'BasicInfoController@index')->name('sub.basic');
Route::get('/payment', 'PaymentController@index')->name('sub.payment');
Route::get('/affiliations', 'AffiliationsController@index')->name('sub.affiliations');
Route::get('/writeup', 'WriteUpController@index')->name('sub.writeup');
Route::get('/survey', 'SurveyController@index')->name('survey');
Route::post('/survey/submit', 'SurveyController@submit')->name('survey.submit');
Route::get('/schedule/pictorial', 'SchedPictorialController@index')->name('sched.pictorial');
Route::post('/schedule/pictorial', 'SchedPictorialController@chooseDate')->name('choose.date');
Route::post('/schedule/pictorial/reserve', 'SchedPictorialController@reserve')->name('reserve.slot');
Route::post('/schedule/pictorial/cancel', 'SchedPictorialController@cancel')->name('cancel.slot');

// No Views
Route::middleware('auth')->post('/password/change', function(Illuminate\Http\Request $request){
	$user = Illuminate\Support\Facades\Auth::user();
    if (Hash::check($request->curr, $user->password)) {
    	$password = bcrypt($request->newPass);
    	$user = Illuminate\Support\Facades\Auth::user();
    	$user->password = $password;
    	$user->save();
	    return Response::json("success");
	} else {
		return Response::json("error");
	}
});
Route::post('/create/news', 'ManageNewsController@store')->name('news.store');
Route::post('/edit/news', 'ManageNewsController@edit')->name('news.edit');
Route::post('/delete/news', 'ManageNewsController@delete')->name('news.delete');
Route::post('/create/id', 'ManageRegIDController@create')->name('id.create');
Route::post('/edit/id', 'ManageRegIDController@edit')->name('id.edit');
Route::post('/activate/id', 'ManageRegIDController@activate')->name('id.activate');
Route::post('/pending/id', 'ManageRegIDController@pending')->name('id.pending');
Route::post('/create/admin', 'ManageAdminController@create')->name('admin.store');
Route::post('/edit/admin', 'ManageAdminController@edit')->name('admin.edit');
Route::post('/delete/admin', 'ManageAdminController@delete')->name('admin.delete');
Route::post('/affiliations/add', 'AffiliationsController@add')->name('aff.add');
Route::post('/affiliations/delete', 'AffiliationsController@delete')->name('aff.delete');
Route::post('/writeup/save', 'WriteUpController@save')->name('writeup.save');
Route::post('/basic/save', 'BasicInfoController@save')->name('basic.save');
Route::post('/payment/yearbook', 'PaymentController@updateYearbook')->name('payment.submit.yearbook');
Route::post('/payment/photo', 'PaymentController@updatePhoto')->name('payment.submit.photo');
Route::post('/payment/delivery', 'PaymentController@updateDelivery')->name('payment.submit.delivery');
Route::post('/manage/payment/update', 'PaymentController@updateStatus')->name('payment.status.update');

Route::get('manage/subscribers/{idnum?}', function($idnum){
	$user = Auth::user();
    $title = "Home";

    if($user->hasRole('subscriber')) {
        $announcements = App\Announcement::all();
        $collection = collect($announcements);
        $reversed = $collection->reverse();
        $reversed->all();

        return view('home', ['title' => $title, 'role' => 'Subscriber',
            'announcements' => $reversed]);

    } else if ($user->hasRole('administrator') || $user->hasRole('editor')) {
    	$title = "View Subscriber";
        $subbie = App\Subscriber::find($idnum);
        $aff = App\Affiliation::where('idnum', $subbie->idnum)->get();

        $role = "Administrator";
        if($user->hasRole('editor')) {
            $role = "Editor";
        }

        return view('subscriber', ['title' => $title, 'role' => $role, 'subbie' =>  $subbie, 'affiliations' => $aff]);
    }
})->middleware('auth');
Route::get('manage/subscriber/{idnum?}', function($idnum){
	$user = Auth::user();
    $title = "Home";

    if($user->hasRole('subscriber')) {
        $announcements = App\Announcement::all();
        $collection = collect($announcements);
        $reversed = $collection->reverse();
        $reversed->all();

        return view('home', ['title' => $title, 'role' => 'Subscriber',
            'announcements' => $reversed]);

    } else if ($user->hasRole('administrator') || $user->hasRole('editor')) {
    	$title = "View Subscriber";
        $subbie = App\Subscriber::find($idnum);
        $aff = App\Affiliation::where('idnum', $subbie->idnum)->get();

        $role = "Administrator";
        if($user->hasRole('editor')) {
            $role = "Editor";
        }
        // var_dump($subbies);
        return view('subscriber', ['title' => $title, 
            'role' => $role, 'subbie' =>  $subbie, 'affiliations' => $aff]);
    }
})->middleware('auth');