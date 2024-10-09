<?php include 'header.php'; ?>
<?php include 'db.php'; // Menghubungkan dengan database ?>
<main>
    <section class="form-lelang">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Mengambil dan menyanitasi data dari form
            $nama = htmlspecialchars($_POST['nama']);
            $jumlah_tawaran = htmlspecialchars($_POST['jumlah_tawaran']);
            $nomor_hp = htmlspecialchars($_POST['nomor_hp']);
            $alamat = htmlspecialchars($_POST['alamat']);

            // Menggunakan prepared statements untuk menyimpan data
            $stmt = $conn->prepare("INSERT INTO tawaran (nama, jumlah_tawaran, nomor_hp, alamat) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("sdss", $nama, $jumlah_tawaran, $nomor_hp, $alamat);

            // Menjalankan statement dan memeriksa hasilnya
            if ($stmt->execute()) {
                echo "<h2>Detail Tawaran</h2>";
                echo "<p><strong>Nama Lengkap:</strong> " . $nama . "</p>";
                echo "<p><strong>Jumlah Tawaran (Rp):</strong> Rp" . number_format($jumlah_tawaran, 0, ',', '.') . "</p>";
                echo "<p><strong>Nomor HP:</strong> " . $nomor_hp . "</p>";
                echo "<p><strong>Alamat:</strong> " . $alamat . "</p>";
            } else {
                echo "Error: " . $stmt->error; // Menampilkan error jika gagal
            }

            // Menutup statement
            $stmt->close();
        } else {
            echo "<p>Data tidak diterima. Silakan coba lagi.</p>";
        }
        ?>
    </section>
</main>
<?php include 'footer.php'; ?>
<?php $conn->close(); // Menutup koneksi ?>
