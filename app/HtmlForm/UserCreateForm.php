<?php

namespace App\HtmlForm;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserCreateForm
{
    public const USER_NAME = 'user-name';
    public const PASSWORD = 'password';
    public const PASSWORD_CONFIRM = 'password-confirm';

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function validator()
    {
        $rules = [
            UserCreateForm::USER_NAME => 'required',
            UserCreateForm::PASSWORD => 'required',
            UserCreateForm::PASSWORD_CONFIRM => 'required',
        ];
        $messages = [
            UserCreateForm::USER_NAME . ".required" => 'ユーザ名は必須項目です',
            UserCreateForm::PASSWORD . ".required" => 'パスワードは必須項目です',
            UserCreateForm::PASSWORD_CONFIRM . ".required" => 'パスワード(確認)は必須項目です',
        ];
        return Validator::make($this->request->all(), $rules, $messages);
    }
}
