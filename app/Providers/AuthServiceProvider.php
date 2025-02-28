<?php

namespace App\Providers;

use App\Models\Services;
use App\Models\Workshops;
use App\Models\User;
use App\Policies\ServicesPolicy;
use App\Policies\WorkshopPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Workshops::class => WorkshopPolicy::class,
        // Services::class => ServicesPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
