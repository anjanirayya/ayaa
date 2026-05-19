<?php
$host = "localhost";
$user = "2526_17";
$pass = "12345678";
$db   = "2526_17db";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>