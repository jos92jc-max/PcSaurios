<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('administrar-empresa', fn (User $user) => $user->hasRole('Administrador'));
        Gate::define('gestionar-catalogo', fn (User $user) => $user->hasRole(['Administrador', 'Editor']));
        Gate::define('gestionar-pedidos', fn (User $user) => $user->hasRole(['Administrador', 'Editor']));
    }
}
