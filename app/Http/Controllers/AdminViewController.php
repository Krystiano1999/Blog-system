<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;


class AdminViewController extends Controller
{
    public function showDashboard()
    {
        $articleCount = Article::count() ?? 0;
        $categoryCount = Category::count() ?? 0;
        $commentCount = Comment::count() ?? 0;
        $userCount = User::count() ?? 0;

        return view('admin.dashboard', compact('articleCount', 'categoryCount', 'commentCount', 'userCount'));
    }

    public function showArticle()
    {
        $articles = Article::with('user', 'category')->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    public function showCategory()
    {
        $categories = Category::paginate(10);
        return view('admin.category.index', compact('categories'));
    }

    public function showUser()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function showComments()
    {
        return view('admin.comments.index');
    }


}
