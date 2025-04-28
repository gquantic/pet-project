<?php

namespace App\Services\Auth;

use App\Actions\Auth\UserCreateAction;
use App\DTOs\Auth\RegisterDTO;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterService
{
    public function __construct(
        private UserCreateAction $userCreateAction
    ) {}

    public function register(RegisterDTO $dto): User
    {
        $data = [
            ...(array) $dto,
            'password' => Hash::make($dto->password),
            'promo_code' => mb_strtoupper(Str::random(8)),
        ];

        return $this->userCreateAction->execute($data);
    }
}
