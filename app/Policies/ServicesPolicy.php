<?php

namespace App\Policies;

use App\Models\Services;
use App\Models\User;
use Illuminate\Auth\Access\Response;

// class ServicesPolicy
// {
//     public function modify(User $user, Services $services)
//     {
//         return $user->id === $services->workshop->user_id
//         ? Response::allow()
//         : Response::deny('You do not own this service.');
//     }
// }
