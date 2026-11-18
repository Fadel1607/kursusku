# KursusKu

Project praktikum Pemrograman Web III (Bahasa Pemrograman III: PHP & MySQL).
Platform pendaftaran kursus yang dikembangkan bertahap dari prototype PHP biasa menjadi aplikasi Laravel dengan database MySQL relasional.

## Requirement

- PHP 8.3 atau lebih baru
- Composer
- Node.js dan npm
- Laravel 13
- Laragon (Apache dan MySQL) atau web server lokal setara

## Cara Menjalankan

1. Buka Laragon, klik **Start All** (Apache dan MySQL harus aktif).
2. Buat database kosong bernama `kursusku` di HeidiSQL atau phpMyAdmin (collation `utf8mb4_unicode_ci`).
3. Buka terminal pada folder project, lalu jalankan:
   ```
   composer install
   npm install
   copy .env.example .env
   php artisan key:generate
   ```
4. Buka file `.env`, atur koneksi database:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=kursusku
   DB_USERNAME=root
   DB_PASSWORD=
   ```
   (isi `DB_PASSWORD` sesuai password MySQL lokal)
5. Buat tabel dan (opsional) isi data contoh:
   ```
   php artisan config:clear
   php artisan migrate
   php artisan db:seed --class=CourseSeeder
   php artisan db:seed --class=ParticipantSeeder
   ```
6. Build aset frontend (Bootstrap dan jQuery):
   ```
   npm run build
   ```
7. Jalankan server:
   ```
   php artisan serve
   ```
8. Buka alamat yang ditampilkan terminal, biasanya `http://127.0.0.1:8000`.

## Fitur

### Milestone 7 - Route, Controller, Blade
- Named route `home`, `HomeController@index`, landing page Blade dengan data dari controller

### Milestone 9 - Layout, Bootstrap, Form, Ajax
- Master layout Blade dan navbar reusable
- Bootstrap, Popper, dan jQuery melalui Vite
- Cek sisa kursi dengan jQuery Ajax (JSON dummy)

### Milestone 10-11 - Database dan CRUD Course
- Database MySQL, migration `courses`, model `Course`
- CRUD lengkap: index, create, store, show, edit, update, destroy
- Validasi dengan Form Request (`StoreCourseRequest`, `UpdateCourseRequest`)

### Milestone 12 - Relational Database
- Tabel `participants` dan `enrollments` (foreign key `participant_id` dan `course_id`, `cascadeOnDelete`)
- Composite unique `(participant_id, course_id)` agar tidak ada pendaftaran ganda
- Relasi Eloquent: `Course hasMany Enrollment`, `Participant hasMany Enrollment`, `Enrollment belongsTo Participant/Course`
- Form enrollment dengan dua dropdown relasional dan pesan duplicate
- Laporan relasional `/enrollments`: participant, course, start date, status
- Pengujian cascade delete dengan data dummy

## Struktur Singkat

```
app/Http/Controllers/   HomeController, CourseController, EnrollmentController
app/Http/Requests/      StoreCourseRequest, UpdateCourseRequest
app/Models/             Course, Participant, Enrollment
database/migrations/    courses, participants, enrollments
database/seeders/       CourseSeeder, ParticipantSeeder
resources/views/        layouts, partials, home, courses, enrollments
routes/web.php          daftar route
evidence/               bukti praktikum (week-07 sampai week-12)
```

## Belum Dikerjakan

- Pagination dan pencarian
- Update dan delete enrollment dari UI
- Authentication
- Ajax filter

## Catatan

- File `.env` berisi konfigurasi lokal dan tidak ikut di-upload ke repository.
- Prototype PHP biasa (pertemuan 2-6) disimpan terpisah di folder `kursusku-prototype`.
