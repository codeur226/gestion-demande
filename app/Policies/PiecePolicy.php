<?php

namespace App\Policies;

use App\Models\Piece;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PiecePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Piece  $piece
     * @return mixed
     */
    public function view(User $user, Piece $piece)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Piece  $piece
     * @return mixed
     */
    public function update(User $user, Piece $piece)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Piece  $piece
     * @return mixed
     */
    public function delete(User $user, Piece $piece)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Piece  $piece
     * @return mixed
     */
    public function restore(User $user, Piece $piece)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Piece  $piece
     * @return mixed
     */
    public function forceDelete(User $user, Piece $piece)
    {
        //
    }
}
