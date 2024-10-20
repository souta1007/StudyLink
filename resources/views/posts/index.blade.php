<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>StudyLink</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
    <body class="antialiased">
        
        <x-app-layout>
        <h1>Home</h1>
        <p>ログインユーザー：{{ Auth::user()->name }}</p>
        <a href="follows/followshow">フォロー中：</a>
        <a href="follows/addfollow">[フォローする]</a>
        <a href="posts/allshow">[みんなの投稿]</a>
        <a href="user/myshow">[自分の投稿]</a>
        </x-app-layout>
    </body>
</html>