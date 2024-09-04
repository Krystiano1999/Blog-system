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
        $articlesCount = Article::count();
        $categoriesCount = Category::count();
        $commentsCount = Comment::count();
        $usersCount = User::count();

        return view('admin.dashboard', compact('articlesCount', 'categoriesCount', 'commentsCount', 'usersCount'));
    }
}
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
        $articlesCount = Article::count();
        $categoriesCount = Category::count();
        $commentsCount = Comment::count();
        $usersCount = User::count();

        return view('admin.dashboard', compact('articlesCount', 'categoriesCount', 'commentsCount', 'usersCount'));
    }
}
