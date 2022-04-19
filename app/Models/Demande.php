<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Demande extends Model
{
    use HasFactory;
    protected $dateformat = 'Y-m-d H:i:sO';
    public $guarded = [];
    use Notifiable;

    public function theme()
    {
        // code...demande appartient a un theme
        return $this->belongsTo(Theme::class);
    }

    public function renouvellements()
    {
        // code...une demande contient +sieurs renouvellements
        return $this->HasMany(Renouvellement::class);
    }

    public function users()
    {
        //relation de plusieurs: une demande contient +sieurs users
        return $this->belongsToMany(User::class);
    }

    public function pieces()
    {
        //relation de plusieurs: une demande contient +sieurs pieces
        return $this->hasMany(Piece::class);
    }

    public function evaluations()
    {
        //relation de plusieurs: une demande contient +sieurs evaluations
        return $this->belongsToMany(Evaluation::class);
    }

    public function directions()
    {
        //relation de plusieurs: une demande appartient a une direction
        return $this->belongsTo(Direction::class);
    }
}
