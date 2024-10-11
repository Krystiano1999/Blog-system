<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">{{ isset($article) ? 'Edytuj Artykuł' : 'Utwórz Nowy Artykuł' }}</h1>
        <a href="{{ route('admin.articles.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left"></i> Powrót do listy
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Uwaga!</strong> Wystąpiły błędy w formularzu:
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li><i class="fas fa-exclamation-circle"></i> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($article) ? route('admin.articles.update', $article) : route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($article))
            @method('PUT')
        @endif

        <div class="card shadow-sm p-4 mb-4">
            <!-- Tytuł -->
            <div class="mb-3">
                <label for="title" class="form-label fw-bold">Tytuł <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-lg @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $article->title ?? '') }}" placeholder="Wprowadź tytuł artykułu" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Wstęp -->
            <div class="mb-3">
                <label for="excerpt" class="form-label fw-bold">Wstęp <span class="text-danger">*</span></label>
                <textarea class="form-control @error('excerpt') is-invalid @enderror" id="excerpt" name="excerpt" rows="3" placeholder="Krótki wstęp do artykułu" required>{{ old('excerpt', $article->excerpt ?? '') }}</textarea>
                @error('excerpt')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Treść -->
            <div class="mb-4">
                <label for="body" class="form-label fw-bold">Treść <span class="text-danger">*</span></label>
                <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="10" placeholder="Treść artykułu" required>{{ old('body', $article->body ?? '') }}</textarea>
                @error('body')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <!-- Kategoria -->
                <div class="col-md-6 mb-3">
                    <label for="category_id" class="form-label fw-bold">Kategoria <span class="text-danger">*</span></label>
                    <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                        <option value="">-- Wybierz Kategorię --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ (old('category_id', $article->category_id ?? '') == $category->id) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Obrazek wyróżniający -->
                <div class="col-md-6 mb-3">
                    <label for="featured_image" class="form-label fw-bold">Obrazek Wyróżniający</label>
                    @if(isset($article) && $article->featured_image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}" class="img-thumbnail" width="150">
                        </div>
                    @endif
                    <input type="file" class="form-control @error('featured_image') is-invalid @enderror" id="featured_image" name="featured_image">
                    @error('featured_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <!-- Tagi -->
                <div class="col-md-6 mb-3">
                    <label for="tags" class="form-label fw-bold">Tagi</label>
                    <select class="form-select @error('tags') is-invalid @enderror" id="tags" name="tags[]" multiple>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}" {{ (collect(old('tags', $article->tags->pluck('id')->toArray() ?? []))->contains($tag->id)) ? 'selected' : '' }}>
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('tags')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Firmy -->
                <div class="col-md-6 mb-3">
                    <label for="companies" class="form-label fw-bold">Firmy</label>
                    <select class="form-select @error('companies') is-invalid @enderror" id="companies" name="companies[]" multiple>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}" {{ (collect(old('companies', $article->companies->pluck('id')->toArray() ?? []))->contains($company->id)) ? 'selected' : '' }}>
                                {{ $company->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('companies')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Publikacja -->
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="is_published" name="is_published" {{ old('is_published', $article->is_published ?? false) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_published">
                    Opublikuj
                </label>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success btn-lg">
                    <i class="fas fa-save"></i> {{ isset($article) ? 'Zaktualizuj' : 'Zapisz' }}
                </button>
            </div>
        </div>
    </form>
</div>
