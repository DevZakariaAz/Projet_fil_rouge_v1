<?php

// database/seeders/DatabaseSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            FormateurSeeder::class,
            RHSeeder::class,
            SeanceSeeder::class,
            StagiaireSeeder::class,
            RapportSeeder::class,
            AbsenceSeeder::class,
        ]);
    }
}
