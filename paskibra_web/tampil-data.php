<?php

session_start();
// 2. Cek apakah status loginnya kosong atau tidak valid
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    echo "<script>
            alert('Silakan login terlebih dahulu!');
            window.location.href='index.php';
          </script>";
    exit();
}
// Menghubungkan ke database server sekolah
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota Paskibra</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)), url('background-paskib.jpeg');
            color: #eeeeee;
        }

        /* Navigasi Atas (Navbar) - Hitam Solid & Garis Merah */
        .navbar {
            background-color: #1a1a1a;
            color: #fff;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 3px solid #b22222; /* Garis merah tegas */
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        }

        .navbar .logo {
            font-size: 20px;
            font-weight: bold;
            letter-spacing: 2px;
            color: #ff4d4d; /* Merah menyala untuk aksen logo */
        }

        .navbar .nav-links a {
            color: #fff;
            text-decoration: none;
            margin-left: 20px;
            font-size: 14px;
            font-weight: 500;
            transition: 0.3s;
        }

        .navbar .nav-links a:hover {
            color: #ff4d4d;
        }

        /* Container Utama */
        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 25px;
            background: #1e1e1e; /* Box abu-abu gelap biar text kebaca */
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.5);
            border-top: 4px solid #b22222;
        }

        .container h2 {
            margin-bottom: 20px;
            color: #fff;
            font-size: 22px;
            letter-spacing: 1px;
            border-bottom: 1px solid #333;
            padding-bottom: 10px;
        }

        /* Tombol Tambah Data - Warna Merah Paskibra */
        .btn-tambah {
            display: inline-block;
            background-color: #b22222;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 20px;
            transition: 0.3s;
            border: 1px solid #ff4d4d;
        }

        .btn-tambah:hover {
            background-color: #ff4d4d;
            box-shadow: 0 0 10px rgba(255, 77, 77, 0.4);
        }

        /* Tabel Minimalis tapi Tegas */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            background-color: #252525;
            border-radius: 6px;
            overflow: hidden;
        }

        th, td {
            padding: 14px 15px;
            text-align: left;
            font-size: 14px;
        }

        th {
            background-color: #2d2d2d;
            color: #ff4d4d; /* Header tabel teksnya merah */
            font-weight: bold;
            border-bottom: 2px solid #b22222;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 1px;
        }

        td {
            border-bottom: 1px solid #333;
            color: #dddddd;
        }

        tr:hover {
            background-color: #2e2e2e; /* Efek highlight pas baris ditunjuk */
        }

        /* Tombol Aksi (Edit & Hapus) */
        .btn-aksi {
            display: inline-block;
            padding: 6px 14px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
            margin-right: 5px;
            transition: 0.2s;
        }

        .btn-edit {
            background-color: #2ecc71; /* Tetap hijau untuk edit biar gampang dikenali */
            color: white;
        }

        .btn-edit:hover {
            background-color: #27ae60;
        }

        .btn-hapus {
            background-color: #e74c3c; /* Merah terang untuk hapus/peringatan */
            color: white;
        }

        .btn-hapus:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <div class="logo">BRIGAKARA</div>
        <div class="nav-links">
            <a href="index.php">Beranda</a>
            <a href="logout.php">Keluar</a>
        </div>
    </div>

    <div class="container">
        <h2>Daftar Anggota Paskibra</h2>
        
        <a href="input-data.php" class="btn-tambah">+ Tambah Anggota Paskibra</a>
        <a href="edit.php?id=<?php echo $data['id']; ?>" style="color: #ff4d4d; text-decoration: none; font-weight: bold; margin-right: 10px;"></a>
        <a href="hapus.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Yakin ingin menghapus?')" style="color: #888; text-decoration: none;"></a>
        
        <table>
            <thead>
                <tr>
                    <th style="width: 60px;">No</th>
                    <th>Nama Lengkap</th>
                    <th>NIS</th>
                    <th>Kelas</th>
                    <th>Jabatan</th>
                    <th style="width: 180px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                // Ambil data dari tabel anggota
                $query = mysqli_query($conn, "SELECT * FROM data_diri");
                
                while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['nis']; ?></td>
                        <td><?php echo $data['kelas']; ?></td>
                        <td><?php echo $data['jabatan']; ?></td>
                        <td style="text-align: center;">
                            <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn-aksi btn-edit">Edit</a>
                            <a href="hapus.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Yakin data Paskibra ini ingin dihapus?')" class="btn-aksi btn-hapus">Hapus</a>
                        </td>
                    </tr>
                    <?php 
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>