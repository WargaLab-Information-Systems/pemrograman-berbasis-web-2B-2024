// no 1
// Membuat objek untuk menyimpan data mahasiswa
var mahasiswa = {
    nama: "Amaliaaa",
    npm: "230441100046",
    jurusan: "Sistem informasi",
    nilai: [87, 85, 90, 75, 95] 
};


// no 2
// Menampilkan data mahasiswa
console.log("Nama: " + mahasiswa.nama);
console.log("NPM: " + mahasiswa.npm);
console.log("Jurusan: " + mahasiswa.jurusan);
console.log("Nilai: " + mahasiswa.nilai.join(","));

// no 3 
// menghitung rata-rata
function hitungRataRata(nilai) {
    let total = 0;
    for (let i = 0; i < nilai.length; i++) {
        total += nilai[i];
    }
    var rataRata = total / nilai.length;
    return rataRata;
}

var rataRataNilai = hitungRataRata(mahasiswa.nilai);
console.log("Rata-rata Nilai Mahasiswa: " + rataRataNilai);


// // no 4 
// // mengubah urutan karakter
function reverseString(string) {
    return string.split("").reverse().join("");
}

// Contoh penggunaan fungsi
var namaku = "Amalia";
var kebalik = reverseString(namaku);
console.log("Karakter Amalia jika dibalik menjadi: " + kebalik);


// // no 5
// // perulangan nilai mahasiswa
console.log("Nilai Mahasiswa:");
for (let i = 0; i < mahasiswa.nilai.length; i++) {
    console.log("Nilai ke-" + (i + 1) + ": " + mahasiswa.nilai[i]);
    
}

// // no 6 
// // menentukan nilai huruf
function nilaiHuruf(rataRataNilai) {
    if (rataRataNilai > 80) {
        return "A";
    } else if (rataRataNilai >= 70 && rataRataNilai <= 79) {
        return "B";
    } else if (rataRataNilai >= 60 && rataRataNilai <= 69) {
        return "C";
    } else if (rataRataNilai >= 50 && rataRataNilai <= 59) {
        return "D";
    } else {
        return "E";
    }
}



// no 7
var nilaiHurufRataRata = nilaiHuruf(rataRataNilai);
console.log("Nilai Huruf Rata-rata Mahasiswa: " + nilaiHurufRataRata);