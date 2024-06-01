// Membuat sebuah program untuk menyimpan data mahasiswa dalam bentuk objek
var mahasiswa = {
    nama: "Sonia Fitriani",
    npm: "230441100061",
    jurusan: "Sistem Informasi",
    nilai: [80, 75, 90, 85, 95] // contoh nilai mahasiswa
};
// Menampilkan data mahasiswa ke dalam console
console.log("=======================( Data Mahasiswa )====================");
console.log("Nama: " + mahasiswa.nama);
console.log("NPM: " + mahasiswa.npm);
console.log("Jurusan: " + mahasiswa.jurusan);
console.log("Nilai: " + mahasiswa.nilai.join(", "));

// Fungsi untuk menghitung rata-rata nilai mahasiswa
function hitungRataRata(nilaiMahasiswa) {
    var total = 0;
    for (var i = 0; i < nilaiMahasiswa.length; i++) {
        total += nilaiMahasiswa[i];
    }
    return total / nilaiMahasiswa.length;
}

// Fungsi untuk membalikkan urutan karakter dalam sebuah string
function balikString(stringTerbalik) {
    return stringTerbalik.split('').reverse().join('');
}
// Memanggil fungsi balikString() untuk menguji
var stringTerbalik = balikString("-Hello Sobat Mahasiswa-");
console.log("\nHasil Balik String Dari -Hello Sobat Mahasiswa- : " + stringTerbalik);

// Perulangan untuk menampilkan nilai mahasiswa ke dalam console
console.log("\n====================( Nilai Mahasiswa )=====================");
for (var i = 0; i < mahasiswa.nilai.length; i++) {
    console.log("Nilai " + (i+1) + ": " + mahasiswa.nilai[i]);
}
// Fungsi untuk menentukan nilai huruf
function nilaiHuruf(nilai) {
    if (nilai > 100 || nilai < 0) { // Penanganan nilai di luar rentang
        return "Nilai Tidak Valid";
    } else if (nilai >= 80) {
        return "A";
    } else if (nilai >= 70) {
        return "B";
    } else if (nilai >= 60) {
        return "C";
    } else if (nilai >= 50) {
        return "D";
    } else {
        return "E";
    }
}
console.log("\n====================(Keterangan Nilai Mahasiswa )==================");
for (var i = 0; i < mahasiswa.nilai.length; i++) {
    var nilaiHurufIndividu = nilaiHuruf(mahasiswa.nilai[i]);
    console.log("Nilai " + (i+1) + ": " + mahasiswa.nilai[i] + " (" + nilaiHurufIndividu + ")");
}
// Menampilkan nilai huruf dari rata-rata nilai mahasiswa
var rataRata = hitungRataRata(mahasiswa.nilai);
console.log("\nRata-rata Nilai Mahasiswa: " + rataRata.toFixed(2)); // Menampilkan rata-rata nilai dengan dua angka di belakang koma
console.log("Nilai Huruf Rata-rata Mahasiswa: " + nilaiHuruf(rataRata));
console.log("===================( Semangat Buat Kalian )====================");