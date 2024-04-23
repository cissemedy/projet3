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
        Schema::create('apprenants', function (Blueprint $table) {
            $table->id();
            $table->integer('matricule');
            $table->string('nom');
            $table->string('prenom');
            $table->string('email');
            $table->date('date_naissance')->nullable();
            $table->string('telephone')->nullable();
            $table->string('adresse')->nullable();

            $table->unsignedBigInteger('universite_id');
            $table->foreign('universite_id')->references('id')->on('universites')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apprenants');
    }
};
