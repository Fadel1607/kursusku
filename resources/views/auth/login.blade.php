@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container py-4" style="max-width: 480px">
    <div class="card shadow-sm">
        <div class="card-body p-4">
            <h1 class="h3 mb-1">Login KursusKu</h1>
            <p class="text-muted">Masuk untuk membuka dashboard dan profil Anda.</p>

            <form method="POST" action="{{ route('login.attempt') }}" novalidate>
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

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group has-validation">
                        <input type="password" id="password" name="password"
                               class="form-control @error('password') is-invalid @enderror">
                        <button type="button" id="toggle-password"
                                class="btn btn-outline-secondary">Tampilkan</button>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember"
                               id="remember" value="1" @checked(old('remember'))>
                        <label class="form-check-label" for="remember">Ingat saya</label>
                    </div>
                    <a href="{{ route('password.request') }}">Lupa password?</a>
                </div>

                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('toggle-password').addEventListener('click', function () {
    var input = document.getElementById('password');
    var show = input.type === 'password';
    input.type = show ? 'text' : 'password';
    this.textContent = show ? 'Sembunyikan' : 'Tampilkan';
});
</script>
@endsection
