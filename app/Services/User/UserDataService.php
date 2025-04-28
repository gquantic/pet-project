<?php

namespace App\Services\User;

use Illuminate\Support\Facades\Auth;

class UserDataService
{
    public function getUserData(): \App\Models\User
    {
        return Auth::user()
            ->with('createdBy')
            ->first();
    }
}
