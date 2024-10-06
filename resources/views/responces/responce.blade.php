<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>StudyLink/responce</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
    <body class="antialiased">
        
        <x-app-layout>
        <h1>返信画面</h1>
        <form action="{{ route('reply', ['post' => $post->id]) }}" method="POST">
            @csrf
            <div class="comment">
                <h2>返信</h2>
                    <input type="hidden" name="responce[post_id]" value="{{ $post->id }}"/>
                    <textarea name="responce[comment]" placeholder="返信内容を入力してください">{{ old( 'responce.comment' )}}</textarea>
                    <p class="comment_error" style="color:red">{{ $errors->first( 'responce.comment' )}}</p>
            </div>
            <button type="submit" value="reply">[返信]</button>
        </form>
        <div class="footer">
            [<a href="/posts/myshow">戻る</a>]
        </div>
        </x-app-layout>
    </body>
</html>
