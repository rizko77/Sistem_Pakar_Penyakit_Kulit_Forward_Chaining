# Sistem Pakar Diagnosa Penyakit Kulit

Merupakan alat AI sederhana yang dipakai untuk melakukan diagnosa penyakit kulit pada manusia serta dapat mengambil sebuah keputusan apakah seseorang terkena penyakit tertentu.

## Untuk menggunakan Yang dibutuhkan:

- Xampp (PHP Versi 8.1)
- Visual Studio (Untuk Git clone dan Run spark serve)
- File database "sp_kulit.sql" ada dalam folder "db"

## Catatan:

1. Untuk tampilan ada masalah jadi untuk perbaikan anda harus extract file "Perbarui-Folder-Public.zip" di folder lain di luar folder proyek dan copy folder "public" ke proyek kemudian centang yang replace atau timpa file
2. Untuk Cetak PDF tidak begitu sempurna
3. Gunakan untuk pembelajaran

## Cara Pasang

- Download proyek ini bisa dengan Git Clone bisa dengan download zip file
- Extract file proyeknya
- Jalan kan Xampp (Apache, MySQL)
- Buka localhost/phpmyadmin kemudian buat database dengan nama "sp_kulit" kemudian pada bagian tab import ambil file "sp_kulit.sql" dari folder "db" di proyek terus scroll bawah klik go/kirim
- Pindahin file "Perbarui-Folder-Public.zip" di folder lain diluar folder proyek kemudian extract
- Setelah diextract copy folder "public" ke dalam folder proyek kemudian klik Replace
- Semuanya sudah selesai langsung buka di Visual Studio Code Jalankan terminal ketikan "cd nama_folder_proyek" kemudian ketikan "php spark serve"
- Setelah jalan klik link "localhost:8080"
