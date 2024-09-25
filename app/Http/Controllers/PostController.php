<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index(post $podt)
    {
        return view('post/index')->with(['posts' => $post->get()]);
    }
}
