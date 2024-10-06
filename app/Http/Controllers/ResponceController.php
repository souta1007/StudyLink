<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ResponceRequest;
use App\Models\Post;
use App\Models\User;
use App\Models\Responce;

class ResponceController extends Controller
{
    public function responce(Post $post)
    {
        return view('responces.responce')->with(['post' => $post]);
    }
    
    public function reply(ResponceRequest $request, Post $post, Responce $responce)
    {
       $input_responce = $request['responce'];
       $input_responce += ['user_id' => $request->user()->id];
       
       $responce->fill($input_responce)->save();
        
       return redirect('/posts/' . $post->id);
    }
    
}
?>