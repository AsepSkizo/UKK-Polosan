<?php
include "cekLevelAdmin.php";

include "koneksi.php";
$query = mysqli_query($koneksi, "SELECT * FROM user");
$data = mysqli_fetch_all($query, MYSQLI_ASSOC);
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
            <td><a href="admin_index.php">Home</a></td>
            <td><a href="admin_barang.php">Stok Barang</a></td>
            <td><a href="admin_user.php">User</a></td>
            <td><a href="admin_laporan_stok.php">Laporan Stok</a></td>
            <td><a href="admin_laporan_penjualan.php">Laporan Penjualan</a></td>
            <td><a href="logout.php">Logout</a></td>
        </tr>
    </table>
    <br>
    <a href="admin_user_tambah.php">Tambah User</a>
    <br>
    <table border="1">
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Username</td>
            <td>Level</td>
            <td>Aksi</td>
        </tr>
        <?php foreach ($data as $user) : ?>
            <tr>
                <td>1</td>
                <td><?= $user["nama"] ?></td>
                <td><?= $user["username"] ?></td>
                <td><?= $user["level"] ?></td>
                <td>
                    <a href="admin_user_edit.php?id=<?= $user['id_user'] ?>">Edit</a>
                    <a href="admin_user_delete.php?id=<?= $user['id_user'] ?>" onclick="return confirm('Apakah Anda Ingin Menghapus User?')">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</body>

</html>