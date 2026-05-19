<?php
session_start(); // INI HARUS ADA DI SINI
$host     = "localhost";
$username = "2526_17"; // Sesuaikan jika Anda memiliki username db yang berbeda
$password = "12345678";     // Kosongkan jika menggunakan XAMPP default
$database = "2526_17db";

// Membuat koneksi
$koneksi = mysqli_connect("localhost", "2526_17", "12345678", "2526_17db");

// Mengecek koneksi
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>