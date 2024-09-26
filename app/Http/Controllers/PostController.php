<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    
    public function index(Post $post)
    {
        return view('posts.index')->with(['post' => $post]);
    }
    
    public function myshow(Post $post)
    {
        return view('posts.myshow')->with([
            'posts' => $post->getPaginateByLimit(5),
            ]);
    }
    
    public function create(Category $category)
    {
        return view('posts.create')->with(['categories' => $category->get()]);
    }
    
    public function store(Request $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/posts/myshow/');
    }
}

