<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * ログインコントローラ
 * 
 * @author Y.Takeuchi
 */
class LoginController extends Controller
{
    public function show(Request $request)
    {
        return view('login');
    }

    public function login(Request $request)
    {
        return redirect('/');
    }
}
