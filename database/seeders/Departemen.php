<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Departemen extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dept = [     
            [
            'nama_dept' => 'Organisasi'
            ],
            [
            'nama_dept' => 'Kaderisasi'
            ],
            [
            'nama_dept' => 'Dakwah'
            ],
            [
            'nama_dept' => 'Jaringan Sekolah & Pesantren'
            ],
            [
            'nama_dept' => 'CBP-KPP'
            ],
            [
            'nama_dept' => 'Publikasi & Pers'
            ],
            [
            'nama_dept' => 'Lembaga Pemberdayaan Ekonomi dan Kewirausahaan'
            ],
        ];
        foreach($dept as $key => $values){
            DB::table('departemen')->insert($values);
        }
    }
}
