


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Database: `db_mahasiswa`
CREATE DATABASE IF NOT EXISTS db_mahasiswa;
USE db_mahasiswa;   

-- Table structure for table `mahasiswa`
CREATE TABLE mahasiswa (
  id int(11) NOT NULL,
  nama varchar(100) NOT NULL,
  nim int(12) NOT NULL,
  umur int(3) NOT NULL,
  jenis_kelamin enum('laki-laki','perempuan') NOT NULL,
  prodi varchar(45) NOT NULL,
  jurusan varchar(100) NOT NULL,
  asal_kota varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `mahasiswa`
INSERT INTO mahasiswa (id, nama, nim, umur, jenis_kelamin, prodi, jurusan, asal_kota) VALUES
(8, 'DIAH AYU NURMALA', 230441100091, 19, 'perempuan', 'SISTEM INFORMASI', 'TEKNIK', 'TUBAN'),
(9, 'APRILIA DINDA DWININGTYAS', 230441100102, 20, 'perempuan', 'SISTEM INFORMASI', 'TEKNIK', 'JOMBANG');

-- Indexes for table `mahasiswa`
ALTER TABLE mahasiswa
  ADD PRIMARY KEY (id);

-- AUTO_INCREMENT for table `mahasiswa`
ALTER TABLE mahasiswa
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
