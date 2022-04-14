<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valeur extends Model
{
    use HasFactory;
    protected $dateformat = 'Y-m-d H:i:sO';
    public $guarded = [];

    public function Parametre()
    {
        // code...valeur appartient a un parametre
        return $this->belongsTo(Parametre::class);
    }
}
