<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    public function index()
    {
        // may be later
        // add new feature remove invalid request
        return view('articles.index', [
            "articles" => Article::latest()
                            ->with(['category', 'user'])
                            ->filter(request(['search', 'category', 'author']))
                            ->paginate(6)->withQueryString(),
        ]);
    }

    public function show(Article $article)
    {
        // dd($article);
        return view('articles.show', [
            "article" => $article,
        ]);
    }

    public function category(Category $category)
    {
        // dd($category->articles);
        return view('articles.index', [
            "articles" => $category->articles->load(['category', 'user']),
        ]);
    }

    public function user(User $user)
    {
        // dd($user);
        return view('articles.index', [
            "articles" => $user->articles->load(['category', 'user']),
        ]);
    }
}
