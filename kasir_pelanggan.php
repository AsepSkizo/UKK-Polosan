<?php
include "cekLevelKasir.php";

include "koneksi.php";
$query = mysqli_query($koneksi, "SELECT * FROM pelanggan");
$data = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <tr>
            <td><a href="kasir_index.php">Home</a></td>
            <td><a href="kasir_barang.php">Stok Barang</a></td>
            <td><a href="kasir_pelanggan.php">Pelanggan</a></td>
            <td><a href="kasir_penjualan.php">Penjualan</a></td>
            <td><a href="logout.php">Logout</a></td>
        </tr>
    </table>
    <br>
    <a href="kasir_pelanggan_tambah.php">Tambah Pelanggan</a>
    <br>
    <table border="1">
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Alamat</td>
            <td>Telp</td>
            <td>Aksi</td>
        </tr>
        <?php foreach ($data as $pelanggan) : ?>
            <tr>
                <td>1</td>
                <td><?= $pelanggan["nama"] ?></td>
                <td><?= $pelanggan["telp"] ?></td>
                <td><?= $pelanggan["alamat"] ?></td>
                <td>
                    <a href="kasir_pelanggan_edit.php?id=<?= $pelanggan["id_pelanggan"] ?>">Edit</a>
                    <a href="kasir_pelanggan_delete.php?id=<?= $pelanggan["id_pelanggan"] ?>" onclick="return confirm('Apakah anda ingin menghapus data?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>