<?php

namespace App\Policies\Penduduk\Ref;

use App\Models\User;
use App\Models\Penduduk\Ref\Pekerjaan;
use Illuminate\Auth\Access\HandlesAuthorization;

class PekerjaanPolicy
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
        return $user->can('view_any_penduduk::ref::pekerjaan');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Penduduk\Ref\Pekerjaan  $pekerjaan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Pekerjaan $pekerjaan)
    {
        return $user->can('view_penduduk::ref::pekerjaan');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create_penduduk::ref::pekerjaan');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Penduduk\Ref\Pekerjaan  $pekerjaan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Pekerjaan $pekerjaan)
    {
        return $user->can('update_penduduk::ref::pekerjaan');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Penduduk\Ref\Pekerjaan  $pekerjaan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Pekerjaan $pekerjaan)
    {
        return $user->can('delete_penduduk::ref::pekerjaan');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteAny(User $user)
    {
        return $user->can('{{ DeleteAny }}');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Penduduk\Ref\Pekerjaan  $pekerjaan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Pekerjaan $pekerjaan)
    {
        return $user->can('{{ ForceDelete }}');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDeleteAny(User $user)
    {
        return $user->can('{{ ForceDeleteAny }}');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Penduduk\Ref\Pekerjaan  $pekerjaan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Pekerjaan $pekerjaan)
    {
        return $user->can('{{ Restore }}');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restoreAny(User $user)
    {
        return $user->can('{{ RestoreAny }}');
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Penduduk\Ref\Pekerjaan  $pekerjaan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function replicate(User $user, Pekerjaan $pekerjaan)
    {
        return $user->can('{{ Replicate }}');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function reorder(User $user)
    {
        return $user->can('{{ Reorder }}');
    }

}
