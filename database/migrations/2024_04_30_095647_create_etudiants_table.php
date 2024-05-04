<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->longText('matricule');
            $table->string('sexe');
            $table->string('nom');
            $table->string('prenom');
            $table->string('date_naissance');
            $table->string('lieu');
            $table->string('nationalite');
            $table->string('region');
            $table->string('departement');
            $table->string('domicile');
            $table->integer('telephone');
            $table->string('email')->unique()->nullable()->default('');
            $table->string('etablissement');
            $table->string('diplome');
            $table->string('mention');
            $table->integer('annee');
            $table->string('pere');
            $table->string('mere');
            $table->string('personne_a_contacter');
            $table->integer('telephone_pere');
            $table->integer('telephone_mere');
            $table->integer('telephone_personne_a_contacter');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('etudiants');
    }
};
