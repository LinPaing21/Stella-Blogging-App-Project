<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class CategoryTable extends Component
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
        return view('components.category-table', [
            'categories' => Category::select('id', 'name', 'slug')->get(),
        ]);
    }
}
