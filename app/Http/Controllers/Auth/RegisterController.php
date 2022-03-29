<?php

namespace App\Http\Controllers\Auth;



use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\User;
use Mail;
use App\Mail\verifyEmail;
use Illuminate\Support\Str;
use Session;


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
    protected $redirectTo = '/dashboard';

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
        return Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
            'dept' => 'required|string|max:255',
            'batch' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
           
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'mobile' => $data['mobile'],
            'dept' => $data['dept'],
            'batch' => $data['batch'],
            'gender' => $data['gender'],
            'role' => 'author',
            'verifyToken' => Str::random(40),
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            
        ]);

       $thisUser = User::findOrFail($user->id);
       $this->sendEmail($thisUser);
       Session::flash('status', 'Registered! but verify your email to activate your account');
       return $user;

    }



    public function sendEmail($thisUser)
    {
        Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
    }


    public function sendEmailDone($email, $verifyToken)
    {
        $user = User::where(['email'=>$email,'verifyToken'=>$verifyToken])->first();  
        if($user){
                User::where(['email'=>$email, 'verifyToken'=>$verifyToken])->update(['status'=>'1', 'verifyToken'=>NULL]);
                Session::flash('Thankyou', 'Successful Active Your Account');
                return redirect()->route('login');
        }else{

                return 'user Not Found';
        }
             
    }


    // public function verifyEmailFirst()
    // {
    //    return "Plz Check Your Email";
    // }


}
