<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Comment;
use Livewire\Component;

class Comments extends Component
{
    public Article $article;
    public $comments;
    public $body;

    public $rules = [
        'body' => 'required',
    ];

    protected $listeners = ['updateComment'];

    private function resetInputFields(){
        $this->body = '';
    }

    public function addComment()
    {
        $this->validate();

        Comment::create([
            'article_id' => $this->article->id,
            'user_id' => auth()->user()->id,
            'body' =>  $this->body,
        ]);

        session()->flash('message', 'Comment Successfully.');

        $this->resetInputFields();
    }

    public function deleteComment(Comment $comment)
    {
        $comment->delete();

        session()->flash('message', 'Successfully Deleted.');
    }

    public function updateComment($id, $val)
    {

        Comment::find($id)->update([
            'body' => $val,
        ]);

        $this->resetInputFields();
    }

    public function render()
    {
        $this->comments = Comment::where('article_id', $this->article->id)->get();
        return view('livewire.comments');
    }
}
