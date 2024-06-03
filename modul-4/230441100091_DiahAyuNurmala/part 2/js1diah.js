// Mendapatkan elemen-elemen yang diperlukan
const select = document.getElementById('select');
const options_list = document.getElementById('options_list');
const options = document.querySelectorAll('.option');

// Saat elemen select diklik, daftar opsi akan muncul atau menghilang
select.addEventListener("click", () => {
    options_list.classList.toggle("active");
    select.querySelector(".fa-angle-down").classList.toggle("fa-angle-up");
});

// Untuk setiap opsi di dalam daftar, tambahkan fungsi klik
options.forEach(option => {
    option.addEventListener("click", () => {
        // Hapus tanda 'selected' dari opsi yang sebelumnya dipilih, jika ada
        document.querySelector('.selected')?.classList.remove('selected');
        
        // Ubah teks elemen select menjadi teks dari opsi yang diklik
        select.querySelector("span").innerText = option.innerText;
        
        // Tambahkan tanda 'selected' ke opsi yang diklik
        option.classList.add("selected");
        
        // Tutup daftar opsi
        options_list.classList.remove("active");
        
        // Kembalikan ikon panah ke posisi semula
        select.querySelector(".fa-angle-down").classList.remove("fa-angle-up");
    });
});
