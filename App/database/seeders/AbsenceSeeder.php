<?php

// database/seeders/AbsenceSeeder.php
namespace Database\Seeders;

use App\Models\Absence;
use App\Models\Seance;
use App\Models\Stagiaire;
use Illuminate\Database\Seeder;

class AbsenceSeeder extends Seeder
{
    public function run()
    {
        $seance = Seance::first();
        $stagiaire = Stagiaire::first();

        Absence::create([
            'seance_id' => $seance->id,
            'stagiaire_id' => $stagiaire->id,
            'date' => '2025-01-15',
            'statut' => 'Absent',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Absence::create([
            'seance_id' => $seance->id,
            'stagiaire_id' => $stagiaire->id,
            'date' => '2025-01-16',
            'statut' => 'Present',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
