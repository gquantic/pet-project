<?php

namespace App\Actions\Auth;

use App\Models\User;
use App\Repositories\UserRepository;

class UserCreateAction
{
    public function __construct(
        private UserRepository $userRepository
    ) {}

    public function execute(array $data): User
    {
        $user = $this->userRepository->create($data);

        return $user;
    }
}
