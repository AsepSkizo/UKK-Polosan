<?php

include "cekLevelAdmin.php";
include "koneksi.php";
$id = $_GET["id"];
$query = mysqli_query($koneksi, "DELETE FROM produk WHERE id_produk = $id");
if ($query) {
    header("Location: admin_barang.php");
}
