<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CollectionController extends Controller
{
    function index ($user): View {

        $user = DB::table('users')->where('user', $user)->first();
        return view('collection_home', compact('user'));
    }
}
