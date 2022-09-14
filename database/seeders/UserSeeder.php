<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1,100) as $index){
        DB::table('users')->insert([
            'name' => Str::random(10),
            'l_name' => Str::random(10),
            'dep' => Str::random(3),
            'image' => Str::random(10),

            'email' => Str::random(10).'@ss.com',
            'password' => Hash::make('password'),
        ]);
    }
    }
}
