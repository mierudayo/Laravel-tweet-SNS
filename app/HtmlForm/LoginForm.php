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
    public const USER_NAME = 'user-name';
    public const PASSWORD = 'password';
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function validator()
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

    public function authCredentials()
    {
        return [
            'name' => $this->request->input(UserCreateForm::USER_NAME),
            'password' => $this->request->input(UserCreateForm::PASSWORD),
        ];
    }
}