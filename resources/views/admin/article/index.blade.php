@extends('layouts.admin')

@section('title', 'Artykuły - Panel Admina')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Artykuły</h1>
        <a href="{{ route('admin.article.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Dodaj nowy artykuł
        </a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tytuł</th>
                <th>Kategoria</th>
                <th>Autor</th>
                <th>Data utworzenia</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
            <tr>
                <td>{{ $article->title }}</td>
                <td>{{ $article->category->name ?? 'Brak kategorii' }}</td>
                <td>{{ $article->user->name ?? 'Anonim' }}</td>
                <td>{{ $article->created_at->format('d.m.Y') }}</td>
                <td>
                    <a href="{{ route('admin.article.edit', $article->id) }}" class="btn btn-sm btn-warning">
                        <i class="fas fa-edit"></i> Edytuj
                    </a>
                    <form action="{{ route('admin.article.destroy', $article->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć ten artykuł?')">
                            <i class="fas fa-trash"></i> Usuń
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginacja -->
    <div class="d-flex justify-content-center">
        {{ $articles->links() }}
    </div>
</div>
@endsection
