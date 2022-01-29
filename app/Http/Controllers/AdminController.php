<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // public function index()
    // {
    //     return view('admin.home');
    // }
    public function uploadData()
    {
        return view('admin.upload');
    }
    public function editData()
    {
        return view('admin.edit-post');
    }
    public function uploadDokumentasi()
    {
        return view('admin.upload-file');
    }
}
