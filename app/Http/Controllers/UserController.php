<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
     public function index()
    {
        if (!auth()->user()->is_approved) {
            return view('user.pending');
        }
        return view('user.dashboard');
    }
}
