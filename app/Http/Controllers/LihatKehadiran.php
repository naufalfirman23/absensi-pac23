<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LihatKehadiran extends Controller
{
    public function index()
    {
        return view('layout.user.kehadiran');
    }
}
