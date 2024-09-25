<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;

class UserController extends Controller
{
    public function index(user $users)
    {
        $users = User::all();
        return view('users.index')->with(['users' => $user->getPaginateByLimit()]);
    }
}
