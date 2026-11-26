<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Pertemuan 7: route home lewat controller
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

// UAS: autentikasi (login, lupa password, reset password) - hanya untuk tamu
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');

    Route::get('/forgot-password', [AuthController::class, 'showForgot'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');

    Route::get('/reset-password/{token}', [AuthController::class, 'showReset'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});

// UAS: logout (harus sedang login)
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// UAS: dashboard / profil hanya untuk yang sudah login
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

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

// Pertemuan 10-13: CRUD Course (search, filter, pagination)
Route::resource('courses', CourseController::class);

// Pertemuan 12: Enrollment (index = laporan, create = form, store = simpan)
Route::resource('enrollments', EnrollmentController::class)
    ->only(['index', 'create', 'store']);

// Link lama /pendaftaran diarahkan ke form baru
Route::redirect('/pendaftaran', '/enrollments/create');
