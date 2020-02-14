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
        <li> {{ $tweet->content }} [{{ $tweet->registDate }}]</li>
      @endforeach
    </ul>

    @auth
    <a href='/logout'>ログアウト</a>
    @endauth

    @guest
    <a href="/login">ログイン</a>
    @endguest
    
  </body>
</html>
