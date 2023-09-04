<?php

namespace App\View\Components;

use App\Models\User;
use App\Models\Article;
use Illuminate\View\Component;

class AdminNav extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin-nav', [
            'user_count' => User::select('id')->get()->count(),
            'article_count' => Article::select('id')->get()->count(),
            // 'report_count' => Report::selecet('id')->get()->count(), // This is new feature I want to add
        ]);
    }
}
