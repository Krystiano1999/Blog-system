<nav id="menu" class="navbar navbar-expand-lg position-fixed container w-100">
    <div class="d-flex align-items-center justify-content-between w-100">
        <a class="navbar-brand" href="{{ url('/') }}">Artykuły <span>SEO</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/about-us') }}">O nas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/blog') }}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/catalog') }}">Katalog Artykułów</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/knowledge-base') }}">Baza Wiedzy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/courses') }}">Kursy i Webinary</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contact') }}">Kontakt</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
