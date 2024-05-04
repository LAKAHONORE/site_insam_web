<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('composers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inscription_id')->constrained();
            $table->foreignId('examen_id')->constrained();
            $table->foreignId('matiere_id')->constrained();
            $table->double('note')->nullable()->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('composers');
    }
};
