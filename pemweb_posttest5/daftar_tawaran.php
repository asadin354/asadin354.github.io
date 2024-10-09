<?php include 'header.php'; ?>
<?php include 'db.php'; // Menghubungkan dengan database ?>
<main>
    <section class="form-lelang">
        <h2>Daftar Tawaran</h2>
        <?php
        // Mengambil data tawaran dari database
        $sql = "SELECT * FROM tawaran ORDER BY created_at DESC"; 
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Menampilkan data tawaran
            echo "<table border='1' cellpadding='10' cellspacing='0'>";
            echo "<tr>
                    <th>Nama Lengkap</th>
                    <th>Jumlah Tawaran (Rp)</th>
                    <th>Nomor HP</th>
                    <th>Alamat</th>
                    <th>Tanggal</th>
                    <th>Aksi</th> <!-- Kolom untuk tombol aksi -->
                  </tr>";

            // Mengeluarkan data setiap baris
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['nama']) . "</td>
                        <td>Rp" . number_format($row['jumlah_tawaran'], 0, ',', '.') . "</td>
                        <td>" . htmlspecialchars($row['nomor_hp']) . "</td>
                        <td>" . htmlspecialchars($row['alamat']) . "</td>
                        <td>" . $row['created_at'] . "</td>
                        <td>
                            <a href='edit_tawaran.php?id=" . $row['id'] . "'>Edit</a> | 
                            <a href='hapus_tawaran.php?id=" . $row['id'] . "' onclick='return confirm(\"Yakin ingin menghapus?\");'>Hapus</a>
                        </td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Tidak ada tawaran yang tersedia.</p>";
        }

        // Menutup koneksi
        $conn->close();
        ?>
    </section>
</main>
<?php include 'footer.php'; ?>
