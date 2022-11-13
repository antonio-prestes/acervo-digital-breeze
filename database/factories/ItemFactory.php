<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\Testing\File;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => 1,
            'user_id' => 1,
            'title' => 'teste',
            'description' => 'teste',
            'category_id' => 2,
            'status_id' => 2,
            'author' => 'teste',
            'publishing_company' => 'teste',
            'img_url' => 'teste',
            'img' => File::fake()->create('teste.jpg')
        ];
    }
}
