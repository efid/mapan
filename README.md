# ASAMURAT - Aplikasi SederhanA Manajemen sURAT


Lihat penjelasannya di blog Nur Akhwan ==> (http://www.nur-akhwan.web.id/2013/10/aplikasi-sederhana-manajemen-surat.html)

Link Demo di http://infosa-media.net/demo/asamurat/


#Deskripsi
Aplikasi ASAMURAT yang merupakan kependekan dari Aplikasi SederhanA Manajemen sURAT. Sesuai dengan kepanjangannya, aplikasi ini digunakan untuk mencatatat data surat masuk dan surat keluar dalam suatu instansi, dengan mudah, cepat dan sederhana. Tidak lagi diperlukan buku agenda surat masuk atau keluar, karena data surat telah tercatat dengan rapi melalui aplikasi ini. Sesuai namanya, fasilitas yang ditawarkan dalam aplikasi ini masih sangat sederhana. 

#Dibuat dengan :
1. Codeigniter versi 2.1.0
2. jQuery
3. Twitter Bootstrap versi 2
4. jQuery datepicker (untuk mengambil data tanggal)

#Versi 1.0 (September 2013)
1. Referensi kode surat sesuai dengan SOP persuratan Kementerian Agama (Peraturan Menteri Agama Nomor 44 Tahun 2010)
2. Input surat masuk
3. Input disposisi surat masuk
4. Input surat keluar
5. Cetak surat agenda surat masuk per tanggal tertentu
6. Cetak surat agenda surat keluar per tanggal tertentu
7. Cetak disposisi surat masuk
8. Rubah password Admin
9. Terdiri dari 2 level user, admin (bisa edit referensi kode surat dan menambah admin), dan user biasa (input surat)
10. Akses edit dan hapus data surat hanya bisa dilakukan oleh user yang menginput surat tersebut.

#Versi 1.1 (Mei 2015)
1. Bisa dijalankan tanpa menggunakan file .httaccess
2. Perbaikan di pagination data
3. Perbaikan di icon-icon setiap tombol
4. Bisa digunakan di web server manapun tanpa harus setting disabled/enable php.ini

#Versi 2.0 (Nop 2017)
Pengembangan dilakukan guna memenuhi tugas dan menyeseuaikan dengan sistem persuratan di KPPN
1. Update bootstrap 3.3
2. Dashboard, meliputi :
- Jumlah surat masuk
- jumlah surat keluar
- jumlah surat belum proses

- Grafik (morris donut) Ketepatan waktu penyelesaian surat masuk per seksi(bagian)

- Grafik (morris line) jumlah surat masuk
- Grafik (morris line) jumlah surat keluar

- Grafik (morris bar) jumlah surat masuk per bulan - seksi
- Grafik (morris bar) jumlah surat keluar per bulan - seksi

3. Email notifikasi kepada KK, Kasi, dan Pegawai ketika ada surat masuk.(phpMailer)
- Email ke KK ketika surat masuk direkam di bag umum
- Email ke Kasi yang ditunjuk/ disposisi oleh KK
- Email ke Pelaksana ketika ada disposisi oleh Kasi


4. Disposisi sampai dengan Pelaksana
KK -> kasi -> Pelaksana

5. Pengelompokan dan penambahan role user
- Super Admin
	>Referensi
	>manajemen User
	>Pegawai (RUH)
- Umum
	> Surat masuk(RUH+upload)
	> Surat Keluar (Upload File)
- KK
	> Surat masuk(Disposisi)
	> Surat Keluar (Read)
	> Pegawai (Read)
- Kasi
	> Surat masuk(Disposisi)
	> Surat Keluar (Read)
	> Pegawai (Read)
- Pelaksana 
	> Surat masuk(Penyelesaian)
	> Surat Keluar (RUH)
	> Pegawai (Read)


