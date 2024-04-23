<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class niveau extends Model
{
    use HasFactory;
    protected $fillable = [
        'licence_1',
        'licence_2',
        'licence_3',
        'master_1',
        'master_2',
        'doctorat'
    ];
}
