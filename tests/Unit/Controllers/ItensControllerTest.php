<?php

namespace Tests\Unit\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Status;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Http\Testing\File;

class ItensControllerTest extends TestCase
{
    use RefreshDatabase;

    private function authorize()
    {
        return User::factory()->create();
    }

    private function fakeItem()
    {
        $status = Status::factory()->create();
        $category = Category::factory()->create();
        $this->post(route('collection.store'), [
            'id' => 1,
            'user_id' => $this->authorize()->id,
            'title' => 'teste',
            'description' => 'teste',
            'category_id' => $category->id,
            'status_id' => $status->id,
            'author' => 'teste',
            'publishing_company' => 'teste',
            'img_url' => 'teste',
            'img' => File::fake()->create('teste.jpg')
        ]);
    }

    public function testAccessCollectionPage()
    {
        $user = $this->authorize();
        $response = $this->actingAs($user)->get('/collection');
        $response->assertSuccessful();
    }

    public function testAccessCreateCollectionPage()
    {
        $user = $this->authorize();
        $response = $this->actingAs($user)->get('/collection/create');
        $response->assertSuccessful();
    }

    public function testCollectionStore()
    {
        $user = $this->authorize();
        $this->actingAs($user)->get('/collection/create');
        $status = Status::factory()->create();
        $category = Category::factory()->create();

        $this->post(route('collection.store'), [
            'id' => 2,
            'user_id' => $user->id,
            'title' => 'teste',
            'description' => 'teste',
            'category_id' => $category->id,
            'status_id' => $status->id,
            'author' => 'teste',
            'publishing_company' => 'teste',
            'img_url' => 'teste',
            'img' => File::fake()->create('teste.jpg')
        ])
            ->assertRedirect('/collection');
    }

    public function testCollectionEdit()
    {
        $user = $this->authorize();
        $this->actingAs($user)->get('/collection');
        $this->fakeItem();

        $itemEdit = Item::findOrFail(1);

        $this->get(route('collection.edit', $itemEdit->id))->assertSuccessful();
    }

    public function testCollectionDestroy()
    {
        $user = $this->authorize();
        $this->actingAs($user)->get('/dashboard');

        $this->fakeItem();

        $itemDelete = Item::findOrFail(1);

        $this->get(route('collection.delete', $itemDelete->id))
            ->assertRedirect(route('collection'));
    }

    public function testCollectionUpdate()
    {
        $user = $this->authorize();
        $this->actingAs($user)->get('/dashboard');

        $this->fakeItem();

        $itemDelete = Item::findOrFail(1);

        $status = Status::factory()->create();
        $category = Category::factory()->create();

        $this->put(route('collection.update', $itemDelete->id), [
            'title' => 'testeUpdate ',
            'description' => 'testeUpdate',
            'category_id' => $category->id,
            'status_id' => $status->id,
            'author' => 'testeUpdate',
            'publishing_company' => 'testeUpdate',
            'img' => File::fake()->create('testeUpdate.jpg')
        ])
            ->assertRedirect(route('collection'));
    }
}
