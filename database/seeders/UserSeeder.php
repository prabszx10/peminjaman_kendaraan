<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            'name' => 'Dicky Octianto',
            'email' => 'admin@mail.com',
            'role' => 'admin',
            'password' => Hash::make('password')
        ]);
        DB::table('users')->insert([
            'name' => 'Prabowo',
            'email' => 'approval@mail.com',
            'role' => 'approval',
            'password' => Hash::make('password')
        ]);
    }
}
