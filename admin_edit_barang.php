<?php
include "cekLevelAdmin.php";

include "koneksi.php";
$id = $_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk = $id");
$data = mysqli_fetch_assoc($query);

if (isset($_POST["edit"])) {
    $nama = $_POST["nama"];
    $stok = $_POST["stok"];
    $harga = $_POST["harga"];

    $query = mysqli_query($koneksi, "UPDATE produk SET nama = '$nama', stok = $stok, harga = $harga WHERE id_produk = $id");
    if ($query) {
        header("Location: admin_barang.php");
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
        <label for="">Kode</label>
        <input type="text" value="<?= $data["kode_produk"] ?>" disabled name="kode">
        <label for="">Nama</label>
        <input type="text" value="<?= $data["nama"] ?>" name="nama">
        <label for="">Stok</label>
        <input type="number" value="<?= $data["stok"] ?>" name="stok">
        <label for="">Harga</label>
        <input type="number" value="<?= $data["harga"] ?>" name="harga">
        <button type="submit" name="edit">Ubah</button>
    </form>
</body>

</html>