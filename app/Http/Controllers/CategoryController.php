<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\Category;

class CategoryController extends Controller
{
    public function categoryshow(Category $category)
    {
        return view('categories.categoryshow')->with(['posts' => $category->getByCategory()]);
    }
}
?>