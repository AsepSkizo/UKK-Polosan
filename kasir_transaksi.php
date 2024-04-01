<?php
include "cekLevelKasir.php";

include "koneksi.php";

$queryPelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan");
$dataPelanggan = mysqli_fetch_all($queryPelanggan, MYSQLI_ASSOC);
$queryBarang = mysqli_query($koneksi, "SELECT * FROM produk");
$dataBarang = mysqli_fetch_all($queryBarang, MYSQLI_ASSOC);

if (isset($_POST["beli"])) {
    foreach ($dataBarang as $barang) {
        $beli = $_POST["" . $barang['id_produk']];
        if ($beli > $barang["stok"]) {
            header("Location: kasir_transaksi.php");
            die;
        }
    }
    $kode = uniqid();
    $total = 0;
    $pelanggan = $_POST["pelanggan"];
    foreach ($dataBarang as $barang) {
        if ($_POST["" . $barang['id_produk']] > 0) {
            $subTotal = $_POST["" . $barang['id_produk']] * $barang["harga"];
            $stokSekarang = $barang["stok"] - $_POST["" . $barang['id_produk']];
            $idProduk = $barang["id_produk"];
            $jumlahBeli = $_POST["" . $barang['id_produk']];
            $queryDetail = mysqli_query($koneksi, "INSERT INTO detail_penjualan VALUES ('','$kode', '$idProduk', '$jumlahBeli', '$subTotal')");
            $queryStok = mysqli_query($koneksi, "UPDATE produk SET stok = $stokSekarang WHERE id_produk = $idProduk");
            $total += $subTotal;
        }
    }
    $tanggal = date("Y-m-d");
    $idUser = $_SESSION["user"];
    $queryTransaksi = mysqli_query($koneksi, "INSERT INTO penjualan VALUES ('','$kode', '$tanggal', '$total', '$idUser','$pelanggan', 0)");

    if ($queryTransaksi) {
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
    <form action="" method="post">
        <label for="">Pelanggan</label>
        <select name="pelanggan" id="">
            <?php foreach ($dataPelanggan as $pelanggan) : ?>
                <option value="<?= $pelanggan["id_pelanggan"] ?>"><?= $pelanggan["nama"] ?></option>
            <?php endforeach ?>
        </select>
        <?php foreach ($dataBarang as $barang) : ?>
            <label for=""><?= $barang["nama"] ?>(<?= $barang["stok"] ?>)</label>
            <input type="number" value="0" name="<?= $barang["id_produk"] ?>">
        <?php endforeach ?>
        <button type="submit" name="beli">Beli</button>
    </form>
</body>

</html>