<?php

namespace App\Http\Controllers;

use App\Http\Controller\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Home;

class UserController extends Controller
{
    public function registerUser(Request $req) {
        $req->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'repassword' => 'required|same:password',
        ]);

        User::create([
            'fname' => $req->fname,
            'lname' => $req->lname,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'repassword' => Hash::make($req->repassword),
        ]);

        return redirect() -> route('login');
    }

    public function loginUser(Request $req) {
        // dd($req->all());
    
        $req -> validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($req->only(['email', 'password']))) {
            // dd('Login');
            return redirect() -> route('dashboard');
        } else {
            // dd('User not found');
            return back() -> with('fail', 'User not found!');
        }
    }
}
