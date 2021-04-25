<?php
declare(strict_types=1);

namespace App\Providers;

use App\Model\User;
use App\Repository\Eloquent\UserRepository;
use App\Repository\UserRepository as UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        /*
        $this->app->singleton(UserRepositoryInterface::class, function($app) {
            return new UserRepository (
                $app->make(User::class)
            );
        });
        */

        $this->app->singleton(
            UserRepositoryInterface::class, 
            UserRepository::class
        );
    }
}