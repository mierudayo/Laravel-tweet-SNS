<?php
namespace App\HtmlForm;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * ツイート投稿フォーム
 * 
 * @author Y.Takeuchi
 */
class TweetCreateForm
{
    /**
     * Input name ツイート
     * 
     * @var [String]
     */
    public const TWEET = 'tweet';
    
    /**
     * リクエスト
     *
     * @var [String]
     */
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * バリデータを生成する
     *
     * @return \Illuminate\Contracts\Validation\Validator 生成したバリデータ
     */
    public function validator(): \Illuminate\Contracts\Validation\Validator
    {
        $rules = [
            TweetCreateForm::TWEET => [
                'required'
            ]
        ];
        $messages = [
            TweetCreateForm::TWEET . ".required" => 'ツイートが記入されていません',
        ];
        return Validator::make($this->request->all(), $rules, $messages);
    }
}