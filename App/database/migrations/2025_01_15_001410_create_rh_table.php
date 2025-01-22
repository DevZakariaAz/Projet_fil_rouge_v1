<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('r_h_s', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('email');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('rh');
    }
};
