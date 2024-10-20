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
            <div class="profile">
                <h1>{{ $user->name }}</h1> 
                <div class="follow">
                @if(Auth::id() !=$user_flg)
                    @if(Auth::user()->isFollowing($user->id))
                        <form action="{{ route('unfollow', ['user' => $user->id]) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        
                            <button type="submit" class="btn btn-danger">フォーロー解除</button>
                        </form>
                    @else
                        <form action="{{ route('follow', ['user' => $user->id]) }}" method="POST">
                            {{ csrf_field() }}
                        
                            <button type="submit" class="btn btn-primary">フォローする</button>
                        </form>
                    @endif
                @endif
                </div>
                <div class="posts">
                    @foreach($user_posts as $post)
                        <div class="post">
                           <a href="/posts/{{ $post->id }}"><h3 class ='title'>タイトル:{{ $post->title }}</h3></a>
                           <a href="/categories/{{ $post->category->id }}">カテゴリー:{{ $post->category->name }}</a>
                           <p class='body'>内容:{{ $post->body }}</p>
                        </div>
                    @endforeach
                </div>
                <div class='paginate'>{{ $user_posts->links()}}</div>
            </div>
            
        </x-app-layout>
    </body>
</html>
        　　