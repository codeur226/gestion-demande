<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande_user extends Model
{
    use HasFactory;
    protected $dateformat = 'Y-m-d H:i:sO';
    public $guarded = [];
}
