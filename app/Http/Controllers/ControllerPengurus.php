<?php

namespace App\Http\Controllers;

use App\Models\ModelsDepartemen;
use App\Models\ModelsJabatan;
use App\Models\ModelsRanting;
use App\Models\Pengurus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ControllerPengurus extends Controller
{
    public function index()
    {
        $data = Pengurus::all();
        $jabatan = ModelsJabatan::all();
        $ranting = ModelsRanting::all();
        $departemen = ModelsDepartemen::all();
 
        
        return view('layout.admin.pengurus',compact('data', 'jabatan','ranting','departemen'));
    }
    public function hapus($id)
    {

        $data = Pengurus::find($id);
        $data->delete();
        $user = User::find($id);
        $user->delete();

        return redirect('data-pengurus');
    }


    public function input(Request $request)
    {
        $username = $request->nama;
        $first_name = explode(' ', $username);
        $first_word = $first_name[0];

        $id = User::create([
            'username' => $first_word,
            'email' => Str::random(5).'@gmail.com',
            'password' => Hash::make(123),
            'level' => 2,
            
        ]);
        Pengurus::create([
            'nama_pengurus' => $request->nama,
            'id_jabatan' => $request->jabatan,
            'id_ranting' => $request->ranting,
            'id_departemen' => $request->departemen,
            'id_pengurus' => $id->id
        ]);

        return redirect('data-pengurus');
    }

    public function update(Request $request,$id)
    {
        $data_p = Pengurus::find($id);
        $data_p->update([
            'nama_pengurus' => $request->edit_nama,
            'id_jabatan' => $request->edit_jabatan,
            'id_ranting' => $request->edit_ranting,
            'id_departemen' => $request->edit_departemen,
        ]);
        
        return redirect('data-pengurus');
    }
    public function cetakdata()
    {
        $data = Pengurus::all();
        $jabatan = ModelsJabatan::all();
        $ranting = ModelsRanting::all();
        $departemen = ModelsDepartemen::all();
        return view('layout.admin.cetakdata', compact('data', 'jabatan','ranting','departemen'));
    }
}
