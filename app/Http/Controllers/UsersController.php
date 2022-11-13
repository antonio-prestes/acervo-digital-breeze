<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use RuntimeException;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::all();
        $itensCount = Item::all();
        return view('users')
            ->with('users', $users)
            ->with('itens', $itensCount);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('user_create')
            ->with('user', null)
            ->with('title', 'Adicionar Usuário');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $request->validated();

        $path = null;
        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('avatar', 's3');
        }

        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'picture' => Storage::disk('s3')->url($path)
            ]);
            Session::flash('message', 'Usuário adicionado com Sucesso!');
            return redirect(route('users'));
        } catch (RuntimeException $e) {
            dd('Whoops: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('user_create', ['user' => $user, 'title' => 'Editar usuário']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, int $id)
    {
        $user = $request->validated();
        $updatUser = User::findOrFail($id);

        $path = $updatUser->picture;

        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('avatar', 's3');
        }
        $updatUser->fill([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'picture' => Storage::disk('s3')->url($path)
        ])->save();

        Session::flash('message', 'Usuário editado com Sucesso!');
        return redirect(route('users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        Session::flash('message', 'Item excluido com Sucesso!');
        return redirect(route('users'));
    }
}
