<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\CollectionController;
use App\Models\Category;
use App\Models\Item;
use App\Models\Status;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\View\View;
use Tests\TestCase;

class CollectionControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testIndexReturnsView()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();
        $status = Status::factory()->create();
        Item::factory()->count(1)->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'status_id' => $status->id,
        ]);

        $response = (new CollectionController())->index($user->user, $category->id);

        $this->assertInstanceOf(View::class, $response);
    }

    public function testItemReturnsView()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();
        $status = Status::factory()->create();
        $item = Item::factory()->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'status_id' => $status->id,
        ]);

        $response = (new CollectionController())->item($item->id);

        $this->assertInstanceOf(View::class, $response);
    }

    public function testCategoryReturnsViewWithCorrectData()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();
        $status = Status::factory()->create();

        Item::factory()->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'status_id' => $status->id
        ]);

        $controller = new CollectionController();
        $response = $controller->category($user->user, $category->id);

        $this->assertInstanceOf(View::class, $response);
        $this->assertEquals($user->user, $response->getData()['user']->user);
        $this->assertEquals($category->id, $response->getData()['filteredItems']->first()->category_id);
    }
}
