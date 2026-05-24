<?php
include 'koneksi.php';

// Ambil ID anggota yang mau diedit
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM data_diri WHERE id = '$id'");
$data = mysqli_fetch_array($query);

// Proses update saat tombol Simpan ditekan
if (isset($_POST['update'])) {
    $nama    = $_POST['nama'];
    $nis     = $_POST['nis'];
    $kelas   = $_POST['kelas'];
    $jabatan = $_POST['jabatan'];

    $update = mysqli_query($conn, "UPDATE data_diri SET nama='$nama', nis='$nis', kelas='$kelas', jabatan='$jabatan' WHERE id='$id'");

    if ($update) {
        echo "<script>
                alert('Data Berhasil Diperbarui!');
                window.location.href='tampil-data.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal Memperbarui Data!');
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Anggota</title>
    <style>
        body { font-family: sans-serif; background-color: #121212; color: #fff; padding: 40px; }
        .box { max-width: 400px; margin: auto; background: #1e1e1e; padding: 30px; border-radius: 8px; border-top: 5px solid #b22222; }
        h2 { color: #ff4d4d; text-align: center; }
        input { width: 100%; padding: 10px; margin: 10px 0; background: #333; border: 1px solid #444; color: #fff; box-sizing: border-box; border-radius: 4px; }
        .btn { width: 100%; padding: 12px; background: #b22222; color: #fff; border: none; font-weight: bold; cursor: pointer; border-radius: 4px; }
        .btn:hover { background: #ff4d4d; }
    </style>
</head>
<body>
    <div class="box">
        <h2>Edit Anggota</h2>
        <form action="" method="POST">
            <input type="text" name="nama" value="<?php echo $data['nama']; ?>" required placeholder="Nama">
            <input type="text" name="nis" value="<?php echo $data['nis']; ?>" required placeholder="NIS">
            <input type="text" name="kelas" value="<?php echo $data['kelas']; ?>" required placeholder="Kelas">
            <input type="text" name="jabatan" value="<?php echo $data['jabatan']; ?>" required placeholder="Jabatan">
            <button type="submit" name="update" class="btn">SIMPAN PERUBAHAN</button>
        </form>
    </div>
</body>
</html>