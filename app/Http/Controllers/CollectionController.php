<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\User;
use Illuminate\View\View;
use JetBrains\PhpStorm\NoReturn;
use Jorenvh\Share\Share;

class CollectionController extends Controller
{
    public $user;

    function index($user): View
    {
        $this->user = User::where('user', $user)->firstOrFail();

        $items = Item::where('user_id', $this->user->id);

        $allCategories = Category::whereIn('id', $items->pluck('category_id'))->get();

        $categoryCounts = Item::selectRaw('category_id, count(*) as count')
            ->whereIn('category_id', $allCategories->pluck('id'))
            ->groupBy('category_id')
            ->pluck('count', 'category_id');

        $collection = $items->paginate(8);

        return view('collection_home', [
            'user' => $this->user,
            'collection' => $collection,
            'categories' => $allCategories,
            'categoryCounts' => $categoryCounts
        ]);
    }

    public function item($id)
    {
        $item = Item::where('id', $id)->firstOrFail();
        $user = User::where('id', $item->user_id)->firstOrFail();

        $shareButtons = (new Share)->currentPage()
            ->facebook()
            ->twitter()
            ->whatsapp();

        return view('collection_item', [
            'user' => $user,
            'item' => $item,
            'shareButtons' => $shareButtons
        ]);
    }

    public function category($user, $category)
    {
        $user = User::where('user', $user)->firstOrFail();

        $items = Item::where('user_id', $user->id);

        $allCategories = Category::whereIn('id', $items->pluck('category_id'))->get();

        $categoryCounts = Item::selectRaw('category_id, count(*) as count')
            ->whereIn('category_id', $allCategories->pluck('id'))
            ->groupBy('category_id')
            ->pluck('count', 'category_id');

        $filteredItems = $items->where('category_id', $category);

        $collection = $filteredItems->paginate(8);

        return view('collection_home', [
            'user' => $user,
            'collection' => $collection,
            'categories' => $allCategories,
            'filteredItems' => $filteredItems,
            'categoryCounts' => $categoryCounts
        ]);
    }
}
