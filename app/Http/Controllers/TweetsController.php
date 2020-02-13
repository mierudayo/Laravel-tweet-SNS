<?php

namespace App\Http\Controllers;

use App\HtmlForm\TweetCreateForm;
use Illuminate\Http\Request;

/**
 * ツイートのコントローラ
 * 
 * @author Y.Takeuchi
 */
class TweetsController extends Controller
{
    /**
     * ツイート投稿ページ
     *
     * @param Request $request リクエスト
     */
    public function create(Request $request)
    {
        return view('tweet-create');
    }

    public function store(Request $request)
    {
        $form = new TweetCreateForm($request);
        $form->validator()->validate();
        return redirect('/');
    }
}
