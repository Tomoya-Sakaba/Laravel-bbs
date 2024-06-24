<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <title>掲示板</title>
    <script>
        // 投稿ボタンを押した時に確認ダイアログを表示する処理
        function confirmSubmit() {
            return confirm("投稿してもよろしいでしょうか？");
        }
    </script>
</head>

<body>
    <header>
        <!-- ナビゲーションバーにホームに戻るリンクを貼る -->
        <h1><a href="/">Laravel News</a></h1>
    </header>
    <h2>さあ、最新のニュースをシェアしましょう</h2>
    <div class="errors">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <form action="{{ route('post.store') }}" method="post" onsubmit="return confirmSubmit()">
        @csrf
        <div class="form">
            <label for="title">タイトル：</label>
            <input type="text" id="title" name="title">
        </div>
        <div class="form">
            <label for="message">記事：</label>
            <textarea id="message" name="message"></textarea>
        </div>
        <div class="container">
            <input type="submit" name="send" value="投稿" class="btn">
        </div>
    </form>
    <hr>
    <div class="contents">
        <ul>
            @foreach ($posts as $post)
            <li>
                <h3>{{ $post->title }}</h3>
                <p class='post'>{{ $post->message }}</p>
                <a href="post/{{ $post->id }}">記事全文・コメントを見る</a>
            </li>
            <hr>
            @endforeach
        </ul>
    </div>
</body>

</html>