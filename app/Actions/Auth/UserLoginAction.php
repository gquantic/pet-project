<?php

namespace App\Actions\Auth;

use App\Exceptions\InvalidCredentialsException;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class UserLoginAction
{
    /**
     * @throws InvalidCredentialsException
     */
    public function execute(array $data): ?string
    {
        $token = Auth::attempt($data);

        if (!$token) {
            throw new InvalidCredentialsException();
        }

        return $token;
    }
}
