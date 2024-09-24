<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // Pokaż formularz tworzenia nowej kategorii
    public function create()
    {
        return view('categories.create');
    }

    // Przechowaj nową kategorię w bazie danych
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|max:255',
            'description' => 'nullable',
        ]);

        $category = new Category();
        $category->name        = $request->name;
        $category->slug        = Str::slug($request->name);
        $category->description = $request->description;
        $category->save();

        return redirect()->route('categories.show', $category)->with('success', 'Kategoria została utworzona.');
    }

    // Wyświetl konkretną kategorię
    public function show(Category $category)
    {
        $articles = $category->articles()->paginate(10);
        return view('categories.show', compact('category', 'articles'));
    }

    // Pokaż formularz edycji kategorii
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Zaktualizuj istniejącą kategorię w bazie danych
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'        => 'required|max:255',
            'description' => 'nullable',
        ]);

        $category->name        = $request->name;
        $category->slug        = Str::slug($request->name);
        $category->description = $request->description;
        $category->save();

        return redirect()->route('categories.show', $category)->with('success', 'Kategoria została zaktualizowana.');
    }

    // Usuń kategorię z bazy danych
    public function destroy(Category $category)
    {
        // Opcjonalnie: Sprawdź, czy kategoria nie zawiera artykułów
        if ($category->articles()->count() > 0) {
            return redirect()->route('categories.index')->with('error', 'Nie można usunąć kategorii zawierającej artykuły.');
        }

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Kategoria została usunięta.');
    }
}
