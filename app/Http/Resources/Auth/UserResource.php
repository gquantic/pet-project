<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $userData = parent::toArray($request);
        $userData = Arr::except($userData, ['user_id', 'created_at', 'updated_at', 'email_verified_at']);

        return $userData;
    }
}
