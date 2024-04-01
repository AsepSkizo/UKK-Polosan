<?php
include "cekLevelKasir.php";

include "koneksi.php";
$kode = $_GET["kode"];
$queryPenjualan = mysqli_query($koneksi, "SELECT * FROM penjualan as p JOIN pelanggan as pg ON p.id_pelanggan = pg.id_pelanggan WHERE p.kode_penjualan = '$kode'");
$dataPenjualan = mysqli_fetch_assoc($queryPenjualan);

// var_dump($dataPenjualan["nama"]);

$queryDetail = mysqli_query($koneksi, "SELECT * FROM detail_penjualan as dp JOIN produk as p ON dp.id_produk = p.id_produk WHERE dp.kode_penjualan = '$kode'");
$dataDetail = mysqli_fetch_all($queryDetail, MYSQLI_ASSOC);

if (isset($_POST["bayarbtn"])) {
    $bayar = $_POST["bayar"];
    if ($bayar < $dataPenjualan["total_harga"]) {
        header("Location: kasir_penjualan.php");
        die;
    }
    $queryUpdate = mysqli_query($koneksi, "UPDATE penjualan SET bayar = $bayar WHERE kode_penjualan = '$kode'");
    if ($queryUpdate) {
        header("Location: kasir_penjualan.php");
    }
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
            <td><a href="kasir_index.php">Home</a></td>
            <td><a href="kasir_barang.php">Stok Barang</a></td>
            <td><a href="kasir_pelanggan.php">Pelanggan</a></td>
            <td><a href="kasir_penjualan.php">Penjualan</a></td>
            <td><a href="logout.php">Logout</a></td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <td>Nama Pelanggan : <?= $dataPenjualan["nama"] ?></td>
        </tr>
        <tr>
            <td>Barang : </td>
            <?php foreach ($dataDetail as $detail) : ?>
                <td><?= $detail["nama"] ?>(<?= $detail["jumlah"] ?>)</td>
            <?php endforeach ?>
        </tr>
        <tr>
            <td>Total Harga = <?= $dataPenjualan["total_harga"] ?></td>
        </tr>
        <?php if ($dataPenjualan["bayar"] == 0) :  ?>
            <form action="" method="post">
                <tr>
                    <td>Bayar</td>
                    <td><input type="number" name="bayar" id=""></td>
                    <input type="hidden" name="kode" value="<?= $kode ?>">
                    <td><button type="submit" name="bayarbtn">Bayar</button></td>
                </tr>
            </form>
        <?php endif ?>
    </table>
</body>

</html>