@extends('admin.admin')

@section('title', 'Dashboard - Panel Admina')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <h1>Witamy w Panelu Admina</h1>
            <p>Statystyki Twojej witryny:</p>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Artykuły</h5>
                            <p class="card-text">{{ $articleCount }} artykułów</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Kategorie</h5>
                            <p class="card-text">{{ $categoryCount }} kategorii</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Komentarze</h5>
                            <p class="card-text">{{ $commentCount }} komentarzy</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
