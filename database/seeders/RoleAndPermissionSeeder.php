<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'id' => 1,
                'name' => 'Admin',
                'guard_name' => 'web',

            ],
            [
                'id' => 2,
                'name' => 'User',
                'guard_name' => 'web',

            ],
        ]);
        DB::table('model_has_roles')->insert([
            [
                'role_id' => 1,
                'model_type' => 'App\Models\User',
                'model_id' => 1,

            ],
            [
                'role_id' => 2,
                'model_type' => 'App\Models\User',
                'model_id' => 2,

            ],
            [
                'role_id' => 2,
                'model_type' => 'App\Models\User',
                'model_id' => 3,
            ]
        ]);
    }
}
