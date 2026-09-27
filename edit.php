<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = (int) $_GET['id'];

$stmt = mysqli_prepare(
    $koneksi,
    "SELECT * FROM barang WHERE id = ?"
);

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

mysqli_stmt_close($stmt);

if (!$data) {
    echo "Data barang tidak ditemukan.";
    exit;
}

if (isset($_POST['update'])) {

    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $kondisi = $_POST['kondisi'];

    $stmt = mysqli_prepare(
        $koneksi,
        "UPDATE barang
         SET kode_barang = ?,
             nama_barang = ?,
             jumlah = ?,
             kondisi = ?
         WHERE id = ?"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "ssisi",
        $kode_barang,
        $nama_barang,
        $jumlah,
        $kondisi,
        $id
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

    <title>Edit Barang</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">

        <h1>Edit Barang</h1>

        <form method="POST">

            <label>Kode Barang</label>
            <input
                type="text"
                name="kode_barang"
                value="<?php echo htmlspecialchars($data['kode_barang'], ENT_QUOTES, 'UTF-8'); ?>"
                required
            >

            <br><br>

            <label>Nama Barang</label>
            <input
                type="text"
                name="nama_barang"
                value="<?php echo htmlspecialchars($data['nama_barang'], ENT_QUOTES, 'UTF-8'); ?>"
                required
            >

            <br><br>

            <label>Jumlah</label>
            <input
                type="number"
                name="jumlah"
                value="<?php echo $data['jumlah']; ?>"
                min="1"
                required
            >

            <br><br>

            <label>Kondisi</label>
            <select name="kondisi" required>

                <option value="Baik"
                    <?php if ($data['kondisi'] == 'Baik') echo 'selected'; ?>>
                    Baik
                </option>

                <option value="Rusak Ringan"
                    <?php if ($data['kondisi'] == 'Rusak Ringan') echo 'selected'; ?>>
                    Rusak Ringan
                </option>

                <option value="Rusak Berat"
                    <?php if ($data['kondisi'] == 'Rusak Berat') echo 'selected'; ?>>
                    Rusak Berat
                </option>

            </select>

            <br><br>

            <button type="submit" name="update">
                Update
            </button>

        </form>

        <a href="index.php" class="btn-kembali">
            Kembali
        </a>

    </div>

</body>

</html>