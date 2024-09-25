<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function myshow(post $post)
    {
        return view('posts.myshow')->with(['posts' => $post->getPaginateByLimit()]);
    }
}
