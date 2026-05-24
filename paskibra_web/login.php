<?php
include 'koneksi.php';
session_start();

// Memeriksa apakah tombol login sudah diklik
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Password seragam yang kamu tentukan sendiri
    $password_wajib = "paskibra2be"; 

    if ($password === $password_wajib) {
        $_SESSION['status'] = "login";
        $_SESSION['username'] = $username; 
        
        echo "<script>
                alert('Selamat Datang, " . $username . "! Login Berhasil.');
                window.location.href='tampil-data.php';
              </script>";
    } else {
        echo "<script>
                alert('Password Salah! Silakan hubungi admin Paskibra.');
                window.location.href='index.php';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Paskibra</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            /* Pastikan file 'background.jpg' sudah ditaruh di dalam folder project kamu */
            background-image: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)), url('background-paskib.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navigasi Atas (Navbar) Senada Web Utama Kamu */
        .navbar {
            background-color: #1a1a1a;
            color: #fff;
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 3px solid #b22222;
            width: 100%;
        }

        .navbar .logo {
            font-size: 22px;
            font-weight: bold;
            letter-spacing: 1.5px;
        }
        
        .navbar .logo .paskibra-text {
            color: #ff4d4d;
        }

        .navbar .nav-links a {
            color: #cccccc;
            text-decoration: none;
            margin-left: 25px;
            font-size: 14px;
            font-weight: 500;
            transition: 0.3s;
        }

        .navbar .nav-links a:hover {
            color: #ff4d4d;
        }

        /* Tombol Keluar khusus yang ada kotak merah tipis */
        .navbar .nav-links a.btn-logout {
            border: 1px solid #b22222;
            padding: 6px 18px;
            border-radius: 4px;
            color: #ff4d4d;
        }

        .navbar .nav-links a.btn-logout:hover {
            background-color: #b22222;
            color: #fff;
        }

        /* Area Penempatan Kotak Login tepat di Tengah-Tengah */
        .login-wrapper {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        /* Kotak Login Transparan Gelap dengan border merah melengkung di sudutnya */
        .login-box {
            background-color: rgba(26, 26, 26, 0.88); /* Background gelap semi-transparan */
            width: 100%;
            max-width: 440px;
            padding: 45px 35px;
            border-radius: 16px;
            border: 2px solid #b22222;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(4px); /* Efek blur kaca di latar foto belakang */
            text-align: center;
        }

        /* Judul Login Anggota Paskibra */
        .login-box h2 {
            color: #fff;
            font-size: 22px;
            margin-bottom: 35px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        .login-box h2 span {
            color: #ff4d4d;
        }

        /* Baris Input Custom (Gaya Garis Bawah Merah & Icon Space) */
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-group input {
            width: 100%;
            padding: 12px 10px;
            background: transparent;
            border: none;
            border-bottom: 2px solid #444; /* Garis bawah default */
            color: #fff;
            font-size: 15px;
            transition: 0.3s;
        }

        /* Saat input diklik, garis bawah berubah merah menyala */
        .form-group input:focus {
            outline: none;
            border-bottom-color: #ff4d4d;
        }

        /* Atur warna teks placeholder agar sedikit redup elegan */
        .form-group input::placeholder {
            color: #888;
        }

        /* Tombol Masuk Sistem Merah Solid Lebar */
        .btn-login {
            width: 100%;
            padding: 14px;
            background-color: #b22222;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            font-weight: bold;
            text-transform: uppercase;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 15px;
            letter-spacing: 1px;
        }

        .btn-login:hover {
            background-color: #ff4d4d;
            box-shadow: 0 0 15px rgba(255, 77, 77, 0.5);
        }

        /* Teks Tambahan di bawah form */
        .login-footer {
            margin-top: 25px;
            font-size: 13px;
            color: #aaa;
            line-height: 1.6;
        }

        .login-footer a {
            color: #ccc;
            text-decoration: none;
            transition: 0.2s;
        }

        .login-footer a:hover {
            color: #ff4d4d;
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <div class="logo">EKSTRAKURIKULER <span class="paskibra-text">PASKIBRA</span></div>
    </div>

    <div class="login-wrapper">
        <div class="login-box">
            <h2>Login <span>Anggota</span> Paskibra</h2>
            
            <form action="" method="POST">
                <div class="form-group">
                    <input type="text" name="username" placeholder="Username / NIS" required>
                </div>
                
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                
                <button type="submit" name="login" class="btn-login">Login</button>
            </form>
            
            <div class="login-footer">
                <p><a href="#">Lupa Password?</a></p>
                <p style="margin-top: 8px;">Belum punya akun? <a href="#" style="color: #ff4d4d;">Hubungi Admin</a></p>
            </div>
        </div>
    </div>

</body>
</html>