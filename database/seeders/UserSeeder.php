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
            [
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
            ],
            [
                'id' => 2,
                'name' => 'user_1',
                'email' => 'user_1@gmail.com',
                'password' => Hash::make('user_1'),
            ],
            [
                'id' => 3,
                'name' => 'user_2',
                'email' => 'user_2@gmail.com',
                'password' => Hash::make('user_2'),
            ],
        ]);
    }
}
