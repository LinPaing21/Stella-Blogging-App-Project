<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class UserTable extends Component
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
        return view('components.user-table', [
            'users' => User::select('username', 'name', 'email', 'role')->paginate('10', ['*'], 'up'),
        ]);
    }
}
