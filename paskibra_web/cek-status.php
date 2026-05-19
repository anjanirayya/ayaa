<?php
session_start();
include 'koneksi.php';

// Jika belum login tapi maksa buka halaman ini, balikin ke login
if (!isset($_SESSION['nama_anggota'])) {
    header("location:login.php");
    exit();
}

$nama_sekarang = $_SESSION['nama_anggota'];

// Cek ke database apakah nama ini sudah ada di tabel anggota
$cek = mysqli_query($conn, "SELECT * FROM data_diri WHERE nama = '$nama_sekarang'");

if (mysqli_num_rows($cek) > 0) {
    // Kalau namanya sudah ada, langsung suruh lihat data (nggak usah ngisi lagi)
    header("location:tampil-data.php");
} else {
    // Kalau namanya belum ada, suruh isi data diri dulu
    header("location:input-data.php");
}
?>