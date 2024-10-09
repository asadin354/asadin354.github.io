// JavaScript untuk menampilkan dan menutup popup
const tombolPenawaran = document.querySelectorAll('.tombol-penawaran');
const kotakPopup = document.getElementById('kotak-popup');
const tutupPopup = document.getElementById('tutup-popup');

if (tombolPenawaran && kotakPopup && tutupPopup) {
    tombolPenawaran.forEach(tombol => {
        tombol.addEventListener('click', () => {
            kotakPopup.style.display = 'block';
        });
    });

    tutupPopup.addEventListener('click', () => {
        kotakPopup.style.display = 'none';
    });

    window.addEventListener('click', (event) => {
        if (event.target == kotakPopup) {
            kotakPopup.style.display = 'none';
        }
    });
}
