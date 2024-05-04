<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    protected $fillable = [
        'matricule', 'sexe', 'nom', 'prenom', 'date_naissance', 'lieu', 'nationalite',
        'region', 'departement', 'domicile', 'telephone', 'email', 'etablissement',
        'diplome', 'mention', 'annee', 'pere', 'mere', 'personne_a_contacter',
        'telephone_pere',  'telephone_mere', 'telephone_personne_a_contacter'
    ];

    public function inscription(int $annee) {
        return $this->hasOne(Inscription::class)->where('annee_id', $annee);
    }
}
