<?php
namespace App\HtmlForm;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * ユーザログインのHTMLフォーム
 * 
 * @author Y.Takeuchi
 */
class LoginForm
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
     * @return \Illuminate\Contracts\Validation\Validator 生成したバリデータ
     */
    public function validator(): \Illuminate\Contracts\Validation\Validator
    {
        $rules = [
            UserCreateForm::USER_NAME => [
                'required',
            ],
            UserCreateForm::PASSWORD => [
                'required',
            ],
        ];
        $messages = [
            UserCreateForm::USER_NAME . ".required" => 'ユーザ名は必須項目です',
            UserCreateForm::PASSWORD . ".required" => 'パスワードは必須項目です',
        ];
        return Validator::make($this->request->all(), $rules, $messages);
    }

    /**
     * Auth:attemptで使うクレデンシャルを生成する
     *
     * @return array 生成したクレデンシャル
     */
    public function authCredentials(): array
    {
        return [
            'name' => $this->request->input(UserCreateForm::USER_NAME),
            'password' => $this->request->input(UserCreateForm::PASSWORD),
        ];
    }
}