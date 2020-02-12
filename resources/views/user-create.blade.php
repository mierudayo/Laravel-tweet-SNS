<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>ユーザ登録</title>
  </head>
  <body>
    <h1>ユーザ登録</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" action="/users">
        @csrf
        <label>
            ユーザ名
            <input name="user-name" type="text" value="{{ old('user-name') }}">
        </label>
        <label>
            パスワード
            <input name="password" type="password">
        </label>
        
        <label>
            パスワード(確認)
            <input name="password-confirm" type="password">
        </label>
        <input type="submit" value="ユーザ登録">
    </form>
  </body>
</html>
