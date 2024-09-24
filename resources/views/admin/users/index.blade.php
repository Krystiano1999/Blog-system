<!-- Widok dla zarządzania użytkownikami -->
@extends('layouts.admin')

@section('title', 'Zarządzanie Użytkownikami')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Zarządzanie Użytkownikami</h1>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">Dodaj Użytkownika</button>
    </div>

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Imię</th>
                <th>Email</th>
                <th>Rola</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ ucfirst($user->role) }}</td>
                <td>
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editUserModal-{{ $user->id }}">Edytuj</button>
                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć tego użytkownika?')">Usuń</button>
                    </form>
                </td>
            </tr>

            <!-- Modal do edycji -->
            <div class="modal fade" id="editUserModal-{{ $user->id }}" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{ route('admin.users.update', $user) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title" id="editUserModalLabel">Edytuj Użytkownika</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Imię</label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="role">Rola</label>
                                    <select name="role" class="form-control" required>
                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="super_admin" {{ $user->role == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                                        <option value="author" {{ $user->role == 'author' ? 'selected' : '' }}>Autor</option>
                                    </select>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="password">Hasło (opcjonalnie)</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
                                <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>

    <!-- Modal do dodawania -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalLabel">Dodaj Użytkownika</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Imię</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="role">Rola</label>
                            <select name="role" class="form-control" required>
                                <option value="admin">Admin</option>
                                <option value="super_admin">Super Admin</option>
                                <option value="author">Autor</option>
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="password">Hasło</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
                        <button type="submit" class="btn btn-primary">Dodaj Użytkownika</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
