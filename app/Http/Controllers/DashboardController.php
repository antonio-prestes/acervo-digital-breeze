<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $itens = Item::all();
        return view('dashboard', compact('itens'));
    }
}
