<?php

namespace App\DTOs\Auth;

class RegisterDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $phone,
        public string $type,
        public string $telegram,
        public string $about_self,
        public string $password,
    ) {}
}
