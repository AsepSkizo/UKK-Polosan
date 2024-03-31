<?php
include "cekLevelAdmin.php";
include "koneksi.php";

$id = $_GET["id"];
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = $id");
$data = mysqli_fetch_assoc($query);

if (isset($_POST["edit"])) {
    $nama = $_POST["nama"];
    $level = $_POST["level"];
    $query = mysqli_query($koneksi, "UPDATE user SET nama = '$nama', level = '$level' WHERE id_user = $id");

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
        <input value="<?= $data["nama"] ?>" type="text" name="nama" id="">
        <label for="">Username</label>
        <input value="<?= $data["username"] ?>" disabled type="text" name="username" id="">
        <label for="">Level</label>
        <select name="level" id="level">
            <option value="admin">Admin</option>
            <option value="kasir">Kasir</option>
        </select>
        <button type="submit" name="edit">Edit</button>
    </form>

    <script>
        document.getElementById("level").value = '<?= $data["level"]; ?>'
    </script>
</body>

</html>