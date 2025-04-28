<?php

namespace Tests\Unit\Services\Auth;

use App\Actions\Auth\UserCreateAction;
use App\DTOs\Auth\RegisterDTO;
use App\Models\User;
use App\Services\Auth\RegisterService;
use Illuminate\Support\Facades\Hash;
use Mockery;
use Tests\TestCase;

class RegisterServiceTest extends TestCase
{
    private RegisterService $service;
    private UserCreateAction $createUserActionMock;

    protected function setUp(): void
    {
        parent::setUp();
        $this->createUserActionMock = Mockery::mock(UserCreateAction::class);
        $this->service = new RegisterService($this->createUserActionMock);
    }

    public function test_it_creates_user_with_hashed_password()
    {
        $dto = new RegisterDTO(
            name: 'Test',
            email: 'test@gmail.com',
            phone: '+1234567890',
            type: 'client',
            telegram: '@test',
            about_self: 'Hello World',
            password: 'secret123',
        );

        $this->createUserActionMock->shouldReceive('execute')
            ->once()
            ->with(Mockery::on(function ($data) use ($dto) {
                // Проверка хеширования пароля
                $isPasswordValid = Hash::check($dto->password, $data['password']);

                // Валидация промокода: 8 символов, заглавные буквы
                $isPromoCodeValid = preg_match('/^[A-Z0-9]{8}$/', $data['promo_code']) === 1;

                return $data['name'] === $dto->name
                    && $data['email'] === $dto->email
                    && $data['phone'] === $dto->phone
                    && $data['type'] === $dto->type
                    && $data['telegram'] === $dto->telegram
                    && $data['about_self'] === $dto->about_self
                    && $isPasswordValid
                    && $isPromoCodeValid;
            }))
            ->andReturn(new User());

        $result = $this->service->register($dto);
        $this->assertInstanceOf(User::class, $result);
    }
}
