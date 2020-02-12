<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    
    public function create(Request $request)
    {
        return view('user-create');
    }

    public function store(Request $request)
    {
        return redirect('/');
    }
}
