<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

/**
 * Data dummy untuk pengujian search, filter, dan pagination (pertemuan 13).
 * Kode DUM-01 sampai DUM-25. Aman dijalankan berulang (firstOrCreate).
 */
class CourseDummySeeder extends Seeder
{
    public function run(): void
    {
        $names = [
            'Web Modern Dasar', 'Web Modern Lanjut', 'Web Modern Responsif',
            'Laravel Lanjutan', 'Laravel API Dasar', 'Laravel Testing',
            'PHP OOP Dasar', 'PHP OOP Lanjut', 'MySQL Query Dasar',
            'MySQL Optimasi', 'JavaScript Modern', 'JavaScript DOM',
            'jQuery Interaktif', 'Bootstrap Layout', 'Bootstrap Komponen',
            'Git dan GitHub', 'Algoritma Dasar', 'Struktur Data Dasar',
            'Basis Data Relasional', 'UI Desain Dasar', 'REST API Praktis',
            'Deployment Hosting', 'Keamanan Web Dasar', 'Unit Testing PHP',
            'Kursus Zebra Unik',
        ];

        // Pola status: 3 open, 1 closed, 1 draft (berulang) => open > 10 data
        $statusPattern = ['open', 'open', 'open', 'closed', 'draft'];

        foreach ($names as $i => $name) {
            $number = $i + 1;

            Course::firstOrCreate(
                ['code' => sprintf('DUM-%02d', $number)],
                [
                    'name' => $name,
                    'description' => 'Data dummy untuk pengujian search dan pagination.',
                    'fee' => 100000 + ($number * 10000),
                    'quota' => 10 + $number,
                    'start_date' => now()->addDays($number)->toDateString(),
                    'status' => $statusPattern[$i % 5],
                ]
            );
        }
    }
}
