<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $nama_user = $_POST['nama']; // Mengambil nama dari input form
    $password  = $_POST['password']; // Mengambil password dari input form
    
    // Tentukan password wajib dari kamu di sini (silakan diganti bebas)
    $password_wajib = "paskibra2be"; 

    if ($password == $password_wajib) {
        // Jika password benar, simpan nama orang tersebut ke dalam SESSION
        $_SESSION['nama_anggota'] = $nama_user;
        
        // Lempar ke halaman cek-status.php untuk dicek apakah sudah pernah isi data
        header("location:cek-status.php");
        exit();
    } else {
        echo "<script>alert('Password salah!'); window.location='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Anggota Paskibra</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #121212;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-box {
            background: #1e1e1e;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.5);
            border-top: 5px solid #b22222;
            width: 300px;
        }
        h2 { text-align: center; color: #ff4d4d; margin-bottom: 20px; text-transform: uppercase; }
        label { display: block; margin-top: 15px; color: #bbb; }
        input { width: 100%; padding: 10px; margin-top: 5px; background: #252525; border: 1px solid #333; color: white; border-radius: 5px; box-sizing: border-box; }
        .btn { width: 100%; padding: 10px; margin-top: 25px; background: #b22222; border: none; color: white; font-weight: bold; border-radius: 5px; cursor: pointer; transition: 0.3s; }
        .btn:hover { background: #ff4d4d; }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Login Paskibra</h2>
    <form method="POST" action="">
        <label>Nama Lengkap</label>
        <input type="text" name="nama" placeholder="Masukkan nama kamu" required>
        
        <label>Password</label>
        <input type="password" name="password" placeholder="Masukkan password" required>
        
        <button type="submit" name="login" class="btn">LOGIN</button>
    </form>
</div>

</body>
</html>