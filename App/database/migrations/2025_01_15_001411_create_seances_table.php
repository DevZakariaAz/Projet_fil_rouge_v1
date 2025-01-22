<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('seances', function (Blueprint $table) {
            $table->id();
            $table->string('cours');
            $table->dateTime('horaire');
            $table->integer('duree');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('seances');
    }
};
