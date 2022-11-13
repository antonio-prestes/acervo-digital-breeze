<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;

        if (Auth::user()->profile == 'admin') {
            $itens = Item::all();
            $users = User::all();
        } else {
            $itens = Item::where('user_id', $userId)->get();
            $users = '';
        }


        return view('dashboard')
            ->with('itens', $itens)
            ->with('users', $users);
    }
}
