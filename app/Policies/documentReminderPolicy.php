<?php

namespace App\Policies;

use App\Models\documentReminders;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class documentReminderPolicy
{
    public function modify(User $user, documentReminders $documentreminder): Response
    {
        return $user->id === $documentreminder->user_id
            ? Response::allow()
            : Response::deny('You do not own this document reminder.');
    }
}
