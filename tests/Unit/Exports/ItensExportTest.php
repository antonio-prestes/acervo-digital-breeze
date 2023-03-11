<?php

namespace Tests\Unit;

use App\Exports\ItensExport;
use App\Models\Category;
use App\Models\Item;
use App\Models\Status;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Facades\Excel;
use Tests\TestCase;

class ItensExportTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function test_collection_method_returns_collection_of_items()
    {
        $user = User::factory()->create();
        $status = Status::factory()->create();
        $category = Category::factory()->create();
        $item = Item::factory()->create(
            [
                'user_id' => $user->id,
                'category_id' => $category->id,
                'status_id' => $status->id
            ]
        );

        $export = new ItensExport();

        Auth::shouldReceive('user')->andReturn($user);

        $this->assertEquals(
            $item->title,
            $export->collection()->first()->title
        );
    }

    /**
     * @test
     */
    public function test_headings_method_returns_array_of_headings()
    {
        $export = new ItensExport();

        $this->assertInstanceOf(WithHeadings::class, $export);

        $this->assertIsArray($export->headings());
        $this->assertCount(6, $export->headings());
        $this->assertEquals(
            [
                'ID',
                'Titulo',
                'Descrição',
                'Autor',
                'Editora',
                'url_capa'
            ],
            $export->headings()
        );
    }
}
