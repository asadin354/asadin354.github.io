<?php
include 'header.php';
include 'db.php'; // Menghubungkan ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST['nama']);
    $jumlah_tawaran = htmlspecialchars($_POST['jumlah_tawaran']);
    $nomor_hp = htmlspecialchars($_POST['nomor_hp']);
    $alamat = htmlspecialchars($_POST['alamat']);

    // Proses upload foto
    $foto = $_FILES['foto'];
    $tmp_name = $foto['tmp_name'];
    $file_ext = strtolower(pathinfo($foto['name'], PATHINFO_EXTENSION));
    $newFileName = date('Y-m-d_H.i.s') . '.' . $file_ext;
    $targetDir = "uploads/";
    $targetFile = $targetDir . $newFileName;

    // Validasi tipe file
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
    if (in_array($file_ext, $allowedTypes)) {
        if (move_uploaded_file($tmp_name, $targetFile)) {
            // Simpan data ke database
            $stmt = $conn->prepare("INSERT INTO tawaran (nama, jumlah_tawaran, nomor_hp, alamat, foto) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sdsss", $nama, $jumlah_tawaran, $nomor_hp, $alamat, $newFileName);

            if ($stmt->execute()) {
                echo "<div class='hasil-wrapper'>";
                echo "<h2>Tawaran Berhasil Dikirim!</h2>";
                echo "<div class='hasil-content'>";
                echo "<p><strong>Nama Lengkap:</strong> " . $nama . "</p>";
                echo "<p><strong>Jumlah Tawaran (Rp):</strong> Rp" . number_format($jumlah_tawaran, 0, ',', '.') . "</p>";
                echo "<p><strong>Nomor HP:</strong> " . $nomor_hp . "</p>";
                echo "<p><strong>Alamat:</strong> " . $alamat . "</p>";
                echo "<div class='hasil-foto'>";
                echo "<img src='" . $targetFile . "' alt='Foto KTP' class='foto-hasil'>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            } else {
                echo "<p class='error'>Error: " . $stmt->error . "</p>";
            }
            $stmt->close();
        } else {
            echo "<p class='error'>Error uploading file.</p>";
        }
    } else {
        echo "<p class='error'>Tipe file tidak diperbolehkan.</p>";
    }

    // Menutup koneksi
    $conn->close();
} else {
    echo "<p class='error'>Data tidak valid.</p>";
}

include 'footer.php';
?>
