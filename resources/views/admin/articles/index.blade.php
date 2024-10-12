@extends('layouts.admin')

@section('title', 'Lista Artykułów')

@section('content')
<div class="container mt-4">
    <h1>Lista Artykułów</h1>
    <a href="{{ route('admin.articles.create') }}" class="btn btn-success mb-3">Dodaj Nowy Artykuł</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($articles->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tytuł</th>
                    <th>Autor</th>
                    <th>Kategoria</th>
                    <th>Status</th>
                    <th>Data Publikacji</th>
                    <th>Akcje</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->user->name }}</td>
                        <td>{{ $article->category->name }}</td>
                        <td>
                            @if($article->is_published)
                                <span class="badge bg-success">Opublikowany</span>
                            @else
                                <span class="badge bg-warning text-dark">Nieopublikowany</span>
                            @endif
                        </td>
                        <td>{{ $article->published_at ? $article->published_at->format('d-m-Y') : '-' }}</td>
                        <td>
                            <a href="{{ route('admin.articles.show', $article) }}" class="btn btn-info btn-sm">Pokaż</a>
                            <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-primary btn-sm">Edytuj</a>
                            <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Czy na pewno chcesz usunąć ten artykuł?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Usuń</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $articles->links() }}
    @else
        <p>Brak artykułów do wyświetlenia.</p>
    @endif
</div>
@endsection
