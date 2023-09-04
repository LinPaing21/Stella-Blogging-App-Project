<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function userRole(User $user) {
        if (request()->role == $user->role) {
            # code...
            return back();
        }

        $user->role = request()->role;
        $user->update();

        return back()->with('success', "Successfully Changed User: {$user->username}'s role.");
    }

    public function userDestroy(User $user) {
        $user->delete();
        return back()->with('success', "Successfully Deleted User: {$user->username}.");
    }

    public function addCat() {
        $category = new Category;
        $category->slug = Str::replace(' ', '-', Str::lower(request('name')));
        $category->name = request('name');
        $category->save();

        return back()->with('success', 'New Category is Added!');
    }
}
