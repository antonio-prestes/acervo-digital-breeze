<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'itens';

    protected $fillable = [
        'user',
        'title',
        'description',
        'category',
        'author',
        'publishing_company',
        'cover_url'
    ];
}
