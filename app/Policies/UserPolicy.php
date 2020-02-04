<?php

namespace App\Policies;

use App\User;
use App\Administrator;
use App\Editor;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function view(User $user)
    {
            // dump($user->id);
            $userAuth = DB::table('administrators')->where('user_id', '=', $user->id)->first();

            // dump($userAuth);

            if($userAuth == null){
                // dump("Editor");
                return false;
            }
            else{
                // dump("Adm");  É um administrador e pode Visualizar
                return true;
            }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //dump($user->id);
        $userAuth = DB::table('administrators')->where('user_id', '=', $user->id)->first();
        // dump($userAuth);

        if($userAuth == null){
            //dump("Editor");
            return false;
        }
        else{
            //dump("Adm");  É um administrador e pode Criar
            return true;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function update(User $user)
    {
        // dump($user->id);
        $userAuth = DB::table('administrators')->where('user_id', '=', $user->id)->first();
        // dump($userAuth);

        if($userAuth == null){
            // dump("Editor");
            return false;
        }
        else{
            // dump("Adm"); É um administrador e pode editar
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function delete(User $user)
    {
        // dump($user->id);
        $userAuth = DB::table('administrators')->where('user_id', '=', $user->id)->first();
        // dump($userAuth);

        if($userAuth == null){
            // dump("Editor");
            return false;
        }
        else{
            // dump("Adm"); É um administrador e pode deletar
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function restore(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }
}
