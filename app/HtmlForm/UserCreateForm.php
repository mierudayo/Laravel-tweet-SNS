<?php

namespace App\HtmlForm;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * ユーザ登録入力フォーム
 * 
 * @author Y.Takeuchi
 */
class UserCreateForm
{
    /**
     * Input name ユーザ名
     * 
     * @var [String]
     */
    public const USER_NAME = 'user-name';
    
    /**
     * Input name パスワード
     * 
     * @var [String]
     */
    public const PASSWORD = 'password';

    /**
     * リクエスト
     *
     * @var [Request]
     */
    private $request;

    /**
     * コンストラクタ
     *
     * @param Request $request リクエスト
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * バリデータを生成する
     *
     * @return Illuminate\Contracts\Validation\Validator 生成したバリデータ
     */
    public function validator(): \Illuminate\Contracts\Validation\Validator
    {
        $rules = [
            UserCreateForm::USER_NAME => [
                'required'
            ],
            UserCreateForm::PASSWORD => [
                'required',
                'confirmed'
            ],
        ];
        $messages = [
            UserCreateForm::USER_NAME . ".required" => 'ユーザ名は必須項目です',
            UserCreateForm::PASSWORD . ".required" => 'パスワードは必須項目です',
            UserCreateForm::PASSWORD . ".confirmed" => 'パスワード、パスワード(確認)の値が一致しません',
        ];
        return Validator::make($this->request->all(), $rules, $messages);
    }
}
