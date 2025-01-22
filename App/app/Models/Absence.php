<?php

// app/Models/Absence.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    protected $fillable = ['seance_id', 'stagiaire_id', 'date', 'statut'];

    public function seance()
    {
        return $this->belongsTo(Seance::class);
    }

    public function stagiaire()
    {
        return $this->belongsTo(Stagiaire::class);
    }
}
