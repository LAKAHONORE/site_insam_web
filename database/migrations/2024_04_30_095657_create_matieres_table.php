<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('matieres', function (Blueprint $table) {
            $table->id();
            $table->foreignId('specialite_id')->constrained();
            $table->foreignId('niveau_id')->constrained();
            $table->foreignId('module_id')->constrained();
            $table->foreignId('annee_id')->constrained();
            $table->string('code');
            $table->string('intitule');
            $table->double('credit');
            $table->double('heure');
            $table->integer('semestre');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('matieres');
    }
};
