<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function arsip()
    {
        return view('post');
    }
    public function statistic()
    {
        return view('statistic');
    }
    public function filter()
    {
        return view('filter');
    }
}
