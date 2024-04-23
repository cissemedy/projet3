<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('niveaux', function (Blueprint $table) {
            $table->id();
            
            $table->string('licence_1');   
            $table->string('licence_2');
            $table->string('licence_3');
            $table->string('master_1'); 
            $table->string('master_2');
            $table->string('doctorat');                  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('niveaux');
    }
};
