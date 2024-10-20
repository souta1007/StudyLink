<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function myshow(User $user)
    {
        return view('user.myshow')->with(['own_posts' => $user->getOwnPaginateByLimit()]);
    }
    
    public function index(Request $request,$id)
    {
        $user = User::find($id);
        $user_flg = $request->path();
        $user_flg = preg_replace('/[^0-10000]/', '', $user_flg);
        $user_posts = Post::where('user_id', $user->id)->paginate(10);
        
        return view('user.index')->with([
            'user' => $user, 
            'user_flg' => $user_flg,
            'user_posts' => $user_posts
            ]);
    }
    
    public function follow(User $user)
    {
        $follower = Auth::user();
    
    //ログインユーザーが対象のユーザーをフォローしているか？ 
        $is_Following = $follower->isfollowing($user->id);
        if(!$is_Following) {
            $follower->follow($user->id);
            return back();
        }
    }
    
     public function unfollow(User $user)
    {
        $follower = Auth::user();
    
    //ログインユーザーが対象のユーザーをフォローしているか？ 
        $is_Following = $follower->isfollowing($user->id);
        if(!$is_Following) {
            $follower->unfollow($user->id);
            return back();
        }
    }
}
?>