<?php include 'header.php'; ?>
<main>
    <section class="form-lelang">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = htmlspecialchars($_POST['nama']);
            $jumlah_tawaran = htmlspecialchars($_POST['jumlah_tawaran']);
            $nomor_hp = htmlspecialchars($_POST['nomor_hp']);
            $alamat = htmlspecialchars($_POST['alamat']);

            echo "<h2>Detail Tawaran</h2>";
            echo "<p><strong>Nama Lengkap:</strong> " . $nama . "</p>";
            echo "<p><strong>Jumlah Tawaran (Rp):</strong> Rp" . number_format($jumlah_tawaran, 0, ',', '.') . "</p>";
            echo "<p><strong>Nomor HP:</strong> " . $nomor_hp . "</p>";
            echo "<p><strong>Alamat:</strong> " . $alamat . "</p>";
        }
        ?>
    </section>
</main>
<?php include 'footer.php'; ?>
