<?php
$host = 'localhost';
$db = 'lelang_berkah';
$user = 'root'; // Default username di XAMPP
$pass = ''; // Default password kosong di XAMPP

// Mencoba menghubungkan ke database
$conn = new mysqli($host, $user, $pass, $db);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
