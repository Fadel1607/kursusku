<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $siteName }} - {{ $tagline }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<header class="navbar">
    <div class="container">
        <strong>{{ $siteName }}</strong>
        <nav>
            <a href="{{ route('home') }}" style="color:white">Beranda</a>
        </nav>
    </div>
</header>

<main class="container">
    <section class="hero">
        <div>
            <p>Belajar Web Secara Bertahap</p>
            <h1>Bangun kemampuan web dari PHP sampai Laravel.</h1>
            <p>KursusKu menyediakan latihan terarah untuk pemula.</p>
        </div>
        <img src="{{ asset('images/hero-kursus.jpg') }}"
             alt="Ilustrasi kelas KursusKu">
    </section>

    <section>
        <h2>Kursus Pilihan</h2>
        <div class="course-grid">
            @foreach ($featured as $course)
                <article class="card">
                    <small>{{ $course['code'] }}</small>
                    <h3>{{ $course['name'] }}</h3>
                    <p>{{ $course['description'] }}</p>
                </article>
            @endforeach
        </div>
    </section>

    <section>
        <h2>Katalog Kursus</h2>
        <div class="table-wrap">
            <table>
                <thead>
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
                            <td><span class="status status-{{ $c['status'] }}">{{ ucfirst($c['status']) }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</main>
</body>
</html>
