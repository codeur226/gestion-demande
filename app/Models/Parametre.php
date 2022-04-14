<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parametre extends Model
{
    use HasFactory;
    protected $dateformat = 'Y-m-d H:i:sO';
    public $guarded = [];

    public function valeurs()
    {
        //relation de plusieurs: un parametre contient +sieurs valeur
        return $this->hasMany(Valeur::class);
    }
}
