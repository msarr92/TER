<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gar extends Model
{
    use HasFactory;
    protected $fillable = [
        'Nom',
        'Categorie',
    ];
}
