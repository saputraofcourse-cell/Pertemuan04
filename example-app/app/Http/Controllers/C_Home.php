<?php

namespace App\Http\Controllers;

class C_Home extends Controller
{
    public function index()
    {
        return view('v_home');
    }
}