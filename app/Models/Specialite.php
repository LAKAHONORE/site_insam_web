<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    use HasFactory;
    protected $fillable = ['filiere_id', 'code', 'intitule', 'periode'];

    public function filiere() {
        return $this->belongsTo(Filiere::class);
    }

    public function inscriptions($niveau_id = 0) {
        if ($niveau_id !== 0) {
            return $this->hasMany(Inscription::class)
            ->with('notes')
            ->where([
                'annee_id' => Annee::active()->id,
                'niveau_id' => $niveau_id,
            ])
            ->join('etudiants', 'etudiants.id', 'inscriptions.etudiant_id')
            ->orderBy('etudiants.nom')->get();
        }
        else {
            return $this->hasMany(Inscription::class)
            ->where('annee_id', Annee::active()->id)
            ->join('etudiants', 'etudiants.id', 'inscriptions.etudiant_id')
            ->orderBy('etudiants.nom')->get();
        }
        
    }

    public function matieres($niveau_id) {
        return $this->hasMany(Matiere::class)
        ->where([
            'annee_id' => Annee::active()->id,
            'niveau_id' => $niveau_id,
        ])->get();
    }
}
