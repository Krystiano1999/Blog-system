<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    // Wyświetl listę artykułów
    public function index()
    {
        $articles = Article::with('user', 'category')->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    // Pokaż formularz tworzenia nowego artykułu
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $companies = Company::all();
        return view('admin.articles.create', compact('categories', 'tags', 'companies'));
    }

    // Przechowaj nowy artykuł w bazie danych
    public function store(Request $request)
    {
        $request->validate([
            'title'           => 'required|max:255',
            'excerpt'         => 'required',
            'body'            => 'required',
            'category_id'     => 'required|exists:categories,id',
            'featured_image'  => 'nullable|image|max:2048',
        ]);

        $article = new Article();
        $article->user_id       = auth()->id();
        $article->category_id   = $request->category_id;
        $article->title         = $request->title;
        $article->slug          = Str::slug($request->title);
        $article->excerpt       = $request->excerpt;
        $article->body          = $request->body;
        $article->is_published  = $request->has('is_published');
        $article->published_at  = $article->is_published ? now() : null;

        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('articles');
            $article->featured_image = $path;
        }

        $article->save();

        // Synchronizacja tagów i firm
        $article->tags()->sync($request->tags);
        $article->companies()->sync($request->companies);

        return redirect()->route('admin.articles.show', $article)->with('success', 'Artykuł został utworzony.');
    }

    // Wyświetl konkretny artykuł
    public function show(Article $article)
    {
        return view('admin.articles.show', compact('article'));
    }

    // Pokaż formularz edycji artykułu
    public function edit(Article $article)
    {
        $this->authorize('update', $article);

        $categories = Category::all();
        $tags = Tag::all();
        $companies = Company::all();

        return view('admin.articles.edit', compact('article', 'categories', 'tags', 'companies'));
    }

    // Zaktualizuj istniejący artykuł w bazie danych
    public function update(Request $request, Article $article)
    {
        $this->authorize('update', $article);

        $request->validate([
            'title'           => 'required|max:255',
            'excerpt'         => 'required',
            'body'            => 'required',
            'category_id'     => 'required|exists:categories,id',
            'featured_image'  => 'nullable|image|max:2048',
        ]);

        $article->category_id   = $request->category_id;
        $article->title         = $request->title;
        $article->slug          = Str::slug($request->title);
        $article->excerpt       = $request->excerpt;
        $article->body          = $request->body;
        $article->is_published  = $request->has('is_published');
        $article->published_at  = $article->is_published ? now() : null;

        if ($request->hasFile('featured_image')) {
            // Usuń stary obrazek
            if ($article->featured_image) {
                Storage::delete($article->featured_image);
            }
            $path = $request->file('featured_image')->store('articles');
            $article->featured_image = $path;
        }

        $article->save();

        // Synchronizacja tagów i firm
        $article->tags()->sync($request->tags);
        $article->companies()->sync($request->companies);

        return redirect()->route('admin.articles.show', $article)->with('success', 'Artykuł został zaktualizowany.');
    }

    // Usuń artykuł z bazy danych
    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);

        // Usuń powiązane tagi i firmy
        $article->tags()->detach();
        $article->companies()->detach();

        // Usuń obrazek
        if ($article->featured_image) {
            Storage::delete($article->featured_image);
        }

        $article->delete();

        return redirect()->route('admin.articles.index')->with('success', 'Artykuł został usunięty.');
    }
}
