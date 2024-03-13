<?php

namespace App\Http\Controllers;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Http\Request;
use App\Models\login;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Mail;
use App\Mail\myTestMail;
use Illuminate\Validation\Rule;
use Auth;


use App\Rules\ReCaptcha;

class loginController extends Controller
{
    function login(){
        return view('UserInterface.login');
    }


    function login_store(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

     // Validating the password field using a validator
        $validator = Validator::make($request->all(), [
                'password' => ['required', 'string', 'min:6', 'regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/'],
                'g-recaptcha-response' => ['required', new ReCaptcha]
            ]);

            if ($validator->fails()) {
                return redirect('/')->with('successMessage','Login Field');
            }

        // Checking if the XAMPP server is offline
        if (!@fsockopen('localhost', 80)) {
            return back()->with('successMessage','The server is currently offline');
        }

        // Creating a new instance of the Login model
        $db = new Login();
        $response = $db->Login($email, $password);
        if (count($response) > 0) {
            return redirect('dashboard')->with('successMessage' ,'Welcome back Master hahahaha');
        }
        else {
            return redirect('/')->with('successMessage','Login Field');
        }
    }

    function logout(){
    Auth::logout();
    return redirect('login')->with('successMessage','Successful logout');
}


    public function ForgotPassword(){

        return view('UserInterface.forgot');

    }

    public function sentForgotPassword(Request $request ,){

        $email = $request->email;
        $resume =DB::table('resume_users')->where('email', $email )->exists();
        $v = validator::make($request->all(),[
            "email"=>'required',
        ]);

        if($v->fails()){
            return back()->withErrors($v)->withInput();
        }
        if ($resume) {
            $token = Str::random(60);
                DB::table('forgotpassword')->insert([
                'email' => $email,
                'token' => $token
            ]);

        $url =url("/forgotPassword/{$token}?email={$email}");

        $send['from'] = $request->email;
        $send['subject'] = 'forgotPassword';
        $data['email'] = $request->email;
        $data['resume_message'] =$url;



        $email_to = $email;

        Mail::to($email_to)->send(new myTestMail($data));

        return back()->with('successMessage', 'Forgot password email sent successfully. Please check your email for instructions.');
        }
        else{
            return back()->with('successMessage' ,'This email is not existing our database.');
        }
    }

    public function storeNewPassword(Request $request){
        $email = $request->input('email');
        $token = $request->token;
        $token =DB::table('forgotPassword')->where('token', $token )->where('email',$email)->exists();
        if ($token){
            return view('UserInterface.storeNewPassword', compact('email'));
        }
        else{
            return "invalid token";
        }

    }

    public function updatePassword(Request $request ){

        $email = $request->input('email');
        $password = $request -> input('password');
        $confirmPassword = $request -> input('confirmPassword');

        $validator = Validator::make($request->all(),[
            'password' => 'required|min:8',
            'confirmPassword' => 'required|min:8',

        ]);


        if($validator -> fails()){

            return back()->withErrors($validator)->withInput();
        }

        if ($password === $confirmPassword) {

             DB::update("UPDATE resume_users SET password = ? WHERE email = ?", [$password, $email]);


            return back()->with('successMessage' , 'Your password is successfully reset. ');
        } else {
            return back()->withErrors(['password' => 'The passwords do not match.',]);
        }


    }

    public function register(){

        return view('UserInterface.register');
    }

    public function register_store(Request $request){

        $email = $request ->input('email');
        $password = $request -> input('password');

        $v = validator::make($request->all(),[
            "email"=>['required' , 'email', Rule::unique('resume_users','email')],
            'password' => 'required|min:8',
        ]);

        if($v->fails()){
            return back()->withErrors($v)->withInput();
        }
        else{
            DB::table('resume_users')->insert(['email' => $ mail , 'password' =>$password ]);
        }

        return back()->with('successMessage','Your Successful Register' );
    }

}
