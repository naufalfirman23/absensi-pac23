<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {   
        if (Auth::user()){
            return redirect()->intended('home');
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $kredensial = $request->only('username', 'password');

        if (Auth::attempt($kredensial)) {   
            $request->session()->regenerate();
            $user = Auth::user(); 

            if ($user){
                return redirect()->intended('home');
            }
            
        } else {
            return back()->withInput($request->only('username'))->withErrors(['username' => 'Username Atau Password Salah']);
        }
    }
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
