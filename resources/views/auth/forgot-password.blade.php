@extends('layouts.app')

@section('title', 'Lupa Password')

@section('content')
<div class="container py-4" style="max-width: 480px">
    <div class="card shadow-sm">
        <div class="card-body p-4">
            <h1 class="h3 mb-1">Lupa Password</h1>
            <p class="text-muted">Masukkan email akun Anda. Kami akan mengirim link untuk membuat password baru.</p>

            <form method="POST" action="{{ route('password.email') }}" novalidate>
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email"
                           value="{{ old('email') }}" autofocus
                           class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Kirim Link Reset</button>
                    <a href="{{ route('login') }}" class="btn btn-outline-secondary">Kembali ke Login</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
