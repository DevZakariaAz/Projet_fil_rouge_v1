<?php

// database/seeders/FormateurSeeder.php
namespace Database\Seeders;

use App\Models\Formateur;
use Illuminate\Database\Seeder;

class FormateurSeeder extends Seeder
{
    public function run()
    {
        Formateur::create([
            'nom' => 'Ali Ben',
            'matiere' => 'Mathématiques',
            'email' => 'ali.ben@example.com',
        ]);
        
        Formateur::create([
            'nom' => 'Sara El',
            'matiere' => 'Physique',
            'email' => 'sara.el@example.com',
        ]);
    }
}
