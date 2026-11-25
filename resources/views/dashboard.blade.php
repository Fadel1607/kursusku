@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container py-4">
    <h1 class="h3 mb-1">Dashboard KursusKu</h1>
    <p class="text-muted mb-4">Ringkasan data langsung dari database.</p>

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
