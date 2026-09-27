# Inventaris Barang Laboratorium

Aplikasi Inventaris Barang Laboratorium merupakan aplikasi berbasis web yang saya buat untuk membantu mengelola data barang yang terdapat pada laboratorium. Aplikasi ini memungkinkan pengguna untuk melihat data barang, menambahkan barang baru, mengubah data barang, dan menghapus data barang.

Project ini dibuat menggunakan PHP dan MySQL dengan menerapkan konsep CRUD (Create, Read, Update, Delete). Data inventaris disimpan di dalam database MySQL dan proses pengelolaan data dilakukan melalui aplikasi.

## 1. Tujuan Project

Project ini dibuat sebagai implementasi materi pemrograman web, khususnya dalam penerapan:

- Koneksi aplikasi PHP dengan database MySQL
- Pengelolaan data menggunakan database
- Konsep CRUD (Create, Read, Update, Delete)
- Penggunaan form untuk memasukkan dan mengubah data
- Penggunaan PHP untuk mengambil dan mengolah data dari database
- Pembuatan antarmuka sederhana menggunakan HTML dan CSS

Melalui aplikasi ini, proses pengelolaan data inventaris dapat dilakukan melalui halaman web tanpa harus memasukkan atau mengubah data secara langsung melalui database.

## 2. Gambaran Aplikasi

Aplikasi ini digunakan untuk mengelola data barang laboratorium. Pada halaman utama, pengguna dapat melihat seluruh barang yang telah tersimpan di dalam database.

Setiap data barang memiliki informasi:

- ID
- Kode Barang
- Nama Barang
- Jumlah
- Kondisi

Pengguna dapat melakukan beberapa tindakan terhadap data yang tersedia, yaitu menambahkan data baru, mengubah data melalui tombol **Edit**, dan menghapus data melalui tombol **Hapus**.

Pada proses penghapusan, aplikasi menyediakan konfirmasi terlebih dahulu agar pengguna dapat memastikan kembali sebelum data benar-benar dihapus.

## 3. Fitur Aplikasi

### 3.1 Menampilkan Data Barang

Fitur ini digunakan untuk menampilkan seluruh data barang yang tersimpan di dalam database.

Data yang ditampilkan meliputi:

| Data | Keterangan |
|---|---|
| ID | Nomor identitas unik barang |
| Kode Barang | Kode identifikasi barang |
| Nama Barang | Nama barang laboratorium |
| Jumlah | Jumlah barang yang tersedia |
| Kondisi | Kondisi barang |

### 3.2 Menambahkan Data Barang

Fitur ini digunakan untuk memasukkan barang baru ke dalam sistem.

Pengguna perlu mengisi:

- Kode Barang
- Nama Barang
- Jumlah
- Kondisi

Setelah data diisi, pengguna dapat menekan tombol **Simpan** dan data akan disimpan ke database.

### 3.3 Mengubah Data Barang

Fitur **Edit** digunakan ketika terdapat data barang yang perlu diperbaiki atau diperbarui.

Data barang akan ditampilkan kembali pada form edit sehingga pengguna dapat mengubah informasi yang diperlukan. Setelah tombol **Update** ditekan, perubahan akan disimpan ke database.

### 3.4 Menghapus Data Barang

Fitur **Hapus** digunakan untuk menghapus data barang yang sudah tidak diperlukan.

Sebelum data dihapus, aplikasi menampilkan pop-up konfirmasi.

Pengguna dapat memilih **Batal** jika tidak ingin menghapus data atau memilih **Hapus** untuk melanjutkan proses penghapusan.

### 3.5 Validasi Form

Beberapa input pada form menggunakan validasi dasar HTML seperti `required` sehingga pengguna harus mengisi data sebelum form dapat dikirim.

Pada input jumlah digunakan tipe input angka dan nilai minimal 1 sehingga jumlah barang yang dimasukkan harus berupa angka positif.


## 4. Konsep CRUD

Data yang dimasukkan melalui form akan dikirim ke PHP dan kemudian disimpan ke tabel `barang` pada database.

### Read

Read digunakan untuk mengambil dan menampilkan data barang dari database.

Implementasinya terdapat pada:

```text
index.php
```

Halaman utama mengambil data dari tabel `barang` kemudian menampilkannya dalam bentuk tabel.

### Update

Update digunakan untuk mengubah data barang yang sudah tersimpan.

Implementasinya terdapat pada:

```text
edit.php
```

Data barang dicari berdasarkan ID, kemudian pengguna dapat mengubah informasi barang melalui form.

### Delete

Delete digunakan untuk menghapus data barang dari database.

Implementasinya terdapat pada:

```text
hapus.php
```

Sebelum proses delete dilakukan, pengguna terlebih dahulu mendapatkan konfirmasi melalui pop-up pada halaman utama.

## 5. Data yang Digunakan

Data yang digunakan dalam aplikasi merupakan data inventaris barang laboratorium.

Struktur data barang terdiri dari:

| Field | Tipe Data | Keterangan |
|---|---|---|
| `id` | INT | ID unik setiap barang |
| `kode_barang` | VARCHAR(20) | Kode identifikasi barang |
| `nama_barang` | VARCHAR(100) | Nama barang |
| `jumlah` | INT | Jumlah barang |
| `kondisi` | VARCHAR(30) | Kondisi barang |

Untuk bagian kondisi, aplikasi menyediakan pilihan:

- Baik
- Rusak Ringan
- Rusak Berat

Data barang dimasukkan dan dikelola melalui aplikasi, sedangkan database digunakan sebagai tempat penyimpanan data.

## 6. Database

Database yang digunakan dalam project ini bernama:

```text
db_inventaris
```

Di dalam database tersebut terdapat tabel:

```text
barang
```

Struktur tabel `barang` yang digunakan adalah:

```sql
CREATE TABLE barang (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kode_barang VARCHAR(20) NOT NULL,
    nama_barang VARCHAR(100) NOT NULL,
    jumlah INT NOT NULL,
    kondisi VARCHAR(30) NOT NULL
);
```

Database dibuat dan diperiksa menggunakan MySQL Workbench. Setelah database dan tabel tersedia, proses memasukkan, menampilkan, mengubah, dan menghapus data dilakukan melalui aplikasi PHP.

## 7. Teknologi dan Tools

Project ini dibuat menggunakan beberapa teknologi dan tools berikut:

- **PHP** sebagai bahasa pemrograman untuk proses aplikasi dan pengelolaan data.
- **MySQL** sebagai database untuk menyimpan data inventaris.
- **HTML** untuk membuat struktur halaman aplikasi.
- **CSS** untuk mengatur tampilan aplikasi.
- **Laragon** sebagai local development environment untuk menjalankan Apache dan MySQL.
- **MySQL Workbench** untuk membuat dan memeriksa database.
- **Visual Studio Code** sebagai code editor.
- **Git** sebagai version control.
- **GitHub** sebagai repository untuk menyimpan source code project.

## 8. Struktur Project

Struktur file pada project ini adalah:

```text
Inventaris/
│
├── index.php
├── tambah.php
├── edit.php
├── hapus.php
├── koneksi.php
├── style.css
└── README.md
```

### Penjelasan File

#### `index.php`

Merupakan halaman utama aplikasi.

File ini digunakan untuk:

- Mengambil data barang dari database
- Menampilkan data barang
- Menyediakan tombol tambah barang
- Menyediakan tombol edit
- Menyediakan tombol hapus
- Menampilkan pop-up konfirmasi penghapusan

#### `tambah.php`

Digunakan untuk menampilkan form penambahan barang dan menyimpan data baru ke database.

#### `edit.php`

Digunakan untuk mengambil data berdasarkan ID dan memperbarui data barang yang sudah tersimpan.

#### `hapus.php`

Digunakan untuk menghapus data barang berdasarkan ID setelah pengguna melakukan konfirmasi penghapusan.

#### `koneksi.php`

Digunakan untuk membuat koneksi antara aplikasi PHP dengan database MySQL.

#### `style.css`

Digunakan untuk mengatur tampilan aplikasi, seperti warna, ukuran, tabel, form, tombol, dan layout halaman.

#### `README.md`

Berisi dokumentasi project, mulai dari gambaran aplikasi, fitur, struktur data, teknologi yang digunakan, hingga cara menjalankan dan mengoperasikan aplikasi.

## 9. Cara Menjalankan Aplikasi

Project ini dijalankan menggunakan Laragon sebagai local development environment.

### 9.1 Menjalankan Laragon

Buka aplikasi Laragon dan pastikan:

```text
Apache → Running
MySQL  → Running
```

### 9.2 Menempatkan Project

Folder project ditempatkan di dalam folder:

```text
C:\laragon\www\TUGAS KELAS\Inventaris
```

### 9.3 Menyiapkan Database

Buka MySQL Workbench dan buat database dengan nama:

```text
db_inventaris
```

Kemudian buat tabel `barang` menggunakan struktur berikut:

```sql
CREATE DATABASE db_inventaris;

USE db_inventaris;

CREATE TABLE barang (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kode_barang VARCHAR(20) NOT NULL,
    nama_barang VARCHAR(100) NOT NULL,
    jumlah INT NOT NULL,
    kondisi VARCHAR(30) NOT NULL
);
```

### 9.4 Memeriksa Koneksi Database

Konfigurasi koneksi database terdapat pada file:

```text
koneksi.php
```

Konfigurasi yang digunakan pada project:

```text
Host     : localhost
Username : root
Password : kosong
Database : db_inventaris
```

Konfigurasi tersebut disesuaikan dengan environment Laragon yang digunakan.

### 9.5 Membuka Aplikasi

Setelah Apache dan MySQL berjalan, buka browser dan akses:

```text
http://localhost/TUGAS%20KELAS/Inventaris/
```

Halaman utama aplikasi akan menampilkan data inventaris yang tersimpan di database.

## 10. Cara Pengoperasian Aplikasi

### 10.1 Melihat Data Barang

1. Buka halaman utama aplikasi.
2. Sistem akan mengambil data dari database.
3. Data barang akan ditampilkan dalam bentuk tabel.
4. Pengguna dapat melihat ID, kode barang, nama barang, jumlah, dan kondisi barang.

### 10.2 Menambahkan Barang

1. Pada halaman utama, klik tombol **+ Tambah Barang**.
2. Form tambah barang akan terbuka.
3. Masukkan **Kode Barang**.
4. Masukkan **Nama Barang**.
5. Masukkan **Jumlah** barang.
6. Pilih **Kondisi** barang.
7. Klik tombol **Simpan**.
8. Sistem akan menyimpan data ke database.
9. Pengguna akan diarahkan kembali ke halaman utama.
10. Data barang yang baru ditambahkan akan muncul pada tabel.

### 10.3 Mengubah Data Barang

1. Cari barang yang ingin diubah pada tabel.
2. Klik tombol **Edit**.
3. Form edit akan menampilkan data barang yang dipilih.
4. Ubah informasi yang diperlukan.
5. Klik tombol **Update**.
6. Sistem akan memperbarui data pada database.
7. Pengguna akan diarahkan kembali ke halaman utama.
8. Data yang telah diperbarui akan ditampilkan pada tabel.

### 10.4 Menghapus Data Barang

1. Cari barang yang ingin dihapus pada tabel.
2. Klik tombol **Hapus**.
3. Sistem akan menampilkan pop-up konfirmasi.
4. Jika ingin membatalkan penghapusan, klik **Batal**.
5. Jika ingin melanjutkan penghapusan, klik **Hapus** pada pop-up.
6. Sistem akan menghapus data berdasarkan ID barang.
7. Pengguna akan diarahkan kembali ke halaman utama.
8. Data yang dihapus tidak lagi ditampilkan pada tabel.

## 11. Pengujian

Pengujian dilakukan untuk memastikan setiap fungsi utama pada aplikasi dapat berjalan sesuai dengan kebutuhan.

| No. | Fitur | Pengujian | Hasil |
|---|---|---|---|
| 1 | Read | Memastikan data barang dapat ditampilkan | Berhasil |
| 2 | Create | Menambahkan data barang baru melalui form | Berhasil |
| 3 | Update | Mengubah data barang yang sudah tersimpan | Berhasil |
| 4 | Delete | Menghapus data barang | Berhasil |
| 5 | Konfirmasi Delete | Memastikan pop-up konfirmasi muncul sebelum penghapusan | Berhasil |

Berdasarkan pengujian yang dilakukan, fungsi utama CRUD pada aplikasi dapat digunakan sesuai dengan kebutuhan project.

## 12. Keamanan dan Pengelolaan Data

Pada proses penyimpanan, perubahan, dan penghapusan data, aplikasi menggunakan prepared statement untuk menjalankan query yang menerima data dari form.

Prepared statement digunakan pada proses:

- Insert data
- Update data
- Delete data
- Mengambil data berdasarkan ID

Data yang ditampilkan kembali pada halaman juga diproses menggunakan `htmlspecialchars()` agar karakter khusus pada data tidak langsung dianggap sebagai kode HTML.

Koneksi database menggunakan `utf8mb4` untuk mendukung penyimpanan karakter dengan baik.

## 13. Version Control

Project ini menggunakan Git sebagai version control dan GitHub sebagai repository project.

Git digunakan untuk mencatat versi perubahan source code selama proses pengembangan.

Commit awal project dibuat dengan pesan:

```text
Initial commit
```

Repository GitHub digunakan sebagai tempat penyimpanan source code agar project dapat didokumentasikan dan diakses kembali.

## 14. Kesimpulan

Aplikasi Inventaris Barang Laboratorium ini dibuat untuk menerapkan konsep dasar pemrograman web dan pengelolaan database menggunakan PHP dan MySQL.

Melalui aplikasi ini, proses **Create, Read, Update, dan Delete (CRUD)** dapat dilakukan melalui antarmuka web. Data barang disimpan dalam database MySQL dan dapat dikelola melalui fitur yang tersedia pada aplikasi.

Project ini juga menjadi penerapan sederhana mengenai bagaimana aplikasi web dapat digunakan sebagai perantara antara pengguna dengan database dalam proses pengelolaan data inventaris.
