<?php
// 1. Jalankan session di baris pertama
session_start();

// 2. Cek apakah user sudah login. Kalau belum, tendang ke halaman login
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("Location: index.php"); // Ganti login.php jika nama file loginmu itu
    exit();
}

// 3. Hubungkan ke database
include 'koneksi.php';

// 4. KUNCI PROSES: Kode di bawah ini HANYA berjalan kalau tombol "Simpan Data" SUDAH DIKLIK!
if (isset($_POST['simpan'])) {
    
    // Ambil data yang diketik user di form
    $nama    = mysqli_real_escape_string($conn, $_POST['nama']);
    $nis     = mysqli_real_escape_string($conn, $_POST['nis']);
    $kelas   = mysqli_real_escape_string($conn, $_POST['kelas']);
    $jabatan = mysqli_real_escape_string($conn, $_POST['jabatan']);

    // Perintah memasukkan data ke tabel anggota
    $query_simpan = mysqli_query($conn, "INSERT INTO data_diri (nama, nis, kelas, jabatan) VALUES ('$nama', '$nis', '$kelas', '$jabatan')");

    // Jika berhasil disimpan, muncul notifikasi lalu pindah ke halaman tampil data
    if ($query_simpan) {
        echo "<script>
                alert('Data Anggota Paskibra Berhasil Disimpan!');
                window.location.href='tampil-data.php';
              </script>";
        exit();
    } else {
        echo "<script>alert('Gagal menyimpan data, coba cek database kamu!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Anggota</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #121212; /* Latar belakang gelap sesuai tema Paskibra kamu */
            color: #eeeeee;
            padding: 40px 20px;
        }

        .form-container {
            max-width: 500px;
            margin: 30px auto;
            background: #1e1e1e;
            padding: 30px;
            border-radius: 12px;
            border: 2px solid #b22222; /* Border merah tegas */
            box-shadow: 0 8px 25px rgba(0,0,0,0.5);
        }

        .form-container h2 {
            text-align: center;
            color: #fff;
            margin-bottom: 25px;
            text-transform: uppercase;
            font-size: 20px;
            letter-spacing: 1px;
        }

        .form-container h2 span {
            color: #ff4d4d;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #ccc;
        }

        .form-group input {
            width: 100%;
            padding: 10px 12px;
            background-color: #252525;
            border: 1px solid #444;
            border-radius: 6px;
            color: #fff;
            font-size: 14px;
            transition: 0.3s;
        }

        .form-group input:focus {
            outline: none;
            border-color: #ff4d4d;
        }

        /* Tombol Simpan Merah Solid */
        .btn-simpan {
            width: 100%;
            padding: 12px;
            background-color: #b22222;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            font-weight: bold;
            text-transform: uppercase;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }

        .btn-simpan:hover {
            background-color: #ff4d4d;
            box-shadow: 0 0 10px rgba(255, 77, 77, 0.4);
        }

        .btn-kembali {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #aaa;
            text-decoration: none;
            font-size: 13px;
        }

        .btn-kembali:hover {
            color: #ff4d4d;
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Tambah <span>Anggota</span> Baru</h2>
        
        <form action="" method="POST">
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="form-group">
                <label>NIS</label>
                <input type="text" name="nis" placeholder="Masukkan NIS" required>
            </div>

            <div class="form-group">
                <label>Kelas</label>
                <input type="text" name="kelas" placeholder="Masukkan kelas (misal: XI-RPL)" required>
            </div>

            <div class="form-group">
                <label>Jabatan</label>
                <select name="jabatan" required style="width: 100%; padding: 10px 12px; background-color: #252525; border: 1px solid #444; border-radius: 6px; color: #fff; font-size: 14px; outline: none; transition: 0.3s;">
                    <option value="">-- Pilih Jabatan --</option>
                    <option value="Ketua">Ketua</option>
                    <option value="Wakil Ketua">Wakil Ketua</option>
                    <option value="Sekretaris">Sekretaris</option>
                    <option value="Bendahara">Bendahara</option>
                    <option value="Anggota">Anggota</option>
                </select>
            </div>

            <button type="submit" name="simpan" class="btn-simpan">Simpan Data</button>
            
            <a href="tampil-data.php" class="btn-kembali">← Kembali ke Data Anggota</a>
        </form>
    </div>

</body>
</html>