<?php

include "cekLevelAdmin.php";
include "koneksi.php";

if (isset($_GET["awal"]) && isset($_GET["akhir"])) {
    $awal = $_GET["awal"];
    $akhir = $_GET["akhir"];
    $query = mysqli_query($koneksi, "SELECT * FROM penjualan WHERE tanggal > '$awal' AND tanggal < '$akhir'");
    $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
    // var_dump($data);
}

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
    <button onclick="return window.print()">Cetak</button>
    <br>
    <form action="">
        <input type="date" name="awal">
        <input type="date" name="akhir">
        <button type="submit">Pilih</button>
    </form>
    <br>
    <table border="1">
        <tr>
            <td>No</td>
            <td>Kode</td>
            <td>Harga</td>
            <td>Bayar</td>
        </tr>
        <?php foreach ($data as $penjualan) : ?>
            <tr>
                <td>1</td>
                <td><?= $penjualan["kode_penjualan"] ?></td>
                <td><?= $penjualan["total_harga"] ?></td>
                <td><?= $penjualan["bayar"] ?></td>
            </tr>
        <?php endforeach ?>
    </table>
</body>

</html>