No	Skenario	Input utama	Hasil yang diharapkan	Hasil aktual	Status
1	Simpan data valid	WEB-101, Web Dasar, 300000, 25, tanggal besok, open	Data tersimpan, redirect ke daftar, muncul pesan sukses	Pindah ke /courses, muncul “Kursus berhasil ditambahkan.”, WEB-101 tampil di tabel dan tersimpan di MySQL	
2	Kode kosong	code kosong	Validasi gagal, data tidak tersimpan	Muncul pesan “The code field is required.”, data tidak masuk database	
3	Kode duplikat	WEB-101 kedua kali	Ditolak oleh rule unique	Muncul pesan “The code has already been taken.”, jumlah data tidak bertambah	
4	Nama kosong	name kosong	Validasi gagal	Muncul pesan “The name field is required.”, data tidak tersimpan	
5	Biaya negatif	fee = -1000	Ditolak karena min:0	Muncul pesan “The fee field must be at least 0.”, data tidak tersimpan	
6	Kuota 0	quota = 0	Ditolak karena min:1	Muncul pesan “The quota field must be at least 1.”, data tidak tersimpan	
7	Status tidak valid	status diubah manual menjadi active	Ditolak karena hanya draft/open/closed	Muncul pesan “The selected status is invalid.”, data tidak tersimpan	
8	Daftar tampil ulang	Reload /courses	Data tetap ada karena berasal dari MySQL	Setelah Ctrl + F5, semua data kursus tetap tampil