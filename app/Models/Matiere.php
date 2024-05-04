<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;
    protected $fillable = ['specialite_id', 'niveau_id', 'module_id', 'annee_id', 'code', 
        'intitule', 'credit', 'heure', 'semestre'
    ];

    public function specialite() {
        return $this->belongsTo(Specialite::class);
    }

    public function module() {
        return $this->belongsTo(Module::class);
    }

    public function niveau() {
        return $this->belongsTo(Niveau::class);
    }

    public function notes() {
        return $this->hasMany(Composer::class);
    }
}
