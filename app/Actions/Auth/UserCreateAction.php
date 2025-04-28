<?php

namespace App\Actions\Auth;

use App\Models\User\User;
use App\Repositories\UserRepository;

class UserCreateAction
{
    public function __construct(
        private UserRepository $userRepository
    ) {}

    public function execute(array $data): User
    {
        return $this->userRepository->create($data);
    }
}
