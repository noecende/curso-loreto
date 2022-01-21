<?php

namespace App\Policies;

use App\Models\Mascota;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MascotaPolicy
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
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Mascota $mascota)
    {
        //
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
        //('0' === 0); //false
        //('0' == 0); //true
        return ($user->is_admin == true); 
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Mascota $mascota)
    {
        //
        return ($user->is_admin == true); 
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Mascota $mascota)
    {
        //
        return ($user->is_admin == true); 
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Mascota $mascota)
    {
        //
        return ($user->is_admin == true); 
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Mascota  $mascota
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Mascota $mascota)
    {
        //
    }
}
