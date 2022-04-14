<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
    use HasFactory;
    protected $dateformat = 'Y-m-d H:i:sO';
    public $guarded = [];

    public function demandes()
    {
        //relation de plusieurs: une piece appartient a une demande
        return $this->belongsTo(Demande::class);
    }
}
