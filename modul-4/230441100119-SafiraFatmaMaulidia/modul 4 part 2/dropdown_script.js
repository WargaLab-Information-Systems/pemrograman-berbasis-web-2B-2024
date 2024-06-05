// Menunggu sampai seluruh dokumen dimuat
document.addEventListener('DOMContentLoaded', () => {
    // Mendapatkan tombol dropdown dan konten dropdown
    const tombolDropdown = document.querySelector('.tombol-dropdown');
    const kontenDropdown = document.querySelector('.konten-dropdown');

    // Menambahkan event listener untuk menangani klik pada tombol dropdown
    tombolDropdown.addEventListener('click', () => {
        // Menampilkan atau menyembunyikan konten dropdown
        kontenDropdown.classList.toggle('tampil');
    });

    // Menambahkan event listener untuk menangani klik di luar tombol dropdown
    window.addEventListener('click', (event) => {
        // Jika klik terjadi di luar tombol dropdown
        if (!event.target.matches('.tombol-dropdown')) {
            // Menyembunyikan konten dropdown
            kontenDropdown.classList.remove('tampil');
        }
    });
});
