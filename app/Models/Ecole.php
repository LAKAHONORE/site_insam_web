<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecole extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'intitule',
        'slug'
    ];

   // protected $with=['region'];

    /*public function region(){
        return $this->belongsTo(region::class);
    }

    public function job_seekers(){
        return $this->hasMany(jobSeeker::class);
    }*/
    
    public function generateSlug()
    {
        $this->slug = Str::slug($this->intitule.'-'.Hash::make($this->id));
    }
}
