// Objek untuk menyimpan data mahasiswa
var mahasiswa = {
    nama: " Khusnur Faizah",
    npm: "230441100007",
    jurusan: "Sistem Informasi",
    nilai: [80, 95, 75, 97] 
};

// Menampilkan data mahasiswa ke dalam console
console.log("( Data Mahasiswa )");
console.log("Nama: " + mahasiswa.nama);
console.log("NPM: " + mahasiswa.npm);
console.log("Jurusan: " + mahasiswa.jurusan);
console.log("Nilai: " + mahasiswa.nilai.join(", "));           //penggabungan

// Fungsi untuk menghitung rata-rata nilai mahasiswa

function hitungMean(nilaiarray) {     //menerima array nilai mahasiswa yg ingin di hitung rata"nya
    var total = 0;
    for (let index = 0; index < nilaiarray.length; index++) {
        total += nilaiarray[index];
    }
    console.log(total/nilaiarray.length);
}     

hitungMean(mahasiswa.nilai);


// Fungsi untuk membalikkan string
function balikString(string) {
    var reversedString = '';   //Variabel ini akan digunakan untuk menyimpan string yang sudah dibalik.
    for (var i = string.length - 1; i >= 0; i--) { //bergerak mundur
        reversedString += string[i];
    }
    return reversedString;
}

// Contoh penggunaan fungsi untuk membalikkan string
var kata = "Khusnur Faizah ";
var kataTerbalik = balikString(kata);
console.log("( Nama Mahasiswa Dibalik )");
console.log("Nama Mahasiswa Terbalik:", kataTerbalik);

// Perulangan untuk menampilkan angka dari nilai mahasiswa ke dalam console
console.log("( Informasi Nilai Mahasiswa )");
console.log("Nilai Mahasiswa:");
for (var i = 0; i < mahasiswa.nilai.length; i++) {
    console.log("Nilai ke-" + (i + 1) + ":", mahasiswa.nilai[i]);
}

// Fungsi untuk menentukan nilai huruf berdasarkan skala nilai
function kategori(nilai) {
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

// Menampilkan nilai huruf dari rata-rata nilai mahasiswa
var nilaiHuruf = kategori(meanNilai);
console.log("Nilai Huruf dari Rata-rata Nilai Mahasiswa:", nilaiHuruf);