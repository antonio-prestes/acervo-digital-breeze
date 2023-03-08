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
            'filteredItems' => $filteredItems,
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
}
