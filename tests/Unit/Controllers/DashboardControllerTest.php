<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\DashboardController;
use App\Models\Item;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class DashboardControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $user = User::factory()->create();

        Auth::login($user);

        $response = $this->get(route('dashboard'));

        $response->assertStatus(200)
            ->assertSee($user->name);
    }

    public function testIndexWithAdminUser()
    {
        $adminUser = User::factory()->create(['profile' => 'admin']);

        Auth::login($adminUser);

        $response = $this->get(route('dashboard'));

        $response->assertStatus(200)
            ->assertSee($adminUser->name);
    }
}
