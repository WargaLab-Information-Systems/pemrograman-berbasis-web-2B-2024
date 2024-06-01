// 1. Menyimpan data mahasiswa ke dalam objek
var mahasiswa = {
    nama: "Mutiara Tania Putri",
    nim: "230441100092",
    jurusan: "Sistem Informasi",
    nilai: [85, 92, 78, 91, 66]
  }

var nilai = [10,20,30];

console.log(nilai[2]);

  
  // 2. Menampilkan data mahasiswa ke console
  console.log("Nama        :", mahasiswa.nama);
  console.log("NIM         :", mahasiswa.nim);
  console.log("Jurusan     :", mahasiswa.jurusan);
  console.log("Nilai       :", mahasiswa.nilai);
  
  // 3. Fungsi untuk menghitung rata-rata nilai
  function hitungRataRata(nilai) {
    var total = 0;
    for (var i = 0; i < nilai.length; i++) {
      total += nilai[i];
    }  
    return total / nilai.length;
  }

  // 4. Fungsi untuk membalik urutan karakter dalam string
  function reverseString(str) {
    return str.split("").reverse().join("");
  }
  var string = "Hello World";
  var reverseString = reverseString(string);
  console.log(reverseString);
  
  // 5. Menampilkan angka dari nilai mahasiswa ke console
  console.log("Angka nilai :");
  for (var data of mahasiswa.nilai) {
    console.log(data) 
  } 
  
  
  // 6. Fungsi untuk menentukan nilai huruf
  function Nilai(nilai) {
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
  
  // 7. Menampilkan nilai huruf dari rata-rata nilai mahasiswa
  const rataRata = hitungRataRata(mahasiswa.nilai);
  console.log(`Rata-rata nilai: ${rataRata} (${Nilai(rataRata)})` );