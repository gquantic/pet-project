<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\DTOs\Auth\RegisterDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Resources\Auth\UserResource;
use App\Models\User\User;
use App\Services\Auth\RegisterService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __invoke(
        UserStoreRequest $request,
        RegisterService $registerService
    )
    {
        $dto = new RegisterDTO(...$request->validated());
        $user = $registerService->register($dto);

        return UserResource::make($user);
    }
}
