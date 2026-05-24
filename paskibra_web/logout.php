<?php
// Memulai session
session_start();

// Menghapus semua data session login
session_destroy();

// Melempar kembali user ke halaman utama/login otomatis
header("Location: login.php");
exit();
?>