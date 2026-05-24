<?php
include 'koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'];

// Hapus data berdasarkan ID dari tabel data_diri
$query = mysqli_query($conn, "DELETE FROM data_diri WHERE id = '$id'");

if ($query) {
    echo "<script>
            alert('Data Berhasil Dihapus!');
            window.location.href='tampil-data.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal Menghapus Data!');
            window.location.href='tampil-data.php';
          </script>";
}
?>