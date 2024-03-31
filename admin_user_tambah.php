<?php
include "cekLevelAdmin.php";

include "koneksi.php";
if (isset($_POST["tambah"])) {
    $nama = $_POST["nama"];
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    $level = $_POST["level"];

    $query = mysqli_query($koneksi, "INSERT INTO user VALUES ('','$username','$password','$nama','$level')");
    if ($query) {
        header("Location: admin_user.php");
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
        <label for="">Username</label>
        <input type="text" name="username" id="">
        <label for="">Password</label>
        <input type="password" name="password" id="">
        <label for="">Level</label>
        <select name="level" id="">
            <option value="admin">Admin</option>
            <option value="kasir">Kasir</option>
        </select>
        <button type="submit" name="tambah">Tambah</button>
    </form>
</body>

</html>