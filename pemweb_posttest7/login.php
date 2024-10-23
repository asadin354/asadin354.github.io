<?php
session_start();
require "db.php"; // Koneksi ke database

if (isset($_POST["submit"])) {
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    // Query untuk mendapatkan data user
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $username; // Simpan username ke dalam session
            echo "<script>alert('Login berhasil!'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Password salah!'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan!'); window.location.href='login.php';</script>";
    }
}
?>

<!-- HTML form login -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css"> <!-- Tambahkan stylesheet jika ada -->
</head>
<body>
    <div class="login-container">
        <form action="" method="post" class="login-form">
            <h2>Login</h2>
            <div class="login-input-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
            </div>

            <div class="login-input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>

            <button type="submit" name="submit" class="login-btn">Login</button>
            <p class="login-link">Belum punya akun? <a href="registrasi.php">Daftar di sini</a></p>
        </form>
    </div>
</body>
</html>
