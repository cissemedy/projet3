<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    protected $table= 'Professeurs';
    protected $primayKey= 'id';
    protected $fillable= ['last_name', 'first_name', 'mobile', 'email', 'address', 'cours'];
    use HasFactory;
}
