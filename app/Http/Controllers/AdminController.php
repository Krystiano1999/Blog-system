<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;

class AdminController extends Controller
{
    public function showDashboard()
    {
        // Pobieranie liczby artykułów, kategorii, komentarzy i użytkowników
        $articleCount = Article::count() ?? 0;
        $categoryCount = Category::count() ?? 0;
        $commentCount = Comment::count() ?? 0;
        $userCount = User::count() ?? 0;

        return view('admin.dashboard', compact('articleCount', 'categoryCount', 'commentCount', 'userCount'));
    }

    public function showArticle()
    {
        return view('admin.article.index');
    }

    public function showCategory()
    {
        return view('admin.category.index');
    }

    public function showUser()
    {
        return view('admin.users.index')
    }
}
