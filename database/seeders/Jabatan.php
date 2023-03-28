<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Jabatan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jab = [
            [
                'nama_jabatan'=> 'Ketua'
            ],
            [
                'nama_jabatan'=>'Sekretaris'
            ],
            [
                'nama_jabatan'=>'Bendahara'
            ],
            [
                'nama_jabatan'=>'Koordinator'
            ],
            [
                'nama_jabatan'=>'Anggota'
            ],
        ];

        foreach($jab as $key => $values)
        DB::table('jabatan')->insert($values);
    }
}
