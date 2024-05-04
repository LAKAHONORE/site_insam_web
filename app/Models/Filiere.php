<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;
    protected $fillable = ['cycle_id', 'code', 'intitule'];

    public function cycle() {
        return $this->belongsTo(Cycle::class);
    }

    public function specialites() {
        return $this->hasMany(Specialite::class);
    }

}
