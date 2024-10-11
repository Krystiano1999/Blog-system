<!-- resources/views/admin/articles/show.blade.php -->
@extends('layouts.admin')

@section('title', $article->title)

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1><i class="fas fa-file-alt"></i> {{ $article->title }}</h1>
        <div>
            <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-primary me-2"><i class="fas fa-edit"></i> Edytuj</a>
            <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Powrót</a>
        </div>
    </div>

    <div class="mb-4">
        <p><strong><i class="fas fa-user"></i> Autor:</strong> {{ $article->user->name }}</p>
        <p><strong><i class="fas fa-folder-open"></i> Kategoria:</strong> {{ $article->category->name }}</p>
        <p><strong><i class="fas fa-info-circle"></i> Status:</strong>
            @if($article->is_published)
                <span class="badge bg-success"><i class="fas fa-check"></i> Opublikowany</span>
            @else
                <span class="badge bg-secondary"><i class="fas fa-times"></i> Nieopublikowany</span>
            @endif
        </p>
        <p><strong><i class="fas fa-calendar-alt"></i> Data Publikacji:</strong> {{ $article->published_at ? $article->published_at->format('d-m-Y') : '-' }}</p>
    </div>

    @if($article->featured_image)
        <div class="mb-4 text-center">
            <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}" class="img-fluid rounded">
        </div>
    @endif

    <h3 class="mt-4"><i class="fas fa-align-left"></i> Wstęp</h3>
    <p>{{ $article->excerpt }}</p>

    <h3 class="mt-4"><i class="fas fa-file-alt"></i> Treść</h3>
    <div>{!! $article->body !!}</div>

    <div class="mt-4">
        <h4><i class="fas fa-tags"></i> Tagi</h4>
        @if($article->tags->count())
            @foreach($article->tags as $tag)
                <span class="badge bg-secondary me-1">{{ $tag->name }}</span>
            @endforeach
        @else
            <p>Brak tagów.</p>
        @endif
    </div>

    <div class="mt-4">
        <h4><i class="fas fa-building"></i> Firmy</h4>
        @if($article->companies->count())
            @foreach($article->companies as $company)
                <span class="badge bg-info me-1">{{ $company->name }}</span>
            @endforeach
        @else
            <p>Brak powiązanych firm.</p>
        @endif
    </div>

    <div class="mt-4">
        <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Powrót do listy artykułów</a>
    </div>
</div>
@endsection
