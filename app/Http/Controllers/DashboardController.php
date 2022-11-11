<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;

        Auth::user()->isAdministrator() ? $itens = Item::all() : $itens = Item::where('user_id', $userId)->get();

        return view('dashboard', compact('itens'));
    }
}
