<?php

namespace App\Http\Controllers;

use App\HtmlForm\UserCreateForm;
use Illuminate\Http\Request;

/**
 * ユーザ系のコントローラ
 * 
 * @author Y.Takeuchi
 */
class UsersController extends Controller
{
    
    /**
     * ユーザ登録ページ
     *
     * @param Request $request リクエスト
     * @return void
     */
    public function create(Request $request)
    {
        return view('user-create');
    }

    /**
     * ユーザ登録処理を行う
     *
     * @param Request $request リクエスト
     * @return void
     */
    public function store(Request $request)
    {
        $form = new UserCreateForm($request);
        $form->validator()->validate();
        $form->createUser()->save();
        return redirect('/');
    }
}
