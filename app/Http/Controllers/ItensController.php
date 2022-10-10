<?php

namespace App\Http\Controllers;

use App\Http\Requests\CollectionRequest;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RuntimeException;

class ItensController extends Controller
{
    public function index()
    {
        $itens = Item::all();
        return view('collection', compact('itens'));
    }

    public function create()
    {
        $categories = DB::table('category')->get();
        $status = DB::table('status')->get();

        return view('collection_create', ['categories' => $categories, 'status' => $status]);
    }

    public function store(CollectionRequest $request)
    {
        $userId = Auth::user()->id;
        $data = $request->validated();

        $path = $request->file('img_url')->store('images', 's3');


        try {
            Item::create($data +
                [
                    'user_id' => $userId,
                    'img_url' => Storage::disk('s3')->url($path),
                    'img_name' => $path
                ]
            );

            return redirect(route('collection'))->with('success', 'Item criado com Sucesso!');
        } catch (RuntimeException $e) {
        dd('Whoops: ' . $e->getMessage());
    }
    }
}
