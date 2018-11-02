<?php

namespace App\Http\Controllers\Auth;

use Mail;
use App\User;
use App\Payment;
use App\Subscriber;
use App\RegisteredIds;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    public function showRegistrationForm() {
        return view('auth.register', ['context' => 'register']);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, 
        [
            'idnum' => ["required", "string", "max:8", "unique:users"],
            'firstname' => ["required", "string", "max:255"],
            'lastname' => ["required", "string", "max:255"],
            'email' => ["required", "string", "email", "max:255", "unique:users", 
                        "regex:/\\b@dlsu.edu.ph/"],
            'nondlsu' => ["required", "string", "email", "max:255"],
            'password' => ["required", "string", "min:6", "confirmed"],
            'isVerified' => ["required", "string", "in:verified"]
        ], 
        [ 
            'isVerified.regex' => 'ID Number should be registered',
            'nondlsu.email' => 'The non-dlsu email must be a valid email address',
            'isVerified.required' => 'ID Number must be checked for verification',
            'email.regex' => 'DLSU Email must be in DLSU format',
            'email.required' => 'DLSU Email required',
            'email.email' => 'DLSU Email must be in email format',
            'idnum' => 'ID Number is required',
            'idnum.max' => 'ID Number is only maximum of 8 characters',
            'idnum.unique' => 'ID Number must be unique',
            'isVerified.in' => 'ID Number should be registered',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $name = $data['firstname'] . " " . $data['lastname'];
        $user = User::create([
            'idnum' => $data['idnum'],
            'name' => $name,
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'position' => "Subscriber",
        ]);
        $user->attachRole("subscriber");
        return $user;
    }

    protected function registered(Request $request, $user)
    {
        $subscriber = new Subscriber;
        $subscriber->idnum = $request->idnum;
        $subscriber->firstname =$request->firstname;
        $subscriber->middlename = $request->middlename;
        $subscriber->lastname = $request->lastname;
        $subscriber->nickname = $request->firstname;
        $subscriber->dlsu_email = $request->email;
        $subscriber->non_dlsu_email = $request->nondlsu;
        $subscriber->save();

        $payment = new Payment;
        $payment->idnum = $request->idnum;
        $payment->yearbookStatus = -1;
        $payment->photoStatus = -1;
        $payment->deliveryStatus = -1;
        $payment->status = -1;
        $payment->save();

        $regId = RegisteredIds::where('idnum', $request->idnum)->first();
        $regId->status = 0;
        $regId->save();

        $emails = [$request->email];
        $subject = "Successful Registration";
        $message = "Hi " . $request->firstname . ". Congratulations! You have successfully subscribed to Green and White 2018. But before starting, please answer the survey at this link: http://dlsu-gnw.com/survey. Thank you and enjoy!";
        $data = array("name" => $subject, "body" => $message);

        Mail::send('email.mail', $data, function($message) use ($emails) {
            $message->to($emails)
                    ->subject('GNW 2018 | Registration');
            $message->from('info@dlsu-gnw.com','Green & White 2018');
        });
    }
}
