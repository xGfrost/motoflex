<?php

namespace App\Providers;

use App\Models\Workshops;
use App\Models\User;
use App\Policies\WorkshopPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Workshops::class => WorkshopPolicy::class, // Registrasi policy
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
