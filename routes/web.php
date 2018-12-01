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
Route::post('/email', 'StartController@email')->name('email');

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

Route::get('/manage/registration', 'Admin\ManageRegIDController@index')->name('admin.manage.regid');
Route::get('/manage/subscribers', 'Admin\ManageSubscribersController@index')->name('admin.manage.subs');
Route::get('/manage/payment', 'Admin\ManagePaymentsController@index')->name('admin.manage.payments');
Route::get('/manage/news', 'Admin\ManageNewsController@index')->name('admin.manage.news');
Route::get('/manage/admin', 'Admin\ManageAdminController@index')->name('admin.manage.admin');

Route::get('/manage/pictorial', 'Admin\ManagePictorialController@index')->name('admin.manage.pictorial');
Route::post('/manage/pictorial/college', 'Admin\ManagePictorialController@college')->name('admin.manage.college');

Route::post('/reserve/pictorial', 'Admin\ManagePictorialController@schedule')->name('admin.reserve.pictorial');
Route::post('/view/timeslot', 'Admin\ManagePictorialController@view')->name('admin.view.timeslot');

Route::post('/manage/subscribers/save', 'Admin\ManageSubscribersController@save')->name('admin.subscriber.save');

Route::post('/create/id', 'Admin\ManageRegIDController@create')->name('id.create');
Route::post('/edit/id', 'Admin\ManageRegIDController@edit')->name('id.edit');
Route::post('/activate/id', 'Admin\ManageRegIDController@activate')->name('id.activate');
Route::post('/delete/id', 'Admin\ManageRegIDController@delete')->name('id.delete');
Route::post('/pending/id', 'Admin\ManageRegIDController@pending')->name('id.pending');
Route::post('/csv/id', 'Admin\ManageRegIDController@loadCSV')->name('id.csv');

Route::get('/details', 'Subscriber\BasicInfoController@index')->name('sub.basic');
Route::get('/payment', 'Subscriber\PaymentController@index')->name('sub.payment');
Route::get('/affiliations', 'Subscriber\AffiliationsController@index')->name('sub.affiliations');
Route::get('/writeup', 'Subscriber\WriteUpController@index')->name('sub.writeup');
Route::get('/pictorial', 'Subscriber\SchedulePictorialController@index')->name('sched.pictorial');

Route::get('/survey', 'Subscriber\SurveyController@index')->name('survey');

Route::post('/survey/submit', 'Subscriber\SurveyController@submit')->name('survey.submit');

Route::post('/schedule/pictorial', 'Subscriber\SchedulePictorialController@schedule')->name('subscriber.schedule');
Route::post('/schedule/pictorial/cancel', 'Subscriber\SchedulePictorialController@cancel')->name('subscriber.schedule.cancel');

Route::middleware('auth')->post('/password/change', function(Illuminate\Http\Request $request){
	$user = Illuminate\Support\Facades\Auth::user();
	if ($request->new_password != $request->confirm_new_password) {
		return redirect()->back()->with('password_change', 'Passwords did not match.');
	}

	if (!Hash::check($request->current_password, $user->password)) {
		return redirect()->back()->with('password_change', 'Current password is wrong.');
	}

    $password = bcrypt($request->new_password);
	$user = Illuminate\Support\Facades\Auth::user();
	$user->password = $password;
	$user->save();
	return redirect()->back()->with('password_change', 'Password Successfully Changed!');

})->name('password.change');

Route::post('/create/news', 'Admin\ManageNewsController@store')->name('news.store');
Route::post('/edit/news', 'Admin\ManageNewsController@edit')->name('news.edit');
Route::post('/delete/news', 'Admin\ManageNewsController@delete')->name('news.delete');

Route::post('/create/admin', 'Admin\ManageAdminController@create')->name('admin.store');
Route::post('/edit/admin', 'Admin\ManageAdminController@edit')->name('admin.edit');
Route::post('/delete/admin', 'Admin\ManageAdminController@delete')->name('admin.delete');

Route::post('/affiliations/add', 'Subscriber\AffiliationsController@add')->name('aff.add');
Route::post('/affiliations/delete', 'Subscriber\AffiliationsController@delete')->name('aff.delete');

Route::post('/writeup/save', 'Subscriber\WriteUpController@save')->name('writeup.save');
Route::post('/basic/save', 'Subscriber\BasicInfoController@save')->name('basic.save');

Route::post('/payment/yearbook', 'Subscriber\PaymentController@updateYearbook')->name('payment.submit.yearbook');
Route::post('/payment/photo', 'Subscriber\PaymentController@updatePhoto')->name('payment.submit.photo');
Route::post('/payment/delivery', 'Subscriber\PaymentController@updateDelivery')->name('payment.submit.delivery');
Route::post('/manage/payment/update', 'Subscriber\PaymentController@updateStatus')->name('payment.status.update');

Route::get('manage/subscriber/{idnum?}', function($idnum){
	$user = Auth::user();
    $subbie = App\Subscriber::find($idnum);
    $aff = App\Affiliation::where('idnum', $subbie->idnum)->get();

    return view('admin/subscriber', ['subbie' =>  $subbie, 'affiliations' => $aff]);
})->middleware('auth','admin_editor');