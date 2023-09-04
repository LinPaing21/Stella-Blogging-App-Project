<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function store(Article $article)
    {
        request()->validate([
            'body' => 'required'
        ]);

        $article->comments()->create([
            'user_id' => auth()->user()->id,
            'body' =>  request('body'),
        ]);

        return back();
    }

    public function update(Article $article, Comment $comment) {
        request()->validate([
            'body' => 'required',
        ]);


        $comment->update([
            'body' => request('body'),
        ]);

        return back();
    }

    public function destroy(Article $article, Comment $comment) {
        $comment->delete();
        return back();
    }

}
