<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Auth\UserResource;
use App\Services\User\UserDataService;
use Illuminate\Http\Request;

class UserDataController extends Controller
{
    public function __invoke(
        Request $request,
        UserDataService $userDataService,
    )
    {
        UserResource::make($userDataService->getUserData());
    }
}
