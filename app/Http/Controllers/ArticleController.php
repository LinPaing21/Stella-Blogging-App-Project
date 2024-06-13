<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

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
        $article->body = "<p>" . implode("</p><p>", explode("\r\n", $article->body)) . "</p>";
        return view('articles.show', [
            "article" => $article,
        ]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store()
    {
        $data = $this->validateArticle();

        $data['user_id'] = auth()->user()->id;
        if ($data['thumbnail'] ?? false) {
            try {
                $data['thumbnail'] = request()->file('thumbnail')->store('thumbnails', 'public');
            } catch (\Throwable $th) {
                $data['thumbnail'] = null;
            }
        }
        Article::create($data);
        return redirect('/')->with('success', 'You successfully created an article');
    }

    public function edit(Article $article)
    {
        return view('articles.edit', [
            'article' => $article,
        ]);
    }

    public function update(Article $article)
    {
        $data = $this->validateArticle($article);
        if ($data['thumbnail'] ?? false) {
            try {
                $data['thumbnail'] = request()->file('thumbnail')->store('thumbnails', 'public');
            } catch (\Throwable $th) {
                $data['thumbnail'] = null;
            }
        }

        $article->update($data);
        return redirect('/')->with('success', 'You successfully updated an article');
    }

    public function destroy(Article $article) {
        $article->delete();

        return redirect('/')->with('success', 'Article successfully deleted.');
    }

    protected function validateArticle(?Article $article = null)
    {
        $article ??= new Article();

        return request()->validate([
            'title' => 'required',
            'thumbnail' => ['image'],
            'slug' => ['required', Rule::unique('articles', 'slug')->ignore($article)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
    }
}
