<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Videojuego;
use Illuminate\Auth\Access\HandlesAuthorization;

class VideojuegoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
        return $user->is_admin == true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Videojuego  $videojuego
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Videojuego $videojuego)
    {
        if($user->is_admin) {
            return true;
        }
        //Si el videojuego le pertenece al usuario, devuelve true.
        return $user->id == $videojuego->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Videojuego  $videojuego
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Videojuego $videojuego)
    {
        //
        if($user->is_admin) {
            return true;
        }
        //Si el videojuego le pertenece al usuario, devuelve true.
        return $user->id == $videojuego->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Videojuego  $videojuego
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Videojuego $videojuego)
    {
        if($user->is_admin) {
            return true;
        }
        //Si el videojuego le pertenece al usuario, devuelve true.
        return $user->id == $videojuego->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Videojuego  $videojuego
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Videojuego $videojuego)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Videojuego  $videojuego
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Videojuego $videojuego)
    {
        //
    }
}
