<?php

namespace App\Http\Controllers;

use App\Models\ModelAbsensi;
use App\Models\ModelEvents;
use App\Models\ModelsDepartemen;
use App\Models\ModelsJabatan;
use App\Models\ModelsRanting;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsensiController extends Controller
{
    public function index()
    {
        $event = ModelEvents::all();
        return view('layout.admin.rekap', compact('event'));
    }

    public function tambahevent(Request $request)
    {
        $id = ModelEvents::create([
            'nama_event' => $request->nama_event,
            'lokasi_event' => $request->loc_event,
            'tgl_event' => $request->tgl_event,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('absenin-rekan')->with('id',$id);
       
    }

    public function hapusevent($id)
    {
        $data = ModelEvents::find($id);
        $data->delete();
        return redirect('master-absen');
    }


    public function absenin()
    {
        return view('layout.admin.scan');
        
    }



    public function validasi(Request $request){

        $event = ModelEvents::latest()->first();
        $data = Pengurus::where('id_pengurus', $request->qr_code)->first();

        if($data){
            // $dataabsen = ModelAbsensi::where('id_pengurus', $request->qr_code)->get();
            $dataabsen = DB::table('absensi')->where('id_pengurus',$data->id_pengurus)->where('id_event',$event->id)->first();
            if($dataabsen){
                return response()->json([
                    'status' => 500,
                    'message' => 'Sudah Melakukan Absensi',
                    'hasil' => $dataabsen
                ]);
                
            }
            else{
                ModelAbsensi::create(   
                    [
                        'id_event' => $event->id,   
                        'id_pengurus' => $request->qr_code,
                        'status' => 'Hadir'
                        ]
                    );
                    return response()->json([
                        'status' => 200,
                        'hasil' => $dataabsen,
                        'message' => 'Berhasil Absensi'
                ]);
             }

        }else{
            return response()->json([
                'status' => 400,
                'message' => 'Data Tidak Ditemukan'
            ]);
        }
        
        return redirect('absenin-rekan');

    }

    public function cetakabsen($id)
    {
        $data_absensis = ModelAbsensi::select('absensi.*', 'pengurus.nama_pengurus', 'event.nama_event', 'event.lokasi_event','event.tgl_event', 'event.deskripsi')
        ->join('pengurus', 'absensi.id_pengurus', '=', 'pengurus.id_pengurus')
        ->join('event', function ($join) use ($id){
            $join->on('absensi.id_event', '=', 'event.id')
                 ->where('absensi.id_event', '=', $id);
        })
        ->get();

        return view('layout.admin.cetakkehadiran', compact('data_absensis'));
    }


}
