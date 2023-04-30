<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\Validate;
use App\Mail\DemoEmail;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function getSignIn() {
        return view('auth.signin');
    }
    public function getSignUp() {
        return view('auth.signup');
    }
    public function verify($id) {
        DB::table('users')
        ->where('id', $id)
        ->update(['email_verified_at' => now()]);
        return redirect('/signin')->with('status', 'Email Verified!');
    }   
    public function signUp(Request $request) {
        if(Auth::check()) {
            return redirect('/signup')->withErrors('You are already signed in!');
        }

        $request->validate([
            'name' => 'required|min:2|max:255|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3|max:255|string|confirmed'
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $mailData = new \stdClass();
        $mailData->text = ('Link to verify: ');
        $mailData->url = ('http://127.0.0.1:8000/signin/'. $user->id);
        Mail::to($user->email)->send(new Validate($mailData));
        return redirect('/signin');
    }

    public function signIn(Request $request) {
        if(Auth::check()) {
            return redirect('/signin')->withErrors('You are already signed in!');
        }

        $request->validate([
            'email' => 'required|exists:users,email|exists:users,email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            return redirect()->intended('/')->with('status', 'Sign in');
        }

        return redirect('/signin')->withErrors('Invalid credentials');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('signin');
    }
}
