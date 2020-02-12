<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>ログイン</title>
  </head>
  <body>
    <h1>ログイン</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" action="/login">
        @csrf
        <label>
            ユーザ名
            <input name="user-name" type="text" value="{{ old('user-name') }}">
        </label>
        <label>
            パスワード
            <input name="password" type="password">
        </label>
        <input type="submit" value="ログイン">
    </form>
  </body>
</html>
