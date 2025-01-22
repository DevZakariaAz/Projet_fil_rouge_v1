<?php

// database/seeders/StagiaireSeeder.php
namespace Database\Seeders;

use App\Models\Stagiaire;
use Illuminate\Database\Seeder;

class StagiaireSeeder extends Seeder
{
    public function run()
    {
        Stagiaire::create([
            'nom' => 'Yassine A',
            'email' => 'yassine.a@example.com',
            'groupe' => 'Group 1',
        ]);

        Stagiaire::create([
            'nom' => 'Meryem F',
            'email' => 'meryem.f@example.com',
            'groupe' => 'Group 2',
        ]);
    }
}
