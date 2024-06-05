// 1. Membuat objek untuk menyimpan data mahasiswa
var mahasiswa = {
    nama: "Natasya Haidar",
    npm: "230441100127",
    jurusan: "Sistem Informasi",
    nilai: [88, 76, 92, 85]
};

// 2. Menampilkan data mahasiswa ke dalam console
console.log("Nama: " + mahasiswa.nama);
console.log("NPM: " + mahasiswa.npm);
console.log("Jurusan: " + mahasiswa.jurusan);
console.log("Nilai: " + mahasiswa.nilai);

// 3. Fungsi untuk menghitung rata-rata nilai
function hitungRataRata(nilaiArray) {
    var total = 0;
    for (var i = 0; i < nilaiArray.length; i++) {
        total += nilaiArray[i];
    }
    return total / nilaiArray.length;
}

// 4. Fungsi untuk membalikkan string
function reverseString(str) {
    return str.split("").reverse().join("");
}

var nama = reverseString ("Natasya")
console.log (nama)

// 5. Perulangan untuk menampilkan nilai mahasiswa
console.log("Daftar Nilai:");
for (var i = 0; i < mahasiswa.nilai.length; i++) {
    console.log(mahasiswa.nilai[i]);
}

// 6. Fungsi untuk menentukan nilai huruf
function nilaiHuruf(nilai) {
    if (nilai > 80) return "A";
    else if (nilai >= 70) return "B";
    else if (nilai >= 60) return "C";
    else if (nilai >= 50) return "D";
    else return "E";
}

// 7. Menampilkan nilai huruf dari rata-rata nilai
var rataRata = hitungRataRata(mahasiswa.nilai);
var huruf = nilaiHuruf(rataRata);
console.log("Rata-rata nilai: " + rataRata + " (" + huruf + ")");
