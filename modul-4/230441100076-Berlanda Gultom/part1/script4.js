var mahasiswa = {
    nama: "Berlanda Paulima Gultom",
    npm: "230441100076",
    jurusan: "Sistem Informasi",
    nilai: [99, 72, 64, 97, 78]
};

console.log("=====================( Data Mahasiswa )=====================");
console.log("Nama: " + mahasiswa.nama);
console.log("NPM: " + mahasiswa.npm);
console.log("Jurusan: " + mahasiswa.jurusan);
console.log("Nilai: " + mahasiswa.nilai.join(", "));

function balikString(string) {
    var reversedString = '';
    for (var i = string.length - 1; i >= 0; i--) {
        reversedString += string[i];
    }
    return reversedString;
}

var kata = "Berlanda Paulima Gultom ";
var kataTerbalik = balikString(kata);
console.log("=================( Nama Mahasiswa Dibalik )=================");
console.log("Nama Mahasiswa Terbalik:", kataTerbalik);

console.log("=================( Informasi Nilai Mahasiswa )==============");
console.log("Nilai Mahasiswa:");
for (var i = 0; i < mahasiswa.nilai.length; i++) {
    console.log("Nilai ke-" + (i + 1) + ":", mahasiswa.nilai[i]);
}

function hitungMean(nilaiMahasiswa) {
    var total = 0;
    for (var i = 0; i < nilaiMahasiswa.length; i++) {
        total += nilaiMahasiswa[i];
    }
    return total / nilaiMahasiswa.length;
}

var meanNilai = hitungMean(mahasiswa.nilai);
console.log("Rata-rata Nilai Mahasiswa:", meanNilai.toFixed(2));

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

var nilaiHuruf = kategori(meanNilai);
console.log("Kategori nilai mahasiswa:", nilaiHuruf);
