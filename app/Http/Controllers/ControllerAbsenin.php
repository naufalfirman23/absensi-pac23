<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerAbsenin extends Controller
{
    
    public function index(Request $request)
    {
        // $event = ModelEvents::latest()->first();
        
        // ModelAbsensi::create(
        //     [
        //         'id_event' => $event->id,
        //         'id_pengurus' => 2,
        //         'status' => 'Hadir'
        //     ]
        // );
        return view('layout.admin.scan');
        
    }
    
    public function validasi(Request $request){
        dd($request->qr_code);
        

    }
}
