<?php

namespace App\Http\Controllers;

use App\Http\Requests\CollectionRequest;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use RuntimeException;

class ItensController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;

        Auth::user()->isAdministrator() ? $itens = Item::all() : $itens = Item::where('user_id', $userId)->get();

        return view('collection', compact('itens'));
    }

    public function create()
    {
        $categories = DB::table('category')->get();
        $status = DB::table('status')->get();
        $item = null;

        return view('collection_create', ['categories' => $categories, 'status' => $status, 'item' => $item, 'title' => 'Adicionar Item']);
    }

    public function store(CollectionRequest $request)
    {
        $userId = Auth::user()->id;
        $data = $request->validated();

        $path = $request->file('img')->store('images', 's3');


        try {
            Item::create($data +
                [
                    'user_id' => $userId,
                    'img_url' => Storage::disk('s3')->url($path),
                    'img' => $path
                ]
            );
            Session::flash('message', 'Item adicionado com Sucesso!');
            return redirect(route('collection'));
        } catch (RuntimeException $e) {
            dd('Whoops: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        Item::findOrFail($id)->delete();
        Session::flash('message', 'Item excluido com Sucesso!');
        return redirect(route('collection'));
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $categories = DB::table('category')->get();
        $status = DB::table('status')->get();

        return view('collection_create', ['categories' => $categories, 'status' => $status, 'item' => $item, 'title' => 'Editar Item']);
    }

    public function update(CollectionRequest $request, $id)
    {
        $data = $request->validated();

        if ($request->file('img')) {
            $path = $request->file('img')->store('images', 's3');
            $item = Item::where('id', $id)->update($data + [
                    'img_url' => Storage::disk('s3')->url($path),
                    'img' => $path
                ]);
        }

        Item::where('id', $id)->update($data);

        Session::flash('message', 'Item editado com Sucesso!');
        return redirect(route('collection'));
    }
}
