<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Coba;

class cobaTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coba = [
            'name' => 'liya',
            'email' => 'liya@example.com',
            'password' => hash('sha256', 'password'),
        ];

        Coba::insert($coba);
    }
}
