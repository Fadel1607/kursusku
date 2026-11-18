<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Pertemuan 7: route home lewat controller
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

// Pertemuan 9: endpoint JSON dummy untuk Ajax (masih dipakai app.js)
Route::get('/courses/{course}/availability', function (int $course) {
    $availability = [
        1 => [
            'course'    => 'Web Dasar',
            'remaining' => 12,
        ],
        2 => [
            'course'    => 'PHP Dasar',
            'remaining' => 8,
        ],
        3 => [
            'course'    => 'Laravel Dasar',
            'remaining' => 4,
        ],
    ];

    abort_unless(isset($availability[$course]), 404);

    return response()->json($availability[$course]);
})->name('courses.availability');

// Pertemuan 10-11: CRUD Course
Route::resource('courses', CourseController::class);

// Pertemuan 12: Enrollment (index = laporan, create = form, store = simpan)
// Catatan: route dummy /pendaftaran dari pertemuan 9 dihapus karena namanya
// (enrollments.create) bentrok dengan resource enrollments.
Route::resource('enrollments', EnrollmentController::class)
    ->only(['index', 'create', 'store']);

// Link lama /pendaftaran diarahkan ke form baru
Route::redirect('/pendaftaran', '/enrollments/create');
