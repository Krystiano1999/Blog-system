<!-- resources/views/admin/article/form.blade.php -->
@extends('layouts.admin')

@section('title', isset($article) ? 'Edytuj Artykuł' : 'Utwórz Nowy Artykuł')

@section('content')
<div class="container mt-4">
    <h1>{{ isset($article) ? 'Edytuj Artykuł' : 'Utwórz Nowy Artykuł' }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Uwaga!</strong> Wystąpiły błędy w formularzu:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($article) ? route('admin.article.update', $article) : route('admin.article.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($article))
            @method('PUT')
        @endif

        <!-- Tytuł -->
        <div class="mb-3">
            <label for="title" class="form-label">Tytuł</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', isset($article) ? $article->title : '') }}" required>
        </div>

        <!-- Wstęp -->
        <div class="mb-3">
            <label for="excerpt" class="form-label">Wstęp</label>
            <textarea class="form-control" id="excerpt" name="excerpt" rows="3" required>{{ old('excerpt', isset($article) ? $article->excerpt : '') }}</textarea>
        </div>

        <!-- Treść -->
        <div class="mb-3">
            <label for="body" class="form-label">Treść</label>
            <textarea class="form-control" id="body" name="body" rows="6" required>{{ old('body', isset($article) ? $article->body : '') }}</textarea>
        </div>

        <!-- Kategoria -->
        <div class="mb-3">
            <label for="category_id" class="form-label">Kategoria</label>
            <select class="form-control" id="category_id" name="category_id" required>
                <option value="">-- Wybierz Kategorię --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ (old('category_id', isset($article) ? $article->category_id : '') == $category->id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Tagi -->
        <div class="mb-3">
            <label for="tags" class="form-label">Tagi</label>
            <select class="form-control" id="tags" name="tags[]" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" {{ (collect(old('tags', isset($article) ? $article->tags->pluck('id')->toArray() : []))->contains($tag->id)) ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Firmy -->
        <div class="mb-3">
            <label for="companies" class="form-label">Firmy</label>
            <select class="form-control" id="companies" name="companies[]" multiple>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ (collect(old('companies', isset($article) ? $article->companies->pluck('id')->toArray() : []))->contains($company->id)) ? 'selected' : '' }}>
                        {{ $company->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Obrazek wyróżniający -->
        <div class="mb-3">
            <label for="featured_image" class="form-label">Obrazek Wyróżniający</label>
            @if(isset($article) && $article->featured_image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}" class="img-thumbnail" width="200">
                </div>
            @endif
            <input type="file" class="form-control" id="featured_image" name="featured_image">
        </div>

        <!-- Publikacja -->
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="is_published" name="is_published" {{ old('is_published', isset($article) ? $article->is_published : false) ? 'checked' : '' }}>
            <label class="form-check-label" for="is_published">
                Opublikuj
            </label>
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($article) ? 'Zaktualizuj' : 'Zapisz' }}</button>
    </form>
</div>
@endsection

@section('scripts')
<!-- CKEditor 5 -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
<!-- Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>

<script>
    // Inicjalizacja CKEditor
    ClassicEditor
        .create(document.querySelector('#body'))
        .catch(error => {
            console.error(error);
        });

    // Inicjalizacja Select2
    $(document).ready(function() {
        $('#tags').select2({
            placeholder: "Wybierz tagi",
            allowClear: true
        });
        $('#companies').select2({
            placeholder: "Wybierz firmy",
            allowClear: true
        });
    });
</script>
@endsection
