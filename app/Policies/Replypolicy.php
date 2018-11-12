<?php

namespace App\Policies;

use App\User;
use App\reply;
use Illuminate\Auth\Access\HandlesAuthorization;

class Replypolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
   public function update(User $user, reply $reply)
    {
        return $reply->user_id == $user->id;
    }
}
