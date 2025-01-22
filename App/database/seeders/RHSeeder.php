<?php

// database/seeders/RHSeeder.php
namespace Database\Seeders;

use App\Models\RH;
use Illuminate\Database\Seeder;

class RHSeeder extends Seeder
{
    public function run()
    {
        RH::create([
            'nom' => 'Khalid M',
            'email' => 'khalid.m@example.com',
        ]);

        RH::create([
            'nom' => 'Laila B',
            'email' => 'laila.b@example.com',
        ]);
    }
}
