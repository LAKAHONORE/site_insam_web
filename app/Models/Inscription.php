<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;
    protected $fillable = [ "etudiant_id", "specialite_id", "niveau_id", "annee_id" ];

    public function etudiant() {
        return $this->belongsTo(Etudiant::class);
    }

    public function specialite() {
        return $this->belongsTo(Specialite::class);
    }

    public function notes() {
        return $this->hasMany(Composer::class);
    }

    public function niveau() {
        return $this->belongsTo(Niveau::class);
    }

    public function annee() {
        return $this->belongsTo(Annee::class);
    }

}
