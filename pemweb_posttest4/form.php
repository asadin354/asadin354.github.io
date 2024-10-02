<?php include 'header.php'; ?>
<main>
    <section>
        <h2>Isi Data untuk Mengikuti Lelang</h2>
        <form action="hasil.php" method="post" class="form-lelang">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="jumlah_tawaran">Jumlah Tawaran (Rp):</label>
            <input type="number" id="jumlah_tawaran" name="jumlah_tawaran" min="0" required>

            <label for="nomor_hp">Nomor HP:</label>
            <input type="tel" id="nomor_hp" name="nomor_hp" pattern="[0-9]{10,13}" required>

            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" rows="3" required></textarea>

            <button type="submit">Kirim Tawaran</button>
        </form>
    </section>
</main>
<?php include 'footer.php'; ?>
