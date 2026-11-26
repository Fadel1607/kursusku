@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container py-4">
    <h1 class="h3 mb-1">Dashboard KursusKu</h1>
    <p class="text-muted mb-4">Halo, {{ auth()->user()->name }}. Berikut ringkasan data langsung dari database.</p>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h2 class="h5 mb-3">Profil Saya</h2>
            <dl class="row mb-0">
                <dt class="col-sm-3">Nama</dt>
                <dd class="col-sm-9">{{ auth()->user()->name }}</dd>

                <dt class="col-sm-3">Email</dt>
                <dd class="col-sm-9">{{ auth()->user()->email }}</dd>

                <dt class="col-sm-3">Role</dt>
                <dd class="col-sm-9">
                    <span class="badge text-bg-{{ auth()->user()->role === 'admin' ? 'danger' : 'primary' }}">
                        {{ ucfirst(auth()->user()->role ?? 'user') }}
                    </span>
                </dd>

                <dt class="col-sm-3">Terdaftar sejak</dt>
                <dd class="col-sm-9">{{ auth()->user()->created_at?->format('d/m/Y') ?? '-' }}</dd>
            </dl>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="text-muted small">Total Course</div>
                    <div class="display-6 fw-bold">{{ $stats['courses'] }}</div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="text-muted small">Course Open</div>
                    <div class="display-6 fw-bold">{{ $stats['open_courses'] }}</div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="text-muted small">Participant</div>
                    <div class="display-6 fw-bold">{{ $stats['participants'] }}</div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <div class="text-muted small">Enrollment</div>
                    <div class="display-6 fw-bold">{{ $stats['enrollments'] }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
