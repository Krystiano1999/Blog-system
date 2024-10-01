<!-- resources/views/admin/article/show.blade.php -->
@extends('layouts.admin')

@section('title', $article->title)

@section('content')
<div class="container mt-4">
    <h1>{{ $article->title }}</h1>

    <p><strong>Autor:</strong> {{ $article->user->name }}</p>
    <p><strong>Kategoria:</strong> {{ $article->category->name }}</p>
    <p><strong>Status:</strong>
        @if($article->is_published)
            <span class="badge bg-success">Opublikowany</span>
        @else
            <span class="badge bg-warning text-dark">Nieopublikowany</span>
        @endif
    </p>
    <p><strong>Data Publikacji:</strong> {{ $article->published_at ? $article->published_at->format('d-m-Y') : '-' }}</p>

    @if($article->featured_image)
        <div class="mb-3">
            <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}" class="img-fluid">
        </div>
    @endif

    <h3>Wstęp</h3>
    <p>{{ $article->excerpt }}</p>

    <h3>Treść</h3>
    <div>{!! $article->body !!}</div>

    <h3>Tagi</h3>
    @if($article->tags->count())
        @foreach($article->tags as $tag)
            <span class="badge bg-secondary">{{ $tag->name }}</span>
        @endforeach
    @else
        <p>Brak tagów.</p>
    @endif

    <h3>Firmy</h3>
    @if($article->companies->count())
        @foreach($article->companies as $company)
            <span class="badge bg-info">{{ $company->name }}</span>
        @endforeach
    @else
        <p>Brak powiązanych firm.</p>
    @endif

    <a href="{{ route('admin.article.index') }}" class="btn btn-secondary mt-3">Powrót do listy artykułów</a>
</div>
@endsection
