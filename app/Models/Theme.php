<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;
    protected $dateformat = 'Y-m-d H:i:sO';
    public $guarded = [];

    public function demandes()
    {
        //relation de plusieurs: un thème contient +sieurs demandes
        return $this->hasMany(Demande::class);
    }
}
