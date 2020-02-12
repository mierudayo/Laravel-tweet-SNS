<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TweetsController extends Controller
{
    public function create(Request $request)
    {
        return view('tweet-create');
    }
}
