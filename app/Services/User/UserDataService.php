<?php

namespace App\Services\User;

use App\Models\User\User;
use Illuminate\Support\Facades\Auth;

class UserDataService
{
    public function getUserData(): \App\Models\User\User|\Illuminate\Contracts\Auth\Authenticatable
    {
        return Auth::user();
    }
}
