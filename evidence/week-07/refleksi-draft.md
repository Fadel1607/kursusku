# Refleksi Pertemuan 7 (DRAFT - tulis ulang dengan kalimatmu sendiri)

Panduan minta 5-8 kalimat, pakai kata-kata sendiri. Draft ini cuma kerangka.

1. Perbedaan prototype PHP biasa vs Laravel:
   Di prototype, logika, data, dan HTML bercampur di satu file seperti index.php.
   Di Laravel, route nentuin URL, controller nyiapin data, dan Blade nampilin HTML,
   jadi tiap bagian punya tempat sendiri.

2. Bagian paling mudah / paling membingungkan: (isi dari pengalamanmu)

3. Satu error yang ditemui dan cara membuktikan penyebabnya: (isi dari pengalamanmu)

---

# Code Defense (jawaban singkat buat latihan, hafalkan alurnya, jangan dicopy mentah)

1. Route nerima URL dan nentuin tujuan, controller nyiapin data dan milih view, view (Blade) bikin HTML.
2. Route `/` dikasih nama `home` supaya bisa dipanggil lewat `route('home')` tanpa nulis URL manual; kalau URL berubah, nama tetap.
3. `HomeController@index` bikin `$siteName` dan `$featured`, lalu return view `home` dengan data itu.
4. Array ditaruh di controller supaya data terpisah dari tampilan; Blade cukup loop dengan `@foreach`.
5. `compact('siteName','featured')` bikin array `['siteName'=>..., 'featured'=>...]` untuk dikirim ke view.
6. `{{ }}` nampilin nilai dengan escaping HTML, `@foreach` ngulang array; ini sintaks Blade yang dikompilasi jadi PHP biasa.
7. Gambar di `public/images` karena hanya folder `public` yang bisa diakses langsung browser.
8. `asset()` bikin URL aset berdasarkan lokasi publik aplikasi, jadi nggak perlu path lokal Windows.
9. Kalau `home.blade.php` dihapus: error `View [home] not found`.
10. Kalau route nunjuk ke method yang nggak ada: error `BadMethodCallException` (method does not exist).
