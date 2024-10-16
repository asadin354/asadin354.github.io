<?php
include 'db.php'; // Hubungkan dengan database

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data
    $sql = "DELETE FROM tawaran WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Tawaran berhasil dihapus'); window.location.href='daftar_tawaran.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }

    // Menutup koneksi
    $conn->close();
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location.href='daftar_tawaran.php';</script>";
}
?>
