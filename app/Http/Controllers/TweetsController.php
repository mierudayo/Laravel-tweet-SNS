<?php

namespace App\Http\Controllers;

use App\HtmlForm\TweetCreateForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    /**
     * ツイート投稿を行う
     *
     * @param Request $request リクエスト
     */
    public function store(Request $request)
    {
        $form = new TweetCreateForm($request);
        $form->validator()->validate();
        $userId = Auth::id();
        if (is_null($userId)) {
            return redirect('/');
        }

        $form->createTweet($userId)->save();
        return redirect('/');
    }
}
