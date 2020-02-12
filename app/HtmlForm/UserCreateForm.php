<?php
namespace App\HtmlForm;

use Illuminate\Http\Request;

class UserCreateForm
{
    public const USER_NAME = 'user-name';
    public const PASSWORD = 'password';
    public const PASSWORD_CONFIRM = 'password-confirm';
    
    public static function validate()
    {
        return [
            UserCreateForm::USER_NAME => 'required',
            UserCreateForm::PASSWORD => 'required',
            UserCreateForm::PASSWORD_CONFIRM => 'required',
        ];
    }
}