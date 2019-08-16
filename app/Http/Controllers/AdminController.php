<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('admin/index');
    }

    public function profile()
    {
        # code...
        return view('admin/profile');
    }
}
