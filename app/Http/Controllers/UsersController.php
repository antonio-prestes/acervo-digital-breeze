<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Item;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use RuntimeException;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
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
     * @return Application|Factory|View
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
     * @param UserRequest $request
     * @return RedirectResponse
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
     * @return void
     */
    public function show(int $id): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id): View|Factory|Application
    {
        $user = User::findOrFail($id);

        return view('user_create', ['user' => $user, 'title' => 'Editar usuário']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param int $id
     * @return Application|RedirectResponse|Redirector
     */
    public function update(UserRequest $request, int $id): Redirector|RedirectResponse|Application
    {
        $user = $request->validated();
        $updateUser = User::findOrFail($id);

        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('avatar', 's3');
            $url = Storage::disk('s3')->url($path);
        } else {
            $url = $updateUser->picture;
        }

        $userToUpdate = [
            'user' => $request->user,
            'name' => $request->name,
            'email' => $request->email,
            'picture' => $url
        ];

        if (!empty($request->password)) {
            $userToUpdate['password'] = Hash::make($request->password);
        }

        $updateUser->fill($userToUpdate)->save();

        Session::flash('message', 'Usuário editado com Sucesso!');
        return redirect(route('users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(int $id): Redirector|RedirectResponse|Application
    {
        User::findOrFail($id)->delete();
        Session::flash('message', 'Item excluido com Sucesso!');
        return redirect(route('users'));
    }
}
