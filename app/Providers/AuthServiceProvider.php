<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\User;
use App\Post;
use App\FriendRequest;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('editPost', function (User $user, Post $post) {
            if($user->isStaff()) return true;
            if($user->isAdmin()) return true;
            if($post->author == $user->username) return true;

            return false;
        });

        Gate::define('isPrivate', function (User $user, User $other) {
            if($user->isStaff()) return true;
            if($user->isAdmin()) return true;
            if($user->username == $other->username) return true;
            if($other->private == false) return true;
            if($other->private && $other->isFriendOf($user->username)) return true;

            return false;
        });

        Gate::define('isFriend', function (User $user, User $other) {
            if($user->username == $other->username) return true;
            if($other->private && $other->isFriendOf($user->username)) return true;

            return false;
        });

        Gate::define('isUser', function (User $user, User $other) {
            if($user->username == $other->username) return true;

            return false;
        });

        Gate::define('sendFriendRequest', function (User $user, User $to) {
            if(FriendRequest::where('from', $user->username)->where('to', $to->username)->exists()) return false;

            return true;
        });
    }
}
