<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index(Category $category)
    {
        // dd($category->articles);
        return view('articles.index', [
            "articles" => $category->articles->load(['category', 'user']),
        ]);
    }
}
