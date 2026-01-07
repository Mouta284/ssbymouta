<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\User;

class UserController extends Controller
{
    public function showLogin(){
        return view('auth.login-form');
    }

    public function showRegister(){
        return view('auth.register-form');
    }

    public function register(Request $request){
        $validated = $request->validate(
            [
                'fullname' => 'string|required|max:30',
                'username' => 'string|required|max:30',
                'email' => 'email|required|max:30',
                'password' => 'string|required|max:16|min:8|confirmed',
            ]
        );

        $user = User::where('username', $validated['username'])->exists();
        $email = User::where('email', $validated['email'])->exists();

        if($user){
            return back()->withErrors('There is an account with the same username, try with another.')->onlyInput('username');
        } else if($email){
            return back()->withErrors('There is an account with this email, try another.')->onlyInput('email');
        }

        $user = User::create([
            'username' => $validated['username'],
            'name' => $validated['fullname'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password'])
        ]);

        Auth::login($user);
        $request->session()->regenerate();
        return redirect()->route('index.story');
    }

    public function login(Request $request){
        $request->validate(
            [
                'username' => 'required|max:30',
                'password' => 'required|max:16|min:8'
            ]
        );

        $user = User::where('username', $request->username)->first();

        if(!$user){
            return back()->withErrors([
                'username' => 'We could not find a user with this username'
            ])->onlyInput('username');
        }

        if(!Hash::check($request->password, $user->password)){
            return back()->withErrors([
                'password' => 'The password is incorrect...'
            ])->onlyInput('password');
        }
        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('index.story');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('index.story');
    }

    public function show($id){
        $user = User::where('id', $id)
                    ->first();
        
        return view('profile.profile-page', ['user' => $user]);
    }
}
