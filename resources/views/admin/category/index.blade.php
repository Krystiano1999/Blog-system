@extends('layouts.admin')

@section('title', 'Kategorie - Panel Admina')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Kategorie</h1>
        <a href="{{ route('admin.category.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Dodaj nową kategorię
        </a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nazwa</th>
                <th>Opis</th>
                <th>Liczba artykułów</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ Str::limit($category->description, 50) }}</td>
                <td>{{ $category->articles_count }}</td>
                <td>
                    <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-sm btn-warning">
                        <i class="fas fa-edit"></i> Edytuj
                    </a>
                    <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć tę kategorię?')">
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
        {{ $categories->links() }}
    </div>
</div>
@endsection
