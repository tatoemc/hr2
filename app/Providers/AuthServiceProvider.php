<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('isAdmin', function($user) 
        {
            return $user->user_type == 'admin';
        });

        $gate->define('isEmployee', function($user)  
        {
            return $user->user_type == 'employee';
        });
        $gate->define('isUser', function($user)  
        {
            return $user->user_type == 'user';
        });

        $gate->define('isTraine', function($user)  
        {
            return $user->user_type == 'traine';
        });
        $gate->define('isTeacher', function($user)  
        {
            return $user->user_type == 'teacher';
        });

    }//end of boot


}
