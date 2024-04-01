<?php
include "cekLevelKasir.php";

include "koneksi.php";

$id = $_GET["id"];
$query = mysqli_query($koneksi, "DELETE FROM pelanggan WHERE id_pelanggan = $id");
if ($query) {
    header("Location: kasir_pelanggan.php");
}
