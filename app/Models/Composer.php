<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Composer extends Model
{
    use HasFactory;
    protected $fillable = ['inscription_id', 'matiere_id', 'examen_id', 'note'];

    public function inscription() {
        return $this->belongsTo(Inscription::class);
    }

    public function matiere() {
        return $this->belongsTo(Matiere::class);
    }

    public function examen() {
        return $this->belongsTo(Examen::class);
    }

}
