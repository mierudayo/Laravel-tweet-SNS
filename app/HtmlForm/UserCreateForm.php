<?php

namespace App\HtmlForm;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
                'required',
                'unique:users,name'
            ],
            UserCreateForm::PASSWORD => [
                'required',
                'confirmed'
            ],
        ];
        $messages = [
            UserCreateForm::USER_NAME . ".required" => 'ユーザ名は必須項目です',
            UserCreateForm::USER_NAME . ".unique" => '指定したユーザ名は利用できません',
            UserCreateForm::PASSWORD . ".required" => 'パスワードは必須項目です',
            UserCreateForm::PASSWORD . ".confirmed" => 'パスワード、パスワード(確認)の値が一致しません',
        ];
        return Validator::make($this->request->all(), $rules, $messages);
    }

    /**
     * DBに登録するユーザデータを生成する
     * 本メソッドはバリデーションチェックがなされた後に実行される想定である
     *
     * @return User 生成したユーザデータ 
     */
    public function createUser(): User
    {
        $user = new User();
        $name = $this->request->input(UserCreateForm::USER_NAME);
        $password = $this->request->input(UserCreateForm::PASSWORD);
        $hashedPassword = Hash::make($password);
        $user->fill([
            'name' => $name,
            'password' => $hashedPassword, 
            'email' => $name,   // TODO メールアドレス入力フォームを追加する or ユーザカラムから削除する
        ]);
        return $user;
    }
}
