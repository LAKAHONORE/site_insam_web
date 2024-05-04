<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annee extends Model
{
    use HasFactory;
    protected $fillable = ['intitule', 'etat'];

    public static function active() {
        return Annee::where('etat', 1)->get()[0];
    }
}
