let mahasiswa = {
    nama: "Safira Fatma Maulidia",
    npm: "230441100119",
    jurusan: "Sistem Informasi",
    nilai: [80, 70, 90, 95] 
};

console.log("Data Mahasiswa:");
console.log("Nama:", mahasiswa.nama);
console.log("NPM:", mahasiswa.npm);
console.log("Jurusan:", mahasiswa.jurusan);
console.log("Nilai:", mahasiswa.nilai);

function hitungRataRata(nilai) {
    let total = 0;
    for (let i = 0; i < nilai.length; i++) {
        total += nilai[i];
    }
    return total / nilai.length;
}

let rataRataNilai = hitungRataRata(mahasiswa.nilai);
console.log("Rata-rata Nilai Mahasiswa:", rataRataNilai);

function balikString(kata) {
    return kata.split("").reverse().join("");
}

let kataBalik = balikString("Safira Fatma Maulidia");
console.log("Kata Terbalik:", kataBalik);

console.log("Nilai Rata-Rata Mahasiswa:");
for (let i = 0; i < mahasiswa.nilai.length; i++) {
    console.log(mahasiswa.nilai[i]);
}

function tentukanNilaiHuruf(nilai) {
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

let nilaiHuruf = tentukanNilaiHuruf(rataRataNilai);
console.log("Nilai Huruf Rata-rata:", nilaiHuruf);
