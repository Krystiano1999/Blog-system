@extends('layouts.auth')

@section('title', 'Logowanie - Panel Admina')

@section('content')
    <div class="full-screen-container">
        <div class="login-container">
            <div class="login-left">
                <div class="overlay"></div>
                
                <img src="{{ asset('images/admin/svg/logo-no-background.svg') }}" alt="Logo" class="admin-logo">

                <h1>Panel Admina</h1>
                <p>Witaj w panelu administracyjnym! Zaloguj się, aby zarządzać swoją stroną i treściami.</p>
            </div>
            <div class="login-right">
                <div class="login-form">
                    <h2>Zaloguj się</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Adres Email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Hasło" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Zaloguj się</button>
                        @if($errors->any())
                            <p class="error text-danger mt-2">{{ $errors->first() }}</p>
                        @endif
                        <div class="form-group text-right">
                            <a href="{{ route('password.request') }}" class="forgot-password-link">Zapomniałeś hasło?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
