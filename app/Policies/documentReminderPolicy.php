<?php

namespace App\Policies;

use App\Models\documentreminders;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class documentReminderPolicy
{
    public function modify(User $user, documentreminders $documentreminder)
    {
        return $user->id === $documentreminder->user_id
            ? Response::allow()
            : Response::deny('You do not own this document reminder.');
    }
}
