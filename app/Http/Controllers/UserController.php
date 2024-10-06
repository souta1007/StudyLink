<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function myshow(User $user)
    {
        return view('User.myshow')->with(['own_posts' => $user->getOwnPaginateByLimit()]);
    }
}
?>