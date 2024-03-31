<?php
session_start();
if (!isset($_SESSION["level"]) || $_SESSION["level"] !== "kasir") {
    header("Location: login.php");
    die;
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
    <h1>Selamat Datang Sebagai Kasir</h1>
</body>

</html>