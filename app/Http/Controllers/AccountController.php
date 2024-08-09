<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;


class AccountController extends Controller
{
    public function index()
    {
        return redirect(route('home'));
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect(route('home'));
        } else {
            // return redirect()->back();
            return view('login');
        }
    }

    public function register()
    {
        return view('register');
    }

    public function actionlogin(Request $request)
    {
        $loginEmail = [
            'email' => $request->emailusername,
            'password' => $request->password,
        ];

        $loginUsername = [
            'username' => $request->emailusername,
            'password' => $request->password,
        ];

        if (Auth::Attempt($loginEmail)) {
            return redirect(route('home'));
        } else if (Auth::Attempt($loginUsername)) {
            return redirect(route('home'));
        } else {
            Session::flash('error', 'Email/Username atau Password Salah.');
            return redirect()->back();
        }
    }

    public function actionregister(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|unique:users',
                'username' => 'required|unique:users',
                'password' => 'required|min:5|max:20',
                'confirmpassword' => 'required|same:password',
            ],
            [
                'email.unique' => 'Email sudah digunakan.',
                'username.unique' => 'Username sudah digunakan.',
                'confirmpassword.same' => 'Password dan confirm password harus sesuai.',
            ]
        );

        User::create([
            'name' => trim($request->nama),
            'email' => strtolower($request->email),
            'username' => strtolower($request->username),
            'role' => strtolower($request->role),
            'password' => bcrypt($request->password),
        ]);
        Session::flash('success', 'Akun berhasil dibuat');
        return redirect()->route('adminhome');
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
