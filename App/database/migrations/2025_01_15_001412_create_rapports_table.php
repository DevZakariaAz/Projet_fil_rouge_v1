<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('rapports', function (Blueprint $table) {
            $table->id();
            $table->text('contenu');
            $table->date('dateCreation');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('rapports');
    }
};
