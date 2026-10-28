@extends('layouts.app')

@section('title', 'Beranda - KursusKu')

@section('content')
<section class="py-5">
    <div class="row align-items-center g-4">
        <div class="col-lg-7">
            <span class="badge text-bg-success mb-3">
                Kursus teknologi untuk mahasiswa
            </span>
            <h1 class="display-5 fw-bold">
                Belajar lebih terarah bersama KursusKu
            </h1>
            <p class="lead text-secondary">
                Pilih kursus, cek ketersediaan kursi, lalu isi formulir pendaftaran.
            </p>
            <a href="{{ route('enrollments.create') }}"
               class="btn btn-success">
                Daftar Kursus
            </a>
        </div>
    </div>
</section>

<section class="pb-4">
    <h2 class="h4 mb-3">Kursus Pilihan</h2>
    <div class="row g-3">
        @foreach ($featured as $course)
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <small class="text-secondary">{{ $course['code'] }}</small>
                        <h3 class="h5">{{ $course['name'] }}</h3>
                        <p class="mb-0">{{ $course['description'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<section class="pb-4">
    <h2 class="h4 mb-3">Katalog Kursus</h2>
    <div class="table-responsive card shadow-sm">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>ID</th><th>Judul Kursus</th><th>Kategori</th>
                    <th>Mulai Kelas</th><th>Biaya</th><th>Sisa Kursi</th><th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($catalog as $c)
                    <tr>
                        <td>{{ $c['id'] }}</td>
                        <td><strong>{{ $c['judul'] }}</strong></td>
                        <td>{{ $c['kategori'] }}</td>
                        <td>{{ date('d-m-Y', strtotime($c['tanggal'])) }}</td>
                        <td>Rp {{ number_format($c['harga'], 0, ',', '.') }}</td>
                        <td>{{ $c['sisa'] }} Kursi</td>
                        <td>
                            @if ($c['status'] === 'aktif')
                                <span class="badge text-bg-success">Buka</span>
                            @elseif ($c['status'] === 'penuh')
                                <span class="badge text-bg-danger">Penuh</span>
                            @else
                                <span class="badge text-bg-warning">Segera</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
