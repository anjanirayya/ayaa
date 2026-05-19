<?php
session_start();
include 'koneksi.php';

// Kunci halaman: Kalau belum login, lempar balik ke login.php
if (!isset($_SESSION['nama_anggota'])) {
    header("location:login.php");
    exit();
}

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $nis = $_POST['nis'];
    $kelas = $_POST['kelas'];
    $jabatan = $_POST['jabatan'];

    $insert = mysqli_query($conn, "INSERT INTO data_diri VALUES('', '$nama', '$nis', '$kelas', '$jabatan')");
    if ($insert) {
        echo "<script>alert('Data berhasil disimpan!'); window.location='tampil-data.php';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data!');</script>";
    }
} // Tanda penutup IF yang benar dipindah ke sini (mengunci semua proses di atas)
?>

<!DOCTYPE html>
<html>
<head>
    <title>Isi Data Diri</title>
    <style>
        body { font-family: sans-serif; background: #222; color: white; display: flex; justify-content: center; padding-top: 50px; }
        .form-container { background: #333; padding: 40px; border-radius: 8px; width: 400px; border: 1px solid #b22222; }
        h3 { color: #ff4d4d; border-bottom: 2px solid #ff4d4d; padding-bottom: 10px; }
        label { display: block; margin-top: 15px; }
        input, select { width: 100%; padding: 10px; margin-top: 5px; background: #444; border: 1px solid #666; color: white; border-radius: 4px; box-sizing: border-box;}
        .btn { background: #b22222; color: white; border: none; padding: 12px; margin-top: 20px; width: 100%; border-radius: 4px; cursor: pointer; font-weight: bold; }
        .btn:hover { background: #ff4d4d; }
    </style>
</head>
<body>
    <div class="form-group">
    <label>Nama Lengkap</label>
    <input type="text" name="nama" value="<?php echo $_SESSION['nama_anggota']; ?>" readonly>
        <h3>PENGISIAN DATA ANGGOTA</h3>
        <form method="POST">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" required>
            
            <label>NIS</label>
            <input type="text" name="nis" required>
            
            <label>Kelas</label>
            <input type="text" name="kelas" placeholder="Contoh: XII TKJ 2" required>
            
            <label>Jabatan</label>
            <select name="jabatan">
                <option value="Anggota">Anggota</option>
                <option value="Ketua">Ketua</option>
                <option value="Wakil Ketua">Wakil Ketua</option>
                <option value="Sekretaris">Sekretaris</option>
                <option value="Bendahara">Bendahara</option>
            </select>

            <button type="submit" name="simpan" class="btn">SIMPAN DATA</button>
        </form>
    </div>
</body>
</html>