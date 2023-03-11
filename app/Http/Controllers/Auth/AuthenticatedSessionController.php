<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return View
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function redirectToGoogle(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(): RedirectResponse
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::query()->firstOrCreate(['email' => $googleUser->email], [
            'name' => $googleUser->name,
            'password' => md5($googleUser->email),
            'picture' => $googleUser->getAvatar(),
            'user' => Str::before($googleUser->email, '@')
        ]);

        auth()->login($user);

        return redirect()->route('dashboard');
    }

    public function redirectToGithub(): RedirectResponse
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback(): RedirectResponse
    {
        $googleUser = Socialite::driver('github')->user();

        $user = User::query()->firstOrCreate(['email' => $googleUser->email], [
            'name' => $googleUser->name,
            'password' => md5($googleUser->email),
            'picture' => $googleUser->getAvatar(),
            'user' => Str::before($googleUser->email, '@')
        ]);

        auth()->login($user);

        return redirect()->route('dashboard');
    }

    public function user_can_authenticate_via_github()
    {
        // Simula a resposta do Github
        $user = new SocialiteUser([
            'id' => 1,
            'email' => 'john@example.com',
            'name' => 'John Doe',
            'avatar' => 'https://github.com/john.png',
        ]);
        $mock = $this->mockSocialiteFacade('github', $user);

        // Chama a rota de autenticação via Github
        $this->get('/login/github/callback');

        // Verifica se o usuário foi criado ou atualizado no banco de dados
        $this->assertDatabaseHas('users', [
            'email' => 'john@example.com',
            'name' => 'John Doe',
            'picture' => 'https://github.com/john.png',
            'user' => 'john',
        ]);

        // Verifica se o usuário foi autenticado corretamente
        $this->assertAuthenticatedAs(User::first());

        // Verifica se o usuário é redirecionado para a página correta após a autenticação
        $this->assertRedirect(route('dashboard'));

        // Verifica se o mock foi chamado corretamente
        $mock->shouldHaveReceived('user')->once();
    }

    /**
     * Cria um mock da fachada Socialite para o provedor especificado.
     *
     * @param  string  $provider
     * @param  mixed  $user
     * @return MockInterface
     */
    protected function mockSocialiteFacade(string $provider, $user): MockInterface
    {
        $mock = Socialite::shouldReceive('driver')->with($provider)->andReturnSelf();
        $mock->shouldReceive('user')->andReturn($user);
        return $mock;
    }
}
