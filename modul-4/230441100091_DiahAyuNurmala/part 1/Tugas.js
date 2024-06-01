// 1. program untuk menyimpan data mahasiswa
const mahasiswa = {
    nama: "Diah Ayu Nurmala",
    nim: "230441100091",
    jurusan: "Informatika",
    nilai: [85, 78, 92, 88]
};

// 2. Menampilkan data mahasiswa ke dalam console
console.log("Nama: " + mahasiswa.nama);
console.log("NIM: " + mahasiswa.nim);
console.log("Jurusan: " + mahasiswa.jurusan);
console.log("Nilai: " + mahasiswa.nilai.join(", "));

// 3. Fungsi untuk menghitung rata-rata nilai mahasiswa
function hitungRataRata(nilai) {
    let total = 0;
    for (let i = 0; i < nilai.length; i++) {
        total += nilai[i];
    }
    return total / nilai.length;
}

const rataRataNilai = hitungRataRata(mahasiswa.nilai);
console.log("Rata-rata Nilai: " + rataRataNilai);

// 4. Fungsi untuk membalikkan urutan karakter dalam sebuah string
function Stringbalik(str) {
    return str.split('').reverse().join('');
}
console.log(Stringbalik("Hello")); 

// 5. Perulangan untuk menampilkan angka dari nilai mahasiswa ke dalam console
for (let i = 0; i < mahasiswa.nilai.length; i++) {
    console.log("Nilai ke-" + (i + 1) + ": " + mahasiswa.nilai[i]);
}

// 6. Fungsi untuk menentukan nilai huruf berdasarkan skala nilai
function nilaiHuruf(nilai) {
    if (nilai > 80) {
        return "A";
    } else if (nilai >= 70 && nilai <= 79) {
        return "B";
    } else if (nilai >= 60 && nilai <= 69) {
        return "C";
    } else if (nilai >= 50 && nilai <= 59) {
        return "D";
    } else {
        return "E";
    }
}
// 7. menampilkan nilai huruf dan nilai rata rata
var rataRata = hitungRataRata(mahasiswa.nilai);
var huruf = nilaiHuruf(rataRata);
console.log("Rata-rata nilai: " + rataRata + " (" + huruf + ")");