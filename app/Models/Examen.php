<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'intitule'];

    public function notes() {
        return $this->hasMany(Composer::class);
    }
}
