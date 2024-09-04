<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Pobieranie liczby artykułów, kategorii, komentarzy i użytkowników
        $articleCount = Article::count() ?? 0;
        $categoryCount = Category::count() ?? 0;
        $commentCount = Comment::count() ?? 0;
        $userCount = User::count() ?? 0;

        return view('admin.dashboard', compact('articleCount', 'categoryCount', 'commentCount', 'userCount'));
    }
}
