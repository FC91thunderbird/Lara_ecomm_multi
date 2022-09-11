<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view('layouts.admin.content.dashboard');
    }
    
    public function profile(){
        return view('layouts.admin.content.profile');
    }
}
