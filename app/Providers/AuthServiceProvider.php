<?php

namespace App\Providers;

use App\Models\Team;
use App\Policies\TeamPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isSuperAdmin', function($user){
            return $user->hasAnyRole('Chief Admin');
            // return $user->hasAnyRoles(['admin','Chief Admin']);
        });

        Gate::define('isAdmin', function($user){
            return $user->hasAnyRole('Admin');
            // return $user->hasAnyRoles(['admin','Chief Admin','Probate Registrar']);
        });

        Gate::define('isViceChancellor', function($user){
            return $user->hasAnyRole('Vice Chancellor');
            // return $user->hasAnyRoles(['admin','Chief Admin','Probate Registrar']);
        });

        Gate::define('isRegistrar', function($user){
            return $user->hasAnyRole('Registrar');
            // return $user->hasAnyRoles(['admin','Chief Admin','Probate Registrar']);
        });

        Gate::define('isBursar', function($user){
            return $user->hasAnyRole('Bursar');
            // return $user->hasAnyRoles(['admin','Chief Admin','Probate Registrar']);
        });

        Gate::define('isCourseSystem', function($user){
            return $user->hasAnyRole('Course System');
            // return $user->hasAnyRoles(['admin','Chief Admin','Probate Registrar']);
        });

        Gate::define('isDeanStudentAffair', function($user){
            return $user->hasAnyRole('Dean Student Affair');
            // return $user->hasAnyRoles(['admin','Chief Admin','Probate Registrar']);
        });

        Gate::define('isDean', function($user){
            return $user->hasAnyRole('Dean');
            // return $user->hasAnyRoles(['admin','Chief Admin','Probate Registrar']);
        });

        Gate::define('isHeadofDepartment', function($user){
            return $user->hasAnyRole('Head of Department');
            // return $user->hasAnyRoles(['admin','Chief Admin','Probate Registrar']);
        });
        Gate::define('isDepartmentCoordinator', function($user){
            return $user->hasAnyRole('Department Coordinator');
            // return $user->hasAnyRoles(['admin','Chief Admin','Probate Registrar']);
        });

        Gate::define('isStaff', function($user){
            return $user->hasAnyRole('Staff');
            // return $user->hasAnyRoles(['admin','Chief Admin','Probate Registrar']);
        });
        
        Gate::define('isStudent', function($user){
            return $user->hasAnyRole('Student');
            // return $user->hasAnyRoles(['admin','Chief Admin','Probate Registrar']);
        });
    }
}
