# Perubahan Class PesananLaundry

Pada tugas ini, saya menggunakan class `PesananLaundry` untuk menggambarkan pesanan pada usaha laundry kiloan. Data pesanan yang digunakan adalah nama pelanggan, berat cucian, harga per kilogram, dan status pengerjaan.

Sebelumnya, data dalam sebuah class bisa saja diubah langsung dari luar class. Hal itu dapat membuat nilai yang disimpan tidak sesuai, misalnya berat cucian diisi nol atau nama pelanggan dibiarkan kosong. Karena itu, pada versi ini semua properti dibuat `private`. Dengan begitu, data tidak bisa diakses secara langsung dari luar class.

Saya menambahkan getter untuk mengambil nilai dan setter untuk mengubah nilai. Setter tidak hanya menyimpan data, tetapi juga memeriksa apakah data tersebut sesuai. Nama pelanggan tidak boleh kosong, berat cucian harus lebih dari nol, dan harga per kilogram juga harus lebih dari nol. Untuk status laundry, program hanya menerima status `Diterima`, `Dicuci`, `Selesai`, atau `Diambil`.

Selain itu, ada method `hitungBiaya()` untuk menghitung total harga berdasarkan berat cucian dikalikan harga per kilogram. Method `tampilkanInfo()` digunakan untuk menampilkan data pesanan agar lebih mudah dibaca.

Pengujian pada file `test.php` mencakup data normal, nama kosong, berat nol, harga negatif, status yang tidak dikenal, serta perubahan status ke `Selesai`. Pengujian ini dibuat untuk memastikan data yang tidak sesuai ditolak dan data yang valid tetap bisa digunakan.

Dari perubahan tersebut, class menjadi lebih terjaga karena aturan data ditangani dari dalam class. Jadi, bagian program lain tidak bisa mengubah data sesuka hati tanpa melewati pemeriksaan yang sudah dibuat.
