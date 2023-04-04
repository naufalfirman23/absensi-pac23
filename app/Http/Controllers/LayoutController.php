<?php

namespace App\Http\Controllers;

use App\Models\ModelEvents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LayoutController extends Controller
{
    public function index()
    {
        $event_data = ModelEvents::all();
        return view('layout.home', compact('event_data')); 
    }
}
