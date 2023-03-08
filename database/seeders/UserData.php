<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = [
            [
                'name' => 'esa',
                'username' => 'esa',
                'password' => bcrypt('111'),
                'level' => 1,
                'email' => 'esa@esa.com'
            ],
            [
                'name' => 'alba',
                'username' => 'alba',
                'password' => bcrypt('112'),
                'level' => 2,
                'email' => 'zaedar@esa.com'
            ],

        ];
        foreach($user as $key => $values){
            User::create($values);
        }
    }
}
