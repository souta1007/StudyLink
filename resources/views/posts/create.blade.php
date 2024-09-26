<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>StudyLink/create</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
    <body class="antialiased">
        
        <x-app-layout>
        <h1>投稿作成</h1>
        <form action="/posts" method="POST">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name=post[title] placeholder="タイトル" value="{{ old('post.title') }}"/>
                <p class="title_error" style="color:red">{{ $errors->first( 'post.title' )}}</p>
            </div>
            <div class="category">
                <h2>Category</h2>
                <select name="post[category_id]">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name=post[body] placeholder="質問したいことを書いてください">{{ old( 'post.body' )}}</textarea>
                <p class="body_error" style="color:red">{{ $errors->first( 'post.body' )}}</p>
            </div>
            <input type="submit" value="store">
        </form>
        <div class="footer">
            [<a href="/">戻る</a>]
        </div>
        </x-app-layout>
    </body>
</html>
