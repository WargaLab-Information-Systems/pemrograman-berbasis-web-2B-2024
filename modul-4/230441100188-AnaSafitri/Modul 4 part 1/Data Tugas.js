var mahasiswa = {
    'nama' : 'Ana Safitri',
    'npm' : '230441100188',
    'jurusan' : 'Sistem Informasi',
    'nilai' : [82, 85, 92, 95]
  }
  
  console.log('Nama   : ' + mahasiswa['nama']);
  console.log('NPM    : ' + mahasiswa['npm']);
  console.log('Jurusan: ' + mahasiswa['jurusan']);
  console.log('Nilai  : ' + mahasiswa['nilai']);
  
  function hitungRataRata(nilai) {
    if (!Array.isArray(nilai)) {
      throw new Error('Input berupa Array');
    }
  
    if (nilai.length === 0) {
      return 0;
    }
  
    var total = 0;
    for (var i = 0; i < nilai.length; i++) {
      total += nilai[i];
    }
  
    return total / nilai.length;
  }
  
  for (var i = 0; i < mahasiswa['nilai'].length; i++) {
    console.log('Nilai Matkul ' + (i + 1) + ': ' + mahasiswa['nilai'][i]);
  }

  function hitungNilaiHuruf(nilai) {
    if (typeof nilai !== 'number') {
      throw new Error('Input berupa number');
    }
  
    if (nilai > 80) {
      return 'A';
    } else if (nilai >= 70) {
      return 'B';
    } else if (nilai >= 60) {
      return 'C';
    } else if (nilai >= 50) {
      return 'D';
    } else {
      return 'E';
    }
  }

  var rataRataNilai = hitungRataRata(mahasiswa['nilai']);
  console.log('Nilai dari rata-rata: ' + hitungNilaiHuruf(rataRataNilai));

  function reverseString(str) {
    if (typeof str !== 'string') {
      throw new Error('Input adalah string');
    }
  
    return str.split('').reverse().join('');
  }
  console.log('Nama terbalik: ' + reverseString(mahasiswa['nama']));