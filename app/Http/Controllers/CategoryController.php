<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\Category;

class CategoryController extends Controller
{
    public function myshow(Category $category)
    {
        return view('categories.myshow')->with(['posts' => $category->getByCategory()]);
    }
}
?>