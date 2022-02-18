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
            return view('login');
        }
    }

    public function register()
    {
        // if (Auth::check()) {
        //     return redirect(route('home'));
        // } else {
        //     return view('register');
        // }

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
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        }
    }

    public function actionregister(Request $request)
    {
        if ($request->password == $request->confirmpassword) {
            User::create([
                'name' => trim($request->nama),
                'email' => strtolower($request->email),
                'username' => strtolower($request->username),
                'role' => strtolower($request->role),
                'password' => bcrypt($request->password),
            ]);
            session()->flash('message', 'Akun berhasil dibuat');

            return redirect()->route('login');
        } else {
            Session::flash('error', 'Pembuatan akun gagal!');

            return redirect()->route('register');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
