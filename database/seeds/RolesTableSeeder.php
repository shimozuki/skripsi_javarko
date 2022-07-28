<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'         => 1,
                'title'      => 'Admin',
                'created_at' => '2022-07-20 06:09:29',
                'updated_at' => '2022-07-20 06:09:29',
            ],
            [
                'id'         => 2,
                'title'      => 'User',
                'created_at' => '2022-07-20 06:09:29',
                'updated_at' => '2022-07-20 06:09:29',
            ],
        ];

        Role::insert($roles);
    }
}
