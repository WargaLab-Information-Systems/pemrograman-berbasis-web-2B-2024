// 1. Menyimpan data mahasiswa dalam objek
const mahasiswa = {
    nama: "Wardatus Sholicha",
    npm: "1230441100170",
    jurusan: "Sistem Informasi",
    nilai: [85, 88, 92, 90]
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
    const total = nilaiArray.reduce((acc, nilai) => acc + nilai, 0);
    return total / nilaiArray.length;
  }
  
  const RataRataNilai = RataRata(mahasiswa.nilai);
  console.log("Rata-rata Nilai:", RataRataNilai);
  
  // 4. Fungsi untuk membalik urutan karakter dalam sebuah string
  function balikString(str) {
    return str.split('').reverse().join('');
  }
  
 
  const contohString = "Hello";
  console.log("String terbalik:", balikString(contohString));
  
  // 5. Perulangan untuk menampilkan angka dari nilai mahasiswa ke console
  console.log("Nilai Mahasiswa:");
  mahasiswa.nilai.forEach((nilai, index) => {
    console.log(`Nilai ke-${index + 1}: ${nilai}`);
  });
  
  // 6. Fungsi untuk menentukan nilai huruf berdasarkan skala nilai
  function nilaiHuruf(nilai) {
    if (nilai > 80) {
      return "A";
    } else if (nilai >= 70 && nilai <= 79) {
      return "B";
    } else if (nilai >= 60 && nilai <= 69) {
      return "C";
    } else if (nilai >= 50 && nilai <= 59) {
      return "D";o
    } else {
      return "E";
    }
  }
  
  // 7. Menampilkan nilai huruf dari rata-rata nilai mahasiswa
  const hurufRataRata = nilaiHuruf(RataRataNilai);
  console.log("Nilai Huruf dari Rata-rata:", hurufRataRata);
  