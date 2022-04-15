<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    use HasFactory;
    protected $dateformat = 'Y-m-d H:i:sO';
    public $guarded = [];

    public function demandes()
    {
        //relation de plusieurs: une direction contient +sieurs demandes
        return $this->hasMany(Demande::class);
    }

    public function users()
    {
        //relation de plusieurs: une direction contient +sieurs users
        return $this->hasMany(User::class);
    }
}
