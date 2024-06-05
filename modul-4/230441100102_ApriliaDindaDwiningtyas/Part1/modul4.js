// 1. Menyimpan data mahasiswa dalam objek
const mahasiswa = {
    nama: "Aprilia Dinda Dwiningtyas",
    npm: "230441100102",
    jurusan: "Sistem Informasi",
    nilai: [90, 80, 85, 79]
  };
  
  // 2. Menampilkan data mahasiswa 
  function DataMahasiswa(mhsbaru) {
    console.log("Nama:", mhsbaru.nama);
    console.log("NPM:", mhsbaru.npm);
    console.log("Jurusan:", mhsbaru.jurusan);
    console.log("Nilai:", mhsbaru.nilai);
  }
  
 DataMahasiswa(mahasiswa);
  
  // 3. Fungsi untuk menghitung rata-rata nilai mahasiswa
  function RataRata(nilaiArray) {
    const totalRatarata = nilaiArray.reduce((acc, nilai) => acc + nilai, 0);
    return totalRatarata / nilaiArray.length;
  }
  
  const RataRataNilai = RataRata(mahasiswa.nilai);
  console.log("Rata-rata Nilai:", RataRataNilai);
  
  // 4. Fungsi untuk membalik urutan karakter dalam sebuah string
  function BalikString(str) {
    return str.split('').reverse().join('');
  }
  
  const contohString = "Hello";
  console.log("String terbalik:", BalikString(contohString));
  
  // 5. Perulangan untuk  angka dari nilai mahasiswa ke console
    console.log("Nilai Mahasiswa:");
    mahasiswa.nilai.forEach((nilai, i) => {
        console.log("Nilai ke-" + (i + 1) + ": " + nilai);
    });

  // 6. Fungsi untuk menentukan nilai huruf berdasarkan skala nilai
  function NilaiHuruf(nilai) {
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
  
  // 7. Menampilkan nilai huruf dari rata-rata nilai mahasiswa
  const hurufRataRata = NilaiHuruf(RataRataNilai);
  console.log("Nilai Huruf dari Rata-rata:", hurufRataRata);