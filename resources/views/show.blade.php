<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    <title>Detail Page</title>
</head>

<body>
    <header>
        <h1><a href="/post">Laravel News</a></h1>
    </header>
    <div class="news">
        <h2>{{ $post->title }}</h2>
        <p>{!! nl2br(htmlspecialchars($post->message)) !!}</p>
    </div>
    <hr>
    <div class="errors">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <div class="comments">
        <div class="form">
            <form action="{{ route('comment.store', $post->id) }}" method="post" class="box-item">
                @csrf
                <textarea id="comment" name="comment"></textarea>
                <input type="submit" name="comment_send" value="コメントを書く">
            </form>
        </div>
        @foreach ($comments as $comment)
        <div class="box-item">
            <p>{{ $comment->comment }}
                <a href="#">コメントを消す</a>
            </p>
        </div>
        @endforeach
    </div>
    <script>
        const comments = document.querySelectorAll('.box-item');
        let i = 0;
        while (i < comments.length) {
            const comment = comments[i];
            comment.style.backgroundColor = ['#fff799', '#87cefa', '#ffdada'][Math.floor(Math.random() * 3)];
            i++;
        }
    </script>
</body>

</html>