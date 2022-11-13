<?php

namespace Tests\Unit\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Testing\File;
use Tests\TestCase;

class UsersControllerTest extends TestCase
{
    use RefreshDatabase;

    private function authorize()
    {
        $user =  User::factory()->create();
        $this->actingAs($user)->get('/dashboard');
    }

    private function fakeUser()
    {
        return $this->post(route('users.store'), [
            'name'=>'teste',
            'email'=>'teste@teste.com',
            'password'=>'q1w2e3r4',
            'picture'=> File::fake()->create('teste.jpg')
        ]);
    }

    public function testAccessUsersPage()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('users'));
        $response->assertSuccessful();
    }

    public function testAccessCreateUserPage()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('users.create'));
        $response->assertSuccessful();
    }

    public function testUserStore()
    {
        $this->authorize();

        $this->post(route('users.store'), [
            'name'=>'teste',
            'email'=>'teste@teste.com',
            'password'=>'q1w2e3r4',
            'picture'=> File::fake()->create('teste.jpg')
        ])
            ->assertRedirect('/users');
    }

    public function testUserEdit()
    {
        $this->authorize();
        $this->fakeUser();

        $userEdit = User::findOrFail(1);

        $this->get(route('users.edit', $userEdit->id))
            ->assertSuccessful();
    }

    public function testUsersDestroy()
    {
        $this->authorize();
        $this->fakeUser();

        $userDelete = User::findOrFail(1);

        $this->get(route('users.delete', $userDelete->id))
            ->assertRedirect(route('users'));
    }

    public function testUsersUpdate()
    {
        $this->authorize();
        $this->fakeUser();

        $userUpdate = User::findOrFail(1);

        $this->put(route('users.update', $userUpdate->id), [
            'name'=>'testeUpdate',
            'email'=>'teste@teste2.com',
            'password'=>'q1w2e3r4',
            'picture'=> File::fake()->create('testeUpdate.jpg')
        ])
            ->assertRedirect(route('users'));
    }
}
