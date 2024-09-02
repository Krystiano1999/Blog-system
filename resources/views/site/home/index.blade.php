@extends('layouts.app')

@section('title', 'Artykuły SEO - Strona Główna')

@section('meta_description', 'Poznaj sprawdzone strategie SEO i content marketingu. Publikuj artykuły, poszerzaj wiedzę i zdominuj swoją niszę.')
@section('meta_keywords', 'seo, content marketing, artykuły, strategie seo, blog seo, kursy seo')

@section('content')

    <!-- Hero Section -->
    <section class="hero text-center position relative">
        <div class="container position-relative h-100">
            <strong class="position-absolute title-absolute">
                <i class="fas fa-chart-line"></i> Zwiększ widoczność, buduj markę, osiągaj sukces.
            </strong>
            <div class="h-100 d-flex align-items-center text-start">
                <div class="w-50">
                    <h1 class="display-1 font-weight-bold">SEO <br> Marketing</h1>
                    <p class="lead">Poznaj sprawdzone strategie SEO i content marketingu, które przynoszą rezultaty. Publikuj artykuły, poszerzaj wiedzę i zdominuj swoją niszę.</p>
                    <a href="{{ url('/catalog') }}" class="btn btn-primary btn-lg mr-2">Odkryj Katalog Artykułów</a>
                    <a href="{{ url('/blog') }}" class="btn btn-secondary btn-lg">Rozpocznij Przygodę z Blogiem</a>
                </div>
            </div>
        </div>

        <div class="floating-dot"></div>
        <div class="floating-dot"></div>
        <div class="floating-dot"></div>
    </section>

    <!-- O nas Section -->
    <section class="about-us py-5">
        <div class="container">
            <h2 class="text-center">Kreujemy wiedzę, która napędza Twój sukces online</h2>
            <p class="text-center">ArtykułySEO.pl to miejsce, gdzie praktycy SEO, specjaliści od content marketingu i przedsiębiorcy spotykają się, aby dzielić się wiedzą i narzędziami potrzebnymi do budowy silnej obecności online. Nasza misja to dostarczać wartościowe treści, które pomogą Ci wyróżnić się w cyfrowym świecie.</p>
            <div class="text-center">
                <a href="{{ url('/about-us') }}" class="btn btn-outline-primary">Dowiedz się więcej o nas</a>
            </div>
        </div>
    </section>

    <!-- Najnowsze Artykuły na Blogu -->
    <section class="latest-articles py-5">
        <div class="container">
            <h2 class="text-center">Co nowego na blogu?</h2>
            <div class="row">
                <!-- Example of Article Preview -->
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="path_to_image" class="card-img-top" alt="Article Image">
                        <div class="card-body">
                            <h5 class="card-title">Tytuł artykułu</h5>
                            <p class="card-text">Krótki opis artykułu...</p>
                            <a href="{{ url('/blog/article-slug') }}" class="btn btn-primary">Czytaj więcej</a>
                        </div>
                    </div>
                </div>
                <!-- Repeat for other articles -->
            </div>
            <div class="text-center">
                <a href="{{ url('/blog') }}" class="btn btn-outline-primary">Przeglądaj wszystkie artykuły</a>
            </div>
        </div>
    </section>

    <!-- Katalog Artykułów SEO -->
    <section class="catalog-preview py-5">
        <div class="container">
            <h2 class="text-center">Publikacje SEO od ekspertów branży</h2>
            <p class="text-center">Znajdź wartościowe artykuły SEO od wiodących firm i specjalistów. Przeglądaj, czytaj i publikuj własne treści, aby zwiększyć widoczność swojej marki.</p>
            <div class="row">
                <!-- Example of Sponsored Article Preview -->
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="path_to_image" class="card-img-top" alt="Sponsored Article Image">
                        <div class="card-body">
                            <h5 class="card-title">Tytuł artykułu sponsorowanego</h5>
                            <p class="card-text">Krótki opis artykułu...</p>
                            <a href="{{ url('/catalog/article-slug') }}" class="btn btn-primary">Czytaj więcej</a>
                        </div>
                    </div>
                </div>
                <!-- Repeat for other sponsored articles -->
            </div>
            <div class="text-center">
                <a href="{{ url('/catalog/create') }}" class="btn btn-outline-primary mr-2">Dodaj swój artykuł</a>
                <a href="{{ url('/catalog') }}" class="btn btn-outline-secondary">Przeglądaj cały katalog</a>
            </div>
        </div>
    </section>

    <!-- Baza Wiedzy -->
    <section class="knowledge-base py-5">
        <div class="container">
            <h2 class="text-center">Twoje źródło wiedzy SEO</h2>
            <p class="text-center">Od poradników po case studies - nasza baza wiedzy dostarcza wszystkich narzędzi i informacji, których potrzebujesz, aby zwiększyć swoją widoczność w sieci.</p>
            <div class="row">
                <!-- Example of Guide Preview -->
                <div class="col-md-3">
                    <div class="card mb-4">
                        <img src="path_to_image" class="card-img-top" alt="Guide Image">
                        <div class="card-body">
                            <h5 class="card-title">Tytuł poradnika</h5>
                            <p class="card-text">Krótki opis poradnika...</p>
                            <a href="{{ url('/knowledge-base/guide-slug') }}" class="btn btn-primary">Czytaj więcej</a>
                        </div>
                    </div>
                </div>
                <!-- Repeat for other guides -->
            </div>
            <div class="text-center">
                <a href="{{ url('/knowledge-base') }}" class="btn btn-outline-primary">Przeglądaj Bazę Wiedzy</a>
            </div>
        </div>
    </section>

    <!-- Kursy i Webinary -->
    <section class="courses-webinars py-5">
        <div class="container">
            <h2 class="text-center">Ucz się od najlepszych</h2>
            <p class="text-center">Odkryj nasze kursy i webinary prowadzone przez ekspertów, które pomogą Ci zyskać przewagę konkurencyjną. Dołącz do społeczności profesjonalistów SEO.</p>
            <div class="row">
                <!-- Example of Course/Webinar Preview -->
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="path_to_image" class="card-img-top" alt="Course/Webinar Image">
                        <div class="card-body">
                            <h5 class="card-title">Tytuł kursu/webinaru</h5>
                            <p class="card-text">Krótki opis kursu/webinaru...</p>
                            <a href="{{ url('/courses/course-slug') }}" class="btn btn-primary">Zobacz więcej</a>
                        </div>
                    </div>
                </div>
                <!-- Repeat for other courses/webinars -->
            </div>
            <div class="text-center">
                <a href="{{ url('/courses') }}" class="btn btn-outline-primary mr-2">Zobacz wszystkie kursy</a>
                <a href="{{ url('/webinars') }}" class="btn btn-outline-secondary">Zapisz się na webinar</a>
            </div>
        </div>
    </section>

@endsection
