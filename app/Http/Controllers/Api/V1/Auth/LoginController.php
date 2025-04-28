<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\DTOs\Auth\LoginDTO;
use App\Exceptions\InvalidCredentialsException;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserLoginRequest;
use App\Services\Auth\LoginService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * @throws InvalidCredentialsException
     */
    public function __invoke(
        UserLoginRequest $request,
        LoginService $loginService,
    )
    {
        $dto = new LoginDTO(...$request->validated());
        $token = $loginService->login($dto);

        return response()->json([
            'token' => $token,
        ]);
    }
}
