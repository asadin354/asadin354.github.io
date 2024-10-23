<?php
include 'db.php'; // Hubungkan dengan database

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data berdasarkan ID
    $sql = "SELECT * FROM tawaran WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "<script>alert('Tawaran tidak ditemukan'); window.location.href='daftar_tawaran.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location.href='daftar_tawaran.php';</script>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data yang diubah dari form
    $nama = htmlspecialchars($_POST['nama']);
    $jumlah_tawaran = htmlspecialchars($_POST['jumlah_tawaran']);
    $nomor_hp = htmlspecialchars($_POST['nomor_hp']);
    $alamat = htmlspecialchars($_POST['alamat']);

    // Update data di database
    $sql = "UPDATE tawaran SET nama='$nama', jumlah_tawaran='$jumlah_tawaran', nomor_hp='$nomor_hp', alamat='$alamat' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Tawaran berhasil diupdate'); window.location.href='daftar_tawaran.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }

    // Menutup koneksi
    $conn->close();
}
?>

<?php include 'header.php'; ?>
<main>
    <section class="form-lelang">
        <h2>Edit Tawaran</h2>
        <form action="" method="post">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($row['nama']); ?>" required>

            <label for="jumlah_tawaran">Jumlah Tawaran (Rp):</label>
            <input type="number" id="jumlah_tawaran" name="jumlah_tawaran" min="0" value="<?php echo htmlspecialchars($row['jumlah_tawaran']); ?>" required>

            <label for="nomor_hp">Nomor HP:</label>
            <input type="tel" id="nomor_hp" name="nomor_hp" pattern="[0-9]{10,13}" value="<?php echo htmlspecialchars($row['nomor_hp']); ?>" required>

            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" rows="3" required><?php echo htmlspecialchars($row['alamat']); ?></textarea>

            <button type="submit">Update Tawaran</button>
        </form>
    </section>
</main>
<?php include 'footer.php'; ?>
