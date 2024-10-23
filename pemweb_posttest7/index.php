<?php
session_start(); // Memulai sesi

if (!isset($_SESSION['login'])) {
    // Jika belum login, arahkan ke halaman login
    header("Location: login.php");
    exit;
}
?>

<?php include 'header.php'; ?>
<main>
    <section id="beranda">
        <h2>Selamat Datang di Lelang Berkah</h2>
        <p>Destinasi lelang online terbaik Anda untuk berbagai produk berkualitas.</p>

        <!-- Item Lelang -->
        <div class="item-lelang">
            <h3>Item Unggulan: Iphone 13</h3>
            <img src="iphone.jpeg" alt="Iphone 13">
            <p>Penawaran Saat Ini: Rp8.000.000</p>
            <button class="tombol-penawaran" onclick="window.location.href='form.php'">Tawar Sekarang</button>
        </div>

        <div class="item-lelang">
            <h3>Laptop Gaming</h3>
            <img src="laptoplegion.jpeg" alt="Laptop Gaming">
            <p>Penawaran Saat Ini: Rp12.500.000</p>
            <button class="tombol-penawaran" onclick="window.location.href='form.php'">Tawar Sekarang</button>
        </div>

        <div class="item-lelang">
            <h3>Jam Tangan Eiger</h3>
            <img src="jamtangan.jpeg" alt="Jam Tangan Eiger">
            <p>Penawaran Saat Ini: Rp500.000</p>
            <button class="tombol-penawaran" onclick="window.location.href='form.php'">Tawar Sekarang</button>
        </div>
    </section>

    <!-- Tentang Saya -->
    <section id="tentang">
        <h2>Tentang Saya</h2>
        <img src="aku.jpg" alt="Foto Profil" class="foto-profil">
        <p><strong>Nama:</strong> Muhammad Asadin Nur</p>
        <p><strong>Kuliah:</strong> S1-Informatika</p>
        <p><strong>Email:</strong> asadinnurmuhammad@gmail.com</p>
        <p><strong>Kontak:</strong> 085751764005</p>
    </section>
</main>
<?php include 'footer.php'; ?>
