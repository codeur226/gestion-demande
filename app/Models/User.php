<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    protected $dateformat = 'Y-m-d H:i:sO';
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'type_user',
        'email',
        'direction_id',
        'password',
        'role_id',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        //relation de plusieurs: un user contient +sieurs roles
        return $this->belongsToMany(Role::class);
    }

    public function demandes()
    {
        //relation de plusieurs: un user contient +sieurs demandes
        return $this->belongsToMany(Demande::class);
    }

    public function directions()
    {
        //relation de plusieurs: un user appartient a une direction
        return $this->belongsTo(Direction::class);
    }
}
