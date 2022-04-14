<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $dateformat = 'Y-m-d H:i:sO';
    public $guarded = [];

    public function roles()
    {
        //relation de plusieurs: une permission appartient a +sieurs roles
        return $this->belongsToMany(Role::class);
    }
}
