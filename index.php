<?php
include 'koneksi.php';

$query = mysqli_query($koneksi, "SELECT * FROM barang");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris Barang Laboratorium</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">

        <h1>Inventaris Barang Laboratorium</h1>

        <a href="tambah.php" class="btn-tambah">
            + Tambah Barang
        </a>

        <table>
            <tr>
                <th>ID</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Kondisi</th>
                <th>Aksi</th>
            </tr>

            <?php while ($data = mysqli_fetch_assoc($query)) { ?>

            <tr>
              <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo htmlspecialchars($data['kode_barang']); ?></td>
                <td><?php echo htmlspecialchars($data['nama_barang']); ?></td>
                <td><?php echo $data['jumlah']; ?></td>
                <td><?php echo htmlspecialchars($data['kondisi']); ?></td>
                <td>
                    <a
                        href="edit.php?id=<?php echo $data['id']; ?>"
                        class="btn-edit"
                    >
                        Edit
                    </a>

                    <button
                        type="button"
                        class="btn-hapus"
                        onclick="bukaModalHapus(<?php echo $data['id']; ?>)"
                    >
                        Hapus
                    </button>
                </td>
            </tr>

            <?php } ?>

        </table>
        <dialog id="modalHapus" class="modal-hapus">

            <h2>Hapus Barang?</h2>

            <p>
                Apakah kamu yakin ingin menghapus data barang ini?
                Data yang sudah dihapus tidak dapat dikembalikan.
            </p>

            <div class="modal-aksi">

                <button
                    type="button"
                    class="btn-batal"
                    onclick="tutupModalHapus()"
                >
                    Batal
                </button>

                <a
                    href="#"
                    id="linkHapus"
                    class="btn-konfirmasi-hapus"
                >
                    Hapus
                </a>

            </div>

        </dialog>

        <script>
            const modalHapus = document.getElementById('modalHapus');
            const linkHapus = document.getElementById('linkHapus');

            function bukaModalHapus(id) {
                linkHapus.href = 'hapus.php?id=' + id;
                modalHapus.showModal();
            }

            function tutupModalHapus() {
                modalHapus.close();
            }
        </script>

    </div>

</body>
</html>