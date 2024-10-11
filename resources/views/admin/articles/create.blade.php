@extends('layouts.admin')

@section('title', 'Utwórz Nowy Artykuł')

@section('content')
    @include('admin.articles.form')
@endsection

@section('scripts')
    @include('admin.articles.scripts')
@endsection
