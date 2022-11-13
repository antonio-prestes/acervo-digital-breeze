<?php

namespace Tests\Unit\Controllers;

use App\Models\User;
use Tests\TestCase;

class DashboardControllerTest extends TestCase
{
    private function authorize()
    {
        return User::factory()->create();
    }

    public function testAdminAccessDashboardPage()
    {
        $user = $this->authorize();
        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertSuccessful();
    }
}
