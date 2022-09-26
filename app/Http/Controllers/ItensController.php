<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItensController extends Controller
{
    public function create()
    {
        return view('collection_create');
    }
}
