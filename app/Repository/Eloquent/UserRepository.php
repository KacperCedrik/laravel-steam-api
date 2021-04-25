<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Model\User;

use App\Repository\UserRepository as RepositoryUserRepository;

class UserRepository implements RepositoryUserRepository
{
    private User $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }
    public function updateModel(User $user, array $data): void
    {
        $user->email = $data['email'] ?? $user->email;
        $user->name = $data['name'] ?? $user->name;
        $user->phone = $data['phone'] ?? $user->phone;

        $user->save();
    }
}