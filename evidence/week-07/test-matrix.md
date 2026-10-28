# Test Matrix Week 07

Isi kolom Status (PASS / FAIL) HANYA setelah benar-benar dicoba.

| No | Skenario uji | Hasil yang diharapkan | Status |
|----|--------------|-----------------------|--------|
| 1 | Buka halaman `/` | Landing page KursusKu tampil tanpa error | |
| 2 | Jalankan `php artisan route:list` | Route bernama `home` terlihat | |
| 3 | Ubah nama course pada controller | Nama baru muncul di Blade setelah refresh | |
| 4 | Tambah satu course ke array | Card bertambah tanpa menyalin HTML card | |
| 5 | Buka gambar hero | Gambar tampil dan tidak 404 | |
| 6 | Kecilkan browser ke lebar mobile | Hero dan course grid menjadi satu kolom | |
| 7 | Buka URL yang tidak ada, mis. `/abc` | Laravel menampilkan 404, bukan halaman home | |
| 8 | Jalankan ulang project dari README | Project dapat dijalankan dengan langkah yang ditulis | |
