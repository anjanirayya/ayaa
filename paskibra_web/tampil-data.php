<?php
session_start();
include 'koneksi.php';

// Kunci halaman: Kalau belum login, lempar balik ke login.php
if (!isset($_SESSION['nama_anggota'])) {
    header("location:login.php");
    exit();
}
?> <!DOCTYPE html>
<html>
<head>
<title>Data Anggota Paskibra</title>
<style>
body { font-family: sans-serif; background: #121212; color: #fff; padding:
40px; }
.box { max-width: 800px; margin: auto; background: #1e1e1e; padding: 30px;
border-radius: 10px; border-top: 5px solid #b22222; }
h2 { text-align: center; color: #ff4d4d; text-transform: uppercase; }
table { width: 100%; border-collapse: collapse; margin-top: 20px; }
th, td { padding: 12px; border: 1px solid #333; text-align: left; }
th { background: #b22222; color: #fff; }
tr:nth-child(even) { background: #252525; }
.btn { display: inline-block; padding: 10px 20px; background: #ff4d4d;
color: #fff; text-decoration: none; border-radius: 5px; margin-top: 20px; }
</style>
</head>
<body>
<div class="box">
<h2>Daftar Anggota Paskibra</h2>
<table>
<tr>
<th>No</th><th>Nama</th><th>NIS</th><th>Kelas</th><th>Jabatan</th>
</tr>
<?php
$no = 1;
$q = mysqli_query($conn, "SELECT * FROM data_diri");
while($d = mysqli_fetch_array($q)){
?>
<tr>
<td><?php echo $no++; ?></td>
<td><?php echo $d['nama']; ?></td>
<td><?php echo $d['nis']; ?></td>
<td><?php echo $d['kelas']; ?></td>
<td><?php echo $d['jabatan']; ?></td>
</tr>
<?php } ?>
</table>
<div class="btn-group" style="text-align: center; margin-top: 20px;">
    <a href="input-data.php" class="btn btn-add" style="display: inline-block; padding: 10px 20px; background-color: #ff4d4d; color: white; text-decoration: none; border-radius: 5px; font-weight: bold;">+ Tambah Data</a>
    
    <a href="index.html" class="btn btn-home" style="display: inline-block; padding: 10px 20px; background-color: #444; color: white; text-decoration: none; border-radius: 5px; font-weight: bold; margin-left: 10px;">Beranda</a>
</div>
</body>
</html>