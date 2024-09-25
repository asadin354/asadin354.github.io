// JavaScript
const tombolPenawaran = document.querySelectorAll('.tombol-penawaran');
const kotakPopup = document.getElementById('kotak-popup');
const tutupPopup = document.getElementById('tutup-popup');

// Menampilkan popup saat tombol ditekan
tombolPenawaran.forEach(tombol => {
    tombol.addEventListener('click', () => {
        kotakPopup.style.display = 'block';
    });
});

// Menutup popup saat tombol tutup ditekan
tutupPopup.addEventListener('click', () => {
    kotakPopup.style.display = 'none';
});

// Menutup popup saat area di luar popup diklik
window.addEventListener('click', (e) => {
    if (e.target === kotakPopup) {
        kotakPopup.style.display = 'none';
    }
});
