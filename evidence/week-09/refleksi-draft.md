# Refleksi Pertemuan 9 (DRAFT - tulis ulang dengan kalimatmu sendiri)

1. Kenapa master layout lebih baik daripada nyalin navbar ke semua view?
   Navbar, pemanggilan CSS/JS, dan struktur HTML cukup ditulis sekali. Kalau ada perubahan, ubah satu file dan semua halaman ikut berubah.

2. Peran Vite di project Laravel ini?
   Vite memproses dan menyajikan aset frontend (CSS Bootstrap, JS Bootstrap, jQuery) lewat `@vite(...)`, dengan rebuild otomatis saat file disimpan.

3. Fungsi @csrf pada form?
   Menghasilkan hidden input token. Laravel mengecek token ini di request POST untuk memastikan request datang dari form aplikasi yang valid; tanpa itu akan error 419.

4. Apa yang membuktikan availability jalan tanpa reload?
   Teks di field nama tetap ada saat pilihan kursus diubah, dan di tab Network (Fetch/XHR) muncul request GET `/courses/{id}/availability` status 200 dengan response JSON, tanpa request dokumen baru.

5. Persamaan utama jQuery Ajax dan fetch()?
   Keduanya ngirim request di belakang layar, nerima response JSON, lalu memperbarui bagian halaman. Alurnya sama: request -> response -> JSON -> update UI. `success` setara `.then()`, `error` setara `.catch()` plus cek `response.ok`.
