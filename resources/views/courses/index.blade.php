@extends('layouts.app')

@section('title', 'Daftar Kursus')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h1 class="h3 mb-1">Daftar Kursus</h1>
            <p class="text-muted mb-0">Data diambil dari MySQL melalui Eloquent.</p>
        </div>
        <a href="{{ route('courses.create') }}" class="btn btn-primary">
            + Tambah Kursus
        </a>
    </div>

    {{-- Pesan sukses sudah ditampilkan oleh layouts/app.blade.php --}}

    {{-- Form GET: berfungsi tanpa JavaScript (fallback). Tidak butuh @csrf. --}}
    <form method="GET" action="{{ route('courses.index') }}" class="row g-2 mb-3">
        <div class="col-md-6">
            <input type="search" id="live-search" name="q" value="{{ $search }}"
                   class="form-control" placeholder="Cari kode atau nama kursus">
        </div>

        <div class="col-md-3">
            <select name="status" id="status-filter" class="form-select">
                <option value="">Semua status</option>
                <option value="open" @selected($status === 'open')>Open</option>
                <option value="closed" @selected($status === 'closed')>Closed</option>
                <option value="draft" @selected($status === 'draft')>Draft</option>
            </select>
        </div>

        <div class="col-md-3 d-flex gap-2">
            <button type="submit" class="btn btn-primary">Cari</button>
            <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary">Reset</a>
        </div>
    </form>

    @include('courses._results')
</div>

{{--
    OPSIONAL (Ajax live search, debounce 300 ms, Ajax pagination).
    Hapus blok <script> ini kalau Ajax tidak dipakai; form GET di atas tetap berfungsi.
    Dijalankan setelah DOMContentLoaded karena jQuery dimuat lewat Vite (module).
--}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    if (typeof window.$ === 'undefined') { return; }

    var searchTimer;
    var baseUrl = "{{ route('courses.index') }}";

    function loadCourses(url) {
        var q = $('#live-search').val();
        var status = $('#status-filter').val();

        $('#course-results').css('opacity', 0.5);

        $.get(url || baseUrl, { q: q, status: status, partial: 1 })
            .done(function (html) {
                $('#course-results').replaceWith(html);
            })
            .fail(function () {
                $('#course-results').css('opacity', 1);
                console.error('Gagal memuat hasil course.');
            });
    }

    $(document).on('input', '#live-search', function () {
        clearTimeout(searchTimer);
        searchTimer = setTimeout(function () {
            loadCourses();
        }, 300);
    });

    $(document).on('change', '#status-filter', function () {
        loadCourses();
    });

    $(document).on('click', '#course-results .pagination a', function (e) {
        e.preventDefault();
        loadCourses($(this).attr('href'));
    });
});
</script>
@endsection
