@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
<div class="container py-4" style="max-width: 480px">
    <div class="card shadow-sm">
        <div class="card-body p-4">
            <h1 class="h3 mb-1">Buat Password Baru</h1>
            <p class="text-muted">Minimal 8 karakter.</p>

            <form method="POST" action="{{ route('password.update') }}" novalidate>
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email"
                           value="{{ old('email', $email) }}"
                           class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password Baru</label>
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

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Ulangi Password Baru</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                           class="form-control">
                </div>

                <button type="submit" class="btn btn-primary w-100">Simpan Password Baru</button>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('toggle-password').addEventListener('click', function () {
    var a = document.getElementById('password');
    var b = document.getElementById('password_confirmation');
    var show = a.type === 'password';
    a.type = show ? 'text' : 'password';
    b.type = show ? 'text' : 'password';
    this.textContent = show ? 'Sembunyikan' : 'Tampilkan';
});
</script>
@endsection
