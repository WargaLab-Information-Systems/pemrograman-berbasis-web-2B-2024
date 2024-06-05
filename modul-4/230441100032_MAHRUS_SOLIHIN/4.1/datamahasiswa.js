var nama = new Array();
nama[0] = "Mahrus Solihin";
nama[1] = "Surya Baihaqi";
nama[2] = "Mohammad Gufron";
nama[3] = "Mohammad Ilham";
nama[4] = "Dani Alfurqon";

var nim = new Array();
nim[0] = 230441100032;
nim[1] = 230441100033;
nim[2] = 230441100034;
nim[3] = 230441100035;
nim[4] = 230441100036;

var prodi = new Array();
prodi[0] = "Sistem Informasi";
prodi[1] = "Teknik Informatika";
prodi[2] = "Teknik Industri";
prodi[3] = "Teknik Mesin";
prodi[4] = "Teknik Mekatronika";

var angkatan = new Array();
angkatan[0] = 2023;
angkatan[1] = 2022;
angkatan[2] = 2021;
angkatan[3] = 2020;
angkatan[4] = 2019;

console.log("Nama : " + nama[0]);
console.log("NIM : " + nim[0]);
console.log("Prodi : " + prodi[0]);
console.log("Angkatan : " + angkatan[0]);
console.log("Nama : " + nama[1]);
console.log("NIM : " + nim[1]);
console.log("Prodi : " + prodi[1]);
console.log("Angkatan : " + angkatan[1]);
console.log("Nama : " + nama[2]);
console.log("NIM : " + nim[2]);
console.log("Prodi : " + prodi[2]);
console.log("Angkatan : " + angkatan[2]);
console.log("Nama : " + nama[3]);
console.log("NIM : " + nim[3]);
console.log("Prodi : " + prodi[3]);
console.log("Angkatan : " + angkatan[3]);
console.log("Nama : " + nama[4]);
console.log("NIM : " + nim[4]);
console.log("Prodi : " + prodi[4]);
console.log("Angkatan : " + angkatan[4])

// Fungsi untuk menghitung rata-rata dari nilai mahasiswa
function hitungRataRata(nilaiMahasiswa) {
    let totalNilai = 0;
    for (let i = 0; i < nilaiMahasiswa.length; i++) {
        totalNilai += nilaiMahasiswa[i];
    }
    return totalNilai / nilaiMahasiswa.length;
}

// Fungsi untuk menentukan nilai huruf berdasarkan nilai
function nilaiHuruf(nilai) {
    if (nilai > 80) {
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

// menyimpan nilai di dalam array
let nilaiMahasiswa = [75, 90, 60, 55, 85];

// Menghitung rata-rata nilai
let rataRata = hitungRataRata(nilaiMahasiswa);

// Menampilkan nilai-huruf dari rata-rata nilai mahasiswa
let nilaiHurufRataRata = nilaiHuruf(rataRata);
console.log("Nilai huruf dari rata-rata nilai mahasiswa adalah:", nilaiHurufRataRata);

// Menampilkan nilai-nilai mahasiswa ke dalam console
console.log("Nilai mahasiswa:");
for (let i = 0; i < nilaiMahasiswa.length; i++) {
    console.log("Nilai mahasiswa ke-" + (i + 1) + ":", nilaiMahasiswa[i]);
}