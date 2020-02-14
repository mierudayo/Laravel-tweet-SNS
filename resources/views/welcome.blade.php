<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>ついもどき</title>
  </head>
  <body>
    <h1>ついもどき</h1>
    
    <ul>
      @foreach ($latestTweets as $tweet)
        <li> {{ $tweet->content }} / {{ $tweet->author }} [{{ $tweet->registDate }}]</li>
      @endforeach
      
      @auth
        <li><a href='/tweets/create'>ツイートする</a></li>
      @endauth
    </ul>

    @auth
      <a href='/logout'>ログアウト</a>
    @endauth

    @guest
      <a href="/login">ログイン</a>  /  <a href="/users/create">ユーザ登録</a>
    @endguest  
  </body>
</html>
