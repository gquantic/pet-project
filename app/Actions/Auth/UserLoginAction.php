<?php

namespace App\Actions\Auth;

use App\Exceptions\IncorrectUserEmailOrPasswordException;
use App\Exceptions\InvalidCredentialsException;
use App\Models\User\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserLoginAction
{
    public function __construct(
        private UserRepository $userRepository
    )
    {
    }

    /**
     * @throws InvalidCredentialsException
     */
    public function execute(array $data): ?string
    {
        $user = $this->userRepository->findByEmail($data['email']);

        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw new InvalidCredentialsException();
        }

        return JWTAuth::fromUser($user);
    }
}
