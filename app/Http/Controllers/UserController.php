<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login(Request $request){
        $validated = $request->validate([
            "username" => 'required',
            "password" => 'required'
        ]);

        if(auth()->attempt($validated)){
            $request->session()->regenerate();

            return redirect('/Dashboard/custodian');
        }
        return back()->withErrors(['username' => 'login failed']);
    }

    public function store(Request $request){
        $username = $request->username;
        $pass = $request->password;
        $pass = bcrypt($pass);

        $user = User::create([
            'username' => $username,
            'password' => $pass,
        ]);

        auth()->login($user);

        return redirect('/Dashboard/custodian');
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
