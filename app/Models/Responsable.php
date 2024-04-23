<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class responsable extends Model
{
    use HasFactory;
    protected $fillable= [
        'nom',
        'prenom',
        'adresse',
        'E_mail',
        'numero',
    ];
}
