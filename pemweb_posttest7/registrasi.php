<?php
require "db.php"; // Koneksi ke database

if (isset($_POST["submit"])) {
    $username = htmlspecialchars($_POST["username"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash password

    // Cek apakah username sudah digunakan
    $checkQuery = "SELECT * FROM users WHERE username = '$username'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo "<script>alert('Username sudah digunakan!'); window.location.href='registrasi.php';</script>";
    } else {
        // Menyimpan user baru
        $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Registrasi berhasil!'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Registrasi gagal!'); window.location.href='registrasi.php';</script>";
        }
    }
}
?>

<!-- HTML form registrasi -->
<div class="register-container">
    <form action="" method="post" class="register-form">
        <h2>Registrasi</h2>
        <div class="register-input-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
        </div>

        <div class="register-input-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>

        <button type="submit" name="submit" class="register-btn">Daftar</button>
        <p class="register-link">Sudah punya akun? <a href="login.php">Login di sini</a></p>
    </form>
</div>
