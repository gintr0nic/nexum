<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\User;
use App\Post;
use App\FriendRequest;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //$this->registerPolicies();
        
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
            if(FriendRequest::where('to', $user->username)->where('from', $to->username)->exists()) return false;
            
            return true;
        });
    }
}
