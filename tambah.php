<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {

    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $kondisi = $_POST['kondisi'];

    $stmt = mysqli_prepare(
        $koneksi,
        "INSERT INTO barang (kode_barang, nama_barang, jumlah, kondisi)
         VALUES (?, ?, ?, ?)"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "ssis",
        $kode_barang,
        $nama_barang,
        $jumlah,
        $kondisi
    );

    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">

        <h1>Tambah Barang</h1>

        <form method="POST">

            <label>Kode Barang</label>
            <input type="text" name="kode_barang" required>

            <br><br>

            <label>Nama Barang</label>
            <input type="text" name="nama_barang" required>

            <br><br>

            <label>Jumlah</label>
            <input type="number" name="jumlah" min="1" required>

            <br><br>

            <label>Kondisi</label>
            <select name="kondisi" required>
                <option value="">-- Pilih Kondisi --</option>
                <option value="Baik">Baik</option>
                <option value="Rusak Ringan">Rusak Ringan</option>
                <option value="Rusak Berat">Rusak Berat</option>
            </select>

            <br><br>

            <button type="submit" name="simpan">
                Simpan
            </button>

        </form>

        <a href="index.php" class="btn-kembali">
            Kembali
        </a>

    </div>

</body>
</html>