<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class apprenant extends Model
{
    use HasFactory;
    protected $fillable = [
        'matricule',
        'nom',
        'prenom',
        'email',
        'date_naissance',
        'telephone',
        'adresse'
    ];

    public function universite():BelongsTo
    {
        return $this->BelongsTo(Universite::class);
    } 
}
