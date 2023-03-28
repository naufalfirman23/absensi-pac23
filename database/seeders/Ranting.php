<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Ranting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ranting = [
            [
                'nama_ranting' => 'Nusawungu'
            ],
            [
                'nama_ranting' => 'Klumprit'
            ],
            [
                'nama_ranting' => 'Kedungbenda'
            ],
            [
                'nama_ranting' => 'BanjarSari'
            ],
            [
                'nama_ranting' => 'Banjareja'
            ],
            [
                'nama_ranting' => 'BanjarWaru'
            ],
            [
                'nama_ranting' => 'Karang Pakis'
            ],
            [
                'nama_ranting' => 'Karang Tawang'
            ],
            [
                'nama_ranting' => 'Karang Putat'
            ],
            [
                'nama_ranting' => 'Karang Sambung'
            ],
            [
                'nama_ranting' => 'Nusawangkal'
            ],
            [
                'nama_ranting' => 'Purwodadi'
            ],
            [
                'nama_ranting' => 'Danasri'
            ],
            [
                'nama_ranting' => 'Danasri Lor'
            ],
            [
                'nama_ranting' => 'Danasri Kidul'
            ],
            [
                'nama_ranting' => 'Sikanco'
            ],
        ];

        foreach ($ranting as $key => $value)
        DB::table('ranting')->insert($value);
    }
}
