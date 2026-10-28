<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $siteName = 'KursusKu';
        $tagline  = 'Platform Pelatihan & Sertifikasi Digital Terpercaya';

        $featured = [
            [
                'code' => 'WEB-01',
                'name' => 'Web Dasar',
                'description' => 'Belajar struktur HTML dan CSS dasar.'
            ],
            [
                'code' => 'PHP-01',
                'name' => 'PHP Dasar',
                'description' => 'Belajar variabel, function, form, dan logika PHP.'
            ],
            [
                'code' => 'LAR-01',
                'name' => 'Laravel Fundamental',
                'description' => 'Belajar route, controller, Blade, dan MVC.'
            ],
        ];

        // Katalog dipindahkan dari prototype index.php (pertemuan 4)
        $catalog = [
            ['id' => 101, 'judul' => 'Web Development Fundamentals', 'kategori' => 'Programming',   'harga' => 450000, 'kapasitas' => 30, 'terisi' => 22, 'status' => 'aktif',  'tanggal' => '2026-10-01'],
            ['id' => 102, 'judul' => 'Mastering Laravel Framework',  'kategori' => 'Programming',   'harga' => 750000, 'kapasitas' => 25, 'terisi' => 25, 'status' => 'penuh',  'tanggal' => '2026-10-05'],
            ['id' => 103, 'judul' => 'UI/UX Design for Beginner',    'kategori' => 'Design',        'harga' => 350000, 'kapasitas' => 20, 'terisi' => 12, 'status' => 'aktif',  'tanggal' => '2026-10-10'],
            ['id' => 104, 'judul' => 'Data Science Dasar dengan Python', 'kategori' => 'Data',      'harga' => 600000, 'kapasitas' => 20, 'terisi' => 5,  'status' => 'aktif',  'tanggal' => '2026-10-15'],
            ['id' => 105, 'judul' => 'Digital Marketing Essentials', 'kategori' => 'Business',      'harga' => 300000, 'kapasitas' => 40, 'terisi' => 0,  'status' => 'segera', 'tanggal' => '2026-11-01'],
            ['id' => 106, 'judul' => 'Cybersecurity Awareness',      'kategori' => 'IT & Security', 'harga' => 500000, 'kapasitas' => 15, 'terisi' => 15, 'status' => 'penuh',  'tanggal' => '2026-10-20'],
        ];

        // Hitung sisa kursi di controller (setara sisaKursi() di helpers.php prototype)
        foreach ($catalog as &$c) {
            $c['sisa'] = max(0, $c['kapasitas'] - $c['terisi']);
        }
        unset($c);

        return view('home', compact('siteName', 'tagline', 'featured', 'catalog'));
    }
}
