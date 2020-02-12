<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>ユーザ登録</title>
  </head>
  <body>
    <h1>ユーザ登録</h1>
    <form method="POST" action="/users">
        @csrf
        <label>
            ユーザ名
            <input name="user-name" type="text">
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
