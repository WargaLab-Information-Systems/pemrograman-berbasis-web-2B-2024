// 1. Menyimpan data mahasiswa
var dataMahasiswa = [
    {
      'nama': "Dhelia Agustina",
      'nim': 230441100114,
      'jurusan': "Sistem informasi",
      'nilai': [80, 75, 90, 85, 70]
    },
    {
      'nama': "Mutiara tania",
      'nim': 230441100092,
      'jurusan': "Manajemen",
      'nilai': [75, 80, 70, 85, 90]
    },
    {
      'nama': "Safira fatma",
      'nim': 230441100119,
      'jurusan': "Akuntansi",
      'nilai': [70, 80, 75, 65, 85]
    }
];
  
// 2. Menampilkan data mahasiswa
for (let i = 0; i < dataMahasiswa.length; i++) {
    var mahasiswa = dataMahasiswa[i];
    console.log(`Mahasiswa ${i + 1}`);
    console.log(`Nama: ${mahasiswa.nama}`);
    console.log(`Nim: ${mahasiswa.nim}`);
    console.log(`Jurusan: ${mahasiswa.jurusan}`);
    console.log(`Nilai: ${mahasiswa.nilai}`);
    console.log("---");
}
  
// 3. Fungsi untuk menghitung rata-rata nilai
function rataRataNilai(nilaiArray) {
    let jumlahNilai = 0;
    for (let i = 0; i < nilaiArray.length; i++) {
      jumlahNilai += nilaiArray[i];
    }
    return jumlahNilai / nilaiArray.length;
}
  
// 4. Fungsi untuk membalik urutan karakter dalam string
function balikKarakter(str) {
    let hasilBalik = "";
    for (let i = str.length - 1; i >= 0; i--) {
      hasilBalik += str[i];
    }
    return hasilBalik;
}
  
// 5. Menampilkan nilai mahasiswa ke console
for (let i = 0; i < dataMahasiswa.length; i++) {
    var mahasiswa = dataMahasiswa[i];
    console.log(`Nilai Mahasiswa ${mahasiswa.nama}:`);
    for (let j = 0; j < mahasiswa.nilai.length; j++) {
      console.log(mahasiswa.nilai[j]);
    }
    console.log("---");
}
  
// 6. Fungsi untuk menentukan nilai huruf
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
  
// 7. Menampilkan nilai huruf rata-rata
for (let i = 0; i < dataMahasiswa.length; i++) {
    var mahasiswa = dataMahasiswa[i];
    var rataRata = rataRataNilai(mahasiswa.nilai);
    var nilaiHurufRataRata = nilaiHuruf(rataRata);
    console.log(`Rata-rata nilai ${mahasiswa.nama}: ${rataRata} (${nilaiHurufRataRata})`);
}

for (let index = 0; index < mahasiswa.nilai.length; index++) {
  console.log(nilaiHuruf(mahasiswa.nilai[index]));
}
