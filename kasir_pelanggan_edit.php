<?php
include "cekLevelKasir.php";

include "koneksi.php";

$id = $_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan = '$id'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST["edit"])) {
    $nama = $_POST["nama"];
    $telp = $_POST["telp"];
    $alamat = $_POST["alamat"];
    $query = mysqli_query($koneksi, "UPDATE pelanggan SET nama = '$nama', telp = '$telp', alamat = '$alamat' WHERE id_pelanggan = $id");
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
        <input type="text" value="<?= $data["nama"] ?>" name="nama" id="">
        <label for="">Alamat</label>
        <input type="text" value="<?= $data["alamat"] ?>" name="alamat" id="">
        <label for="">Telp</label>
        <input type="text" value="<?= $data["telp"] ?>" name="telp" id="">
        <button type="submit" name="edit">Edit</button>
    </form>
</body>

</html>