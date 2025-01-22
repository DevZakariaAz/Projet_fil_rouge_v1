<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('absences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seance_id')->constrained();
            $table->foreignId('stagiaire_id')->constrained();
            $table->date('date');
            $table->string('statut');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('absences');
    }
};
