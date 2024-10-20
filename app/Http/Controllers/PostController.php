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
        $posts = $post->with('user')->Paginate(5);
        
        return view('posts.allshow')->with([
            'posts' => $posts,
            ]);
            
    }
    
    public function detail(Post $post)
    {
        return view('posts.detail')->with(['post' => $post]);
    }
    
    public function create(Category $category)
    {
        return view('posts.create')->with(['categories' => $category->get()]);
    }
    
    public function store(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $input_post += ['user_id' => $request->user()->id];
        if ($request->hasFile('post.image')){
            $image = $request->file('post.image');
            $path = $iamge->store('image', 'public');
            $input_post['image_path'] = $path;
        }
        $post->fill($input_post)->save();
        return redirect('/user/myshow' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/user/myshow/');
    }
}

