<?php

// database/seeders/RapportSeeder.php
namespace Database\Seeders;

use App\Models\Rapport;
use Illuminate\Database\Seeder;

class RapportSeeder extends Seeder
{
    public function run()
    {
        Rapport::create([
            'contenu' => 'This is a report for absence handling.',
            'dateCreation' => now(),
        ]);
        
        Rapport::create([
            'contenu' => 'This is another report.',
            'dateCreation' => now(),
        ]);
    }
}
