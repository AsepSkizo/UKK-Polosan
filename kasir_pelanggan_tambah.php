<?php
include "cekLevelKasir.php";

include "koneksi.php";

if (isset($_POST["tambah"])) {
    $nama = $_POST["nama"];
    $telp = $_POST["telp"];
    $alamat = $_POST["alamat"];
    $query = mysqli_query($koneksi, "INSERT INTO pelanggan VALUES ('','$nama','$alamat','$telp')");
    if ($query) {
        header("Location: kasir_pelanggan.php");
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
        <label for="">Nama</label>
        <input type="text" name="nama" id="">
        <label for="">Alamat</label>
        <input type="text" name="alamat" id="">
        <label for="">Telp</label>
        <input type="text" name="telp" id="">
        <button type="submit" name="tambah">Tambah</button>
    </form>
</body>

</html>