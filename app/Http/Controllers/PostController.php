<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    
    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post]);
    }
    
    public function allshow(Post $post)
    {
        return view('posts.allshow')->with([
            'posts' => $post->getPaginateByLimit(5),
            ]);
    }
    
    public function create(Category $category)
    {
        return view('posts.create')->with(['categories' => $category->get()]);
    }
    
    public function store(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $input_post += ['user_id' => $request->user()->id];
        $post->fill($input_post)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/user/myshow/');
    }
}

