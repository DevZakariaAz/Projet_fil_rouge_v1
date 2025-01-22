<?php

// app/Models/Stagiaire.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'email', 'groupe'];

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }
}
