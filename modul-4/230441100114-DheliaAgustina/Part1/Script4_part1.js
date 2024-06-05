var mahasiswa={
    'nama':'Dhelia',
    'nim' :114,
    'jurusan' :'sistem informasi',
    'nilai' :[90,70,60]
};



for (let index = 0; index < mahasiswa.nilai.length; index++) {
  console.log(nilaiHuruf(mahasiswa.nilai[index]));
}



console.log(mahasiswa.nama);
console.log(mahasiswa.nim);
console.log(mahasiswa.jurusan);
console.log(mahasiswa.nilai[1]);

// menghitung rata-rata dalam array
function rataRataNilai(nilaiArray) {
    let jumlahNilai = 0;
    for (let i = 0; i < nilaiArray.length; i++) {
      jumlahNilai += nilaiArray[i];
    }
    return jumlahNilai / nilaiArray.length;
}

// mengembalikkan nilai
function balikKarakter(str) {
    return str.split("").revers().join("");
}

var nama= "dhelia";
var balikKarakter= balikKarakter(nama);
console.log(balikKarakter);


// menampilkan semua nilai
console.log("Nilai Mahasiswa:");
for (let i = 0; i < mahasiswa.nilai.length; i++) {
  console.log(mahasiswa.nilai[i]);
}

// menentukan nilai
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

const rataRata = rataRataNilai(mahasiswa.nilai);
var nilaiHurufRataRata = nilaiHuruf(rataRata);
console.log(`Rata-rata nilai: ${rataRata} (${nilaiHurufRataRata})`);