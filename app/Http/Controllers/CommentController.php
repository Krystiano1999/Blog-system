<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Article;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Przechowaj nowy komentarz
    public function store(Request $request, Article $article)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $comment = new Comment();
        $comment->user_id    = auth()->id();
        $comment->article_id = $article->id;
        $comment->content    = $request->content;
        $comment->is_approved = true; // Ustaw na false, jeśli wymagana jest moderacja
        $comment->save();

        return redirect()->route('articles.show', $article)->with('success', 'Komentarz został dodany.');
    }

    // Usuń komentarz
    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return back()->with('success', 'Komentarz został usunięty.');
    }

    // Pokaż formularz edycji komentarza
    public function edit(Comment $comment)
    {
        $this->authorize('update', $comment);

        return view('comments.edit', compact('comment'));
    }

    // Zaktualizuj komentarz w bazie danych
    public function update(Request $request, Comment $comment)
    {
        $this->authorize('update', $comment);

        $request->validate([
            'content' => 'required',
        ]);

        $comment->content = $request->content;
        $comment->save();

        return redirect()->route('articles.show', $comment->article)->with('success', 'Komentarz został zaktualizowany.');
    }
}
