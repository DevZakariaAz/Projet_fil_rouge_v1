<?php

// database/seeders/SeanceSeeder.php
namespace Database\Seeders;

use App\Models\Seance;
use App\Models\Formateur;
use Illuminate\Database\Seeder;

class SeanceSeeder extends Seeder
{
    public function run()
    {
        $formateur = Formateur::first();

        Seance::create([
            'cours' => 'Mathematics 101',
            'horaire' => '2025-01-16 08:00:00',
            'duree' => 120,
            'formateur_id' => $formateur->id,
        ]);

        Seance::create([
            'cours' => 'Physics 101',
            'horaire' => '2025-01-16 10:00:00',
            'duree' => 120,
            'formateur_id' => $formateur->id,
        ]);
    }
}
