<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;


class AuthController extends Controller
{
    public function create()
    {
        return view('users.register');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

       

        // Create user
        $user = User::create($formFields);
        return view('users.login');
    }

    public function showLogin()
    {
        return view('users.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Authentication passed...
            return redirect()->intended('/dashboard'); 
        }

        return back()->withErrors([
            'email' => 'user not found or invalid password.',
            // 'password' => 'user not found or invalid password.',
        ]);

        
        
    }






 public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/dashboard');
    }

  

    public function showForgotPasswordForm()
    {
        return view('users.forgotpassword');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate
        (['email'=>'required|email|exists:users']);

        $token = Str::random(64);

        $emailExists = DB::table('password_reset_tokens')
        ->where('email', $request->email)
        ->exists();

if ($emailExists) {
            return redirect()->route('forgot-password')
            ->withErrors(['email' => 'A reset link has already been sent to this email.']);
}

else{
        DB::table('password_reset_tokens')
        ->insert([
                'email'=>$request->email,
                'token' => $token,
                'created_at' =>Carbon::now()

        ]);  

        Mail::send("emails.forgot-password",['token' => $token],function ($message) use($request){
        $message->to($request->email);
        $message->subject("reset Password");
        });

        return redirect()->to(route("forgot-password"))
        ->with('success',"If the email address matches the one on record, a password reset link will be sent");
    }}

    public function resetPassword($token){

        return view("new-password",compact('token'));
    }

    public function resetPasswordPost(Request $request){
        $request->validate([
            "email" => "required|email|exists:users",
            "password" =>"required|string|min:6|confirmed",
        ]);

        $updatePassword = DB::table('password_reset_tokens')
        ->where([
            'email' =>$request->email,
            "token" => $request->token
             ])->first();
        if(!$updatePassword){
        return redirect()->to(route("reset.password"))
        ->with("error", "Invalid email or token. Please request a new password reset.");
        }
else{
        User::where("email",$request->email)
        ->update(["password" =>Hash::make($request->password)]);

        DB::table("password_reset_tokens")
        ->where(['email'=>$request->email])
        ->delete();

        
        return redirect()->route('login')->with('success', 'Your password has been successfully reset. Please log in with your new password.');

}
    }
}
