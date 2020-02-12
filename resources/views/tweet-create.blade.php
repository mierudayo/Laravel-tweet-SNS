<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>ツイート投稿</title>
  </head>
  <body>
    <h1>ツイート投稿</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" action="/tweets">
        @csrf
        <input name="tweet" type="text" size="128" value="{{ old('tweet') }}">
        <input type="submit" value="ツイート">
    </form>
  </body>
</html>
