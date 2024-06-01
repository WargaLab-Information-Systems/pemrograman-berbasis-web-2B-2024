const mahasiswa = {
    nama: "Jhon biden",
    npm: "232865419086",
    jurusan: "Sistem Information",
    nilai: [86, 96, 67, 53, 70]
};

console.log("Data Mahasiswa:");
console.log("Nama: " + mahasiswa.nama);
console.log("NPM: " + mahasiswa.npm);
console.log("Jurusan: " + mahasiswa.jurusan);
console.log("Nilai: " + mahasiswa.nilai.join(", "));

function hitungRataRataNilai(nilai) {
    const total = nilai.reduce((acc, curr) => acc + curr, 0);
    return total / nilai.length;
}

function reverseString(str) {
    return str.split("").reverse().join("");
}
mahasiswa.nama = reverseString(mahasiswa.nama);
console.log("Hasil setelah di balik: "+ mahasiswa.nama);

console.log("Nilai Mahasiswa:");
mahasiswa.nilai.forEach((nilai, index) => {
    console.log("Nilai ke-" + (index + 1) + ": " + nilai);
});

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

const rataRata = hitungRataRataNilai(mahasiswa.nilai);
const nilaiHuruf = tentukanNilaiHuruf(rataRata);
console.log("Rata-rata Nilai Mahasiswa: " + rataRata);
console.log("Nilai Huruf: " + nilaiHuruf);