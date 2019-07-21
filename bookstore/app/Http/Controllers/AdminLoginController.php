<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    //Return admin login view
    public function show() 
    {
        return view('admin.login');
    }
}
