//1. Buatlah sebuah program untuk menyimpan data mahasiswa. Setiap mahasiswa memiliki nama, npm, jurusan dan nilai (berbentuk array). Data mahasiswa disimpan dalam bentuk objek.

// Membuat objek mahasiswa
let mahasiswa = {
  nama: "aikoo",
  npm: "23044110004",
  jurusan: "Sistem Informasi",
  nilai: [85, 90, 78, 88, 92]
};

// 2. Tampilkan data mahasiswa yang telah Anda simpan ke dalam objek ke dalam console. Pastikan untuk menampilkan setiap atribut mahasiswa (nama, npm, jurusan, nilai) ke console.
console.log("Data Mahasiswa :");
console.log("Nama:", mahasiswa.nama);
console.log("NPM:", mahasiswa.npm);
console.log("Jurusan:", mahasiswa.jurusan);
console.log("Nilai:", mahasiswa.nilai);

//3. Buatlah sebuah fungsi untuk menghitung rata-rata dari nilai mahasiswa. Fungsi ini akan menerima sebuah array angka dari nilai mahasiswa dan mengembalikan nilai rata-ratanya.
// Fungsi untuk menghitung rata-rata nilai mahasiswa
function hitungRataRata(nilaiMahasiswa) {
  let total = 0;
  for (let nilai of nilaiMahasiswa) {
    total += nilai;
  }
  return total / nilaiMahasiswa.length;
}

// Array nilai mahasiswa
let nilaiMahasiswa = [85, 90, 78, 88, 92];

// Memanggil fungsi hitungRataRata dan menampilkan hasilnya menggunakan console.log
let rataRataNilai = hitungRataRata(nilaiMahasiswa);
console.log("Rata-rata Nilai Mahasiswa:", rataRataNilai);

//4. Buatlah sebuah fungsi untuk mengubah urutan karakter dalam sebuah string menjadi terbalik. Misalnya, jika diberikan input "Hello", fungsi ini akan mengembalikan "olleH".
// Fungsi untuk mengubah urutan karakter dalam sebuah string menjadi terbalik
function reverseString(str) {
  let reversedStr = "";
  for (let i = str.length - 1; i >= 0; i--) {
    reversedStr += str[i];
  }
  return reversedStr;
}

// Contoh penggunaan fungsi reverseString
let inputString = "Hello";
let reversedString = reverseString(inputString);

// Menampilkan hasil pengubahan string ke dalam console
console.log("String Input:", inputString);
console.log("String Terbalik:", reversedString);

//5. Buatlah sebuah perulangan untuk menampilkan angka dari nilai mahasiswa ke dalam console.
// Perulangan untuk menampilkan nilai mahasiswa menggunakan console.log
console.log("Nilai Mahasiswa:");
for (let nilai of nilaiMahasiswa) {
  console.log(nilai);
}

//6. Buatlah sebuah fungsi untuk menentukan nilai huruf berdasarkan skala nilai berikut:
//Jika nilai lebih besar dari 80, kembalikan "A".
//Jika nilai antara 70 dan 79, kembalikan "B".
//Jika nilai antara 60 dan 69, kembalikan "C".
//Jika nilai antara 50 dan 59, kembalikan "D".
//Jika nilai kurang dari 50, kembalikan "E".
// Fungsi untuk menentukan nilai huruf berdasarkan skala nilai
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

// Contoh penggunaan fungsi untuk menentukan nilai huruf
let nilaiMahasiswa1 = 85;
let nilaiHuruf = tentukanNilaiHuruf(nilaiMahasiswa1);

// Menampilkan hasil nilai huruf ke dalam console
console.log("Nilai Mahasiswa:", nilaiMahasiswa1);
console.log("Nilai Huruf:", nilaiHuruf);

//7. Terakhir, tampilkan nilai huruf dari rata-rata nilai mahasiswa yang telah Anda simpan.

// Menampilkan hasil nilai huruf dari rata-rata nilai ke dalam console
console.log("Nilai Mahasiswa:", nilaiMahasiswa);
console.log("Rata-rata Nilai Mahasiswa:", rataRataNilai);
console.log("Nilai Huruf:", nilaiHuruf);
