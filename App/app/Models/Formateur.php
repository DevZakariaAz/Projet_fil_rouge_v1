<?php

// app/Models/Formateur.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formateur extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'matiere', 'email'];

    public function seances()
    {
        return $this->hasMany(Seance::class);
    }
}
