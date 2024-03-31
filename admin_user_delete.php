<?php
include "cekLevelAdmin.php";

include "koneksi.php";

$id = $_GET["id"];
$query = mysqli_query($koneksi, "DELETE FROM user WHERE id_user = $id");

if ($query) {
    header("Location: admin_user.php");
}
