<?php

namespace App\Providers;

use App\User;
use Illuminate\Contracts\Auth\Access\Gate;
//use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(Gate $gate)
    {
        $this->registerPolicies();
        // aca creo el nombre de la compuerta y le asigno la validacion al usuario
       /* $gate->define('movie-create', function(User $user){
            return $user->email == 'magik@gmail.com';
        });*/

        //
    }
}
