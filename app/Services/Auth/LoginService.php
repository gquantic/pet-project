<?php

namespace App\Services\Auth;

use App\Actions\Auth\UserLoginAction;
use App\DTOs\Auth\LoginDTO;
use App\Exceptions\InvalidCredentialsException;
use App\Models\User;

class LoginService
{
    protected User $user;

    public function __construct(
        private UserLoginAction $userLoginAction
    )
    {
    }

    /**
     * @throws InvalidCredentialsException
     */
    public function login(LoginDTO $dto): ?string
    {
        return $this->userLoginAction->execute((array) $dto);
    }
}
