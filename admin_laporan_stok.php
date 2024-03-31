<?php
include "cekLevelAdmin.php";

include "koneksi.php";
$query = "SELECT * FROM produk";
$jalankan = mysqli_query($koneksi, $query);
$data = mysqli_fetch_all($jalankan, MYSQLI_ASSOC);
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
            <td><a href="admin_index.php">Home</a></td>
            <td><a href="admin_barang.php">Stok Barang</a></td>
            <td><a href="admin_user.php">User</a></td>
            <td><a href="admin_laporan_stok.php">Laporan Stok</a></td>
            <td><a href="admin_laporan_penjualan.php">Laporan Penjualan</a></td>
            <td><a href="logout.php">Logout</a></td>
        </tr>
    </table>
    <br>

    <br>
    <table border="1">
        <tr>
            <td>No</td>
            <td>Kode</td>
            <td>Nama</td>
            <td>Stok</td>
            <td>Harga</td>

        </tr>
        <?php foreach ($data as $produk) : ?>
            <tr>
                <td>1</td>
                <td><?= $produk["kode_produk"] ?></td>
                <td><?= $produk["nama"] ?></td>
                <td><?= $produk["stok"] ?></td>
                <td><?= $produk["harga"] ?></td>

            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>