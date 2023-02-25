<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static whereIn(string $string, array $itensCategories)
 */
class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    public function item()
    {
        return $this->hasMany(Category::class, 'category_id', 'id');
    }
}
