<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Workshops;
use Illuminate\Auth\Access\Response;

class WorkshopPolicy
{
    public function modify(User $user, Workshops $workshop): Response
    {
        return $user->id === $workshop->user_id
            ? Response::allow()
            : Response::deny('You do not own this workshop.');
    }

    // public function create(User $user, Workshops $workshop): Response
    // {
    //     return $user->role === 'user'
    //         ? Response::allow()
    //         : Response::deny('You are not authorized to create a workshop.');
    // }
}
