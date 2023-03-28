<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Pengurus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pengurus = 
        [
            [
                'id_jabatan' => 1,
                'id_ranting' => 3,
                'id_departemen' => 1,
                'id_users' => 1,
            ]
        ];

        DB::table('pengurus')->insert($pengurus);
    }
}
