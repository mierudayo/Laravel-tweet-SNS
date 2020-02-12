<?php

namespace App\Http\Controllers;

use App\HtmlForm\UserCreateForm;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    
    public function create(Request $request)
    {
        return view('user-create');
    }

    public function store(Request $request)
    {
        $form = new UserCreateForm($request);
        $form->validator()->validate();
        //$this->validate($request, UserCreateForm::validationRules(), UserCreateForm::validationRules());
        return redirect('/');
    }
}
