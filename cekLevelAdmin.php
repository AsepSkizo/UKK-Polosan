<?php
session_start();
if (!isset($_SESSION["level"]) || $_SESSION["level"] != "admin") {
    header("Location: login.php");
    die;
}
