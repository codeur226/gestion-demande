<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $dateformat = 'Y-m-d H:i:sO';
    public $guarded = [];

    public function permissions()
    {
        //relation de plusieurs: un role contient +sieurs permissions
        return $this->belongsToMany(Permission::class);
    }

    public function users()
    {
        //relation de plusieurs: un role contient +sieurs users
        return $this->belongsToMany(User::class);
    }
}
