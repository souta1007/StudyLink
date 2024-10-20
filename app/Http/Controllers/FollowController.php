<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use App\Http\Requests\FollowRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth; 

class FollowController extends Controller
{
    public function followshow(Follow $follow)
    {
        return view('follows.followshow')->with(['users' => $user]);
    }
    
    public function check_following($id)
    {
        $check = Follow::where('following', Auth::id())->where('followed', $id);
        
        if($check->count() == 0):
            return response()->json(['status' => faulse]);
        elseif($check->count() != 0):
            return response()->json(['status' => turu]);
        endif;
    }
    
    public function following(FollowRequest $request, User $user, Follow $follow)
    {
        $check = Follow::where('following', Auth::id())->where('followed', $request->user_id);
         
        if($check->count() == 0):
            $input_follow = $request['follow'];
            $input_follow += ['following' => \Auth::user()->id];
        
            $follow->fill($input_responce)->save();
            $followCount = count(Follow::where('followed', $user->id)->get());
        endif;
        return redirect('/posts/index/');
    }
    
    public function unfollowing(FollowRequest $request, User $user, Follow $follow)
    {
        $unfollowing = Follow::where('following', Auth::id())->where('followed', $request->user_id)->delete();
        $followCount = count(Follow::where('followed', $user->id)->get());
    }
    
}