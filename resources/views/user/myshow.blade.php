<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>StudyLink/myshow</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
    <body class="antialiased">
        <x-app-layout>
            
        <h1>自分の投稿</h1>
        <a href="/posts/create">[作成]</a>
        <div class='own_posts'>
            @foreach ($own_posts as $post)
            <div class='post'>
                <a href="/posts/{{ $post->id }}"><h3 class ='title'>タイトル:{{ $post->title }}</h3></a>
                <a href="/categories/{{ $post->category->id }}">カテゴリー:{{ $post->category->name }}</a>
                <p class='body'>内容:{{ $post->body }}</p>
                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $post->id }})">削除</button>
                </form>
            </div>
            <div class='responces'>
                <h4>返信一覧</h4>
                @foreach ($post->responces as $responce)
                <div class='responce'>
                    <p>返信者: {{ $responce->user->name }}</p>
                    <p>内容: {{ $responce->comment }}</p>
                </div>
                @endforeach
            </div>
        @endforeach
        </div>
        <div class='paginate'>{{ $own_posts->links()}}</div>
        <script>
            function deletePost(id){
                'use strict'
                
                if(confirm('削除すると復元できません。\n本当に削除しますか？')){
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
        </x-app-layout>
    </body>
</html>
