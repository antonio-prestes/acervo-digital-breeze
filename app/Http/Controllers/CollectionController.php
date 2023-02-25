<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\User;
use Illuminate\View\View;

class CollectionController extends Controller
{
    public $filteredCollection;

    function index($user, $category = null): View
    {
        $user = User::where('user', $user)->firstOrFail();

        $items = Item::where('user_id', $user->id);

        $allCategories = Category::whereIn('id', $items->pluck('category_id'))->get();

        $filteredItems = $items;

        if ($category) {
            $filteredItems = $items->where('category_id', $category);
        }

        $collection = $filteredItems->paginate(8);

        return view('collection_home', [
            'user' => $user,
            'collection' => $collection,
            'categories' => $allCategories,
        ]);
    }
}
