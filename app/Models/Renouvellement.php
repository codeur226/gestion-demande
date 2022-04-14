<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renouvellement extends Model
{
    use HasFactory;
    protected $dateformat = 'Y-m-d H:i:sO';
    public $guarded = [];

    public function demandes()
    {
        //relation de plusieurs: un renouvellement concerne une demande
        return $this->belongsTo(Demande::class);
    }
}
