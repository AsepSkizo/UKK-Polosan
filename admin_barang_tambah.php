<?php
include "cekLevelAdmin.php";

include "koneksi.php";
if (isset($_POST["tambah"])) {
    $kode_Produk = $_POST["kode"];
    $nama = $_POST["nama"];
    $stok = $_POST["stok"];
    $harga = $_POST["harga"];

    $query = mysqli_query($koneksi, "INSERT INTO produk VALUES ('','$kode_Produk','$nama', '$stok', '$harga')");
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
        <input type="text" name="kode" placeholder="">
        <label for="">Nama</label>
        <input type="text" name="nama">
        <label for="">Stok</label>
        <input type="number" name="stok">
        <label for="">Harga</label>
        <input type="number" name="harga">
        <button type="submit" name="tambah">Tambah</button>
    </form>
</body>

</html>