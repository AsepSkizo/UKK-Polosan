<?php
session_start();
if (isset($_SESSION["level"])) {
    if ($_SESSION["level"] == "admin") {
        header("Location: admin_index.php");
    } else {
        header("Location: kasir_index.php");
    }
}
function koneksi()
{
    $host = 'localhost';
    $dbname = 'ukk_ahong_test';
    $username = 'root';
    $password = '';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Koneksi gagal";
    }
}

if (isset($_POST["login"])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $conn = koneksi();
    $query = "SELECT * FROM user WHERE username = :username AND password = :password";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        if ($user["level"] == "admin") {
            $_SESSION['level'] = "admin";
            header("Location: admin_index.php");
        } else {
            $_SESSION['level'] = "kasir";
            $_SESSION["user"] = $user["id_user"];
            header("Location: kasir_index.php");
        }
    } else {
        header("Location: login.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form method="post" action="">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" name="login">
    </form>
</body>

</html>