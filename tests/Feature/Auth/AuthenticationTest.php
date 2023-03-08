<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Socialite\Facades\Socialite;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_users_can_authenticate_using_the_login_screen()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

    public function testRedirectToGoogle()
    {
        $response = $this->get('/auth/google');

        $response->assertStatus(404);
    }

    public function testHandleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        $this->mock(Socialite::class, function ($mock) use ($googleUser) {
            $mock->shouldReceive('driver->stateless->user')->andReturn($googleUser);
        });

        $response = $this->get('/auth/google/callback');

        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');

        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', [
            'email' => $googleUser->email,
            'name' => $googleUser->name,
            'password' => md5($googleUser->email),
            'picture' => $googleUser->getAvatar(),
            'user' => Str::before($googleUser->email, '@')
        ]);
    }
}
