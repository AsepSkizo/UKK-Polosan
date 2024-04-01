<?php
include "cekLevelKasir.php";

include "koneksi.php";

$query = mysqli_query($koneksi, "SELECT * FROM penjualan as p JOIN pelanggan as pg ON p.id_pelanggan = pg.id_pelanggan");
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
    <a href="kasir_transaksi.php">Tambah Penjualan</a>
    <table border="1">
        <tr>
            <td>No</td>
            <td>Kode</td>
            <td>Harga</td>
            <td>Bayar</td>
            <td>Aksi</td>
        </tr>
        <?php foreach ($data as $penjualan) : ?>
            <tr>
                <td>1</td>
                <td><?= $penjualan["kode_penjualan"] ?></td>
                <td><?= $penjualan["total_harga"] ?></td>
                <td><?= $penjualan["bayar"] ?></td>
                <td>
                    <a href="kasir_penjualan_detail.php?kode=<?= $penjualan['kode_penjualan'] ?>">Detail</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</body>

</html>