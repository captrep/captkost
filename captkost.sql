-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jul 29, 2021 at 02:41 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `captkost`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `useradmin` varchar(50) NOT NULL,
  `passadmin` varchar(255) NOT NULL,
  `gambar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `useradmin`, `passadmin`, `gambar`) VALUES
(1, 'Ridduwan Ekaputra', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'img/tommy.jpg'),
(2, 'Tes', 'tes', '28b662d883b6d76fd96e4ddc5e9ba780', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `id_identitas` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `umur` int(2) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `jalan` varchar(50) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `id_penghuni` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `nama`, `umur`, `pekerjaan`, `agama`, `jalan`, `desa`, `kecamatan`, `kabupaten`, `foto`, `id_penghuni`) VALUES
(1, 'Ridduwan Ekaputra', 21, 'Mahasiswa', 'Islam', 'Jln Kebugaran No 73', 'Gebang', 'Wedomartani', 'Sleman', '849-tommy.jpg', 1),
(2, 'Ahmad Mark Zuckerberg Putra', 21, 'Proplayer FF', 'Islam', 'Jln ahmad sidik 21', 'Cikipit', 'Cikuput', 'Cekepet', '469-mark.jpg', 6),
(3, 'Mickey anggoro', 23, 'Leader of concat revengers', 'Islam Ktp', 'Jln jln yuk', 'suramiji', 'kocombang', 'slemanj', '521-56338b7b-7f3b-47ae-9d2a-a43cd8eb1c94.jpg', 7);

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id` int(3) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `judul` varchar(50) NOT NULL,
  `konten` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id`, `tanggal`, `jam`, `judul`, `konten`) VALUES
(5, '2020-06-07', '16:35:35', 'SALAH PARKIR!', 'Kendaraan dengan Nomor Polisi AB 3434 JH Parkir sembarangan woi mau kubakar motor kau hah?');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(3) NOT NULL,
  `nama_kamar` varchar(50) NOT NULL,
  `fasilitas` varchar(50) NOT NULL,
  `harga_kamar` int(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `id_penghuni` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `nama_kamar`, `fasilitas`, `harga_kamar`, `deskripsi`, `gambar`, `id_penghuni`) VALUES
(1, 'Kamar #KDL23', 'Kamar Mandi Luar', 500000, 'Kamar dilengkapi dengan bla bla bla bla pokoknya ini deskripsi kamar, pusing mau diisi apaan daripada diisi lorem ipsum bosen liatnya diisi ginian aja kali ya oke udh pusing ngoding jangan sampe pusing mikirin kalimat gajelas doang', '234-yeezy.jpg', 0),
(2, 'Kamar#KMD33', 'Kamar Mandi Dalam', 700000, 'Mantap sekali asik asik spontan uhuy mania mantap asik asik jos \r\nasiapp', '663-srah.jpg', 1),
(3, 'Kamar #KMD09', 'Kamar Mandi Dalam', 800000, 'Kamar dilengkapi dengan bla bla bla bla pokoknya ini deskripsi kamar, pusing mau diisi apaan daripada diisi lorem ipsum bosen liatnya diisi ginian aja kali ya oke udh pusing ngoding jangan sampe pusing mikirin kalimat gajelas doang', '18-s.jpg', 7),
(4, 'Kamar #KMD33', 'Kamar Mandi Dalam', 900000, 'Kamar dilengkapi dengan bla bla bla bla pokoknya ini deskripsi kamar, pusing mau diisi apaan daripada diisi lorem ipsum bosen liatnya diisi ginian aja kali ya oke udh pusing ngoding jangan sampe pusing mikirin kalimat gajelas doang', '750-uhuy.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `method`
--

CREATE TABLE `method` (
  `id_method` int(3) NOT NULL,
  `nama_method` varchar(50) NOT NULL,
  `payment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `method`
--

INSERT INTO `method` (`id_method`, `nama_method`, `payment`) VALUES
(15, 'GOPAY', '082192918231 Atas Nama PT. CaptKost'),
(17, 'BANK BNI', '38472639 Atas Nama PT. CaptKost'),
(18, 'BANK BRI', '3982323 Atas Nama PT. CaptKost'),
(23, 'OVO', '082117029339 Atas Nama PT. CaptKost'),
(24, 'BANK BCA', '1234652 Atas Nama PT. CaptKost');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(5) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_kamar` varchar(50) NOT NULL,
  `jenis` enum('Pendaftaran','Pembayaran') NOT NULL,
  `method` varchar(50) NOT NULL,
  `status` enum('Pending','Success','Cancelled') NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `invoice`, `username`, `nama_kamar`, `jenis`, `method`, `status`, `tanggal`, `jumlah`) VALUES
(21, 'U4412HRE2B', 'ridwan', 'Kamar#KMD33', 'Pembayaran', 'BANK BNI', 'Success', '2020-05-13', 700000),
(22, '6IJK8KDODG', 'qw', 'asdf', 'Pembayaran', 'BANK BCA', 'Success', '2020-05-18', 510000),
(24, '7AEAQP5J5N', 'ridwan', 'Kamar#KMD33', 'Pembayaran', 'BANK BCA', 'Cancelled', '2020-05-18', 700000),
(25, '1CFK462NAQ', 'dovi', 'Kamar #KDL23', 'Pendaftaran', 'OVO', 'Success', '2020-06-04', 500000),
(26, 'B6F0GT565K', 'toms', 'Kamar #KMD09', 'Pendaftaran', 'GOPAY', 'Success', '2020-06-05', 800000),
(27, '6ECF1FPAEB', 'toms', 'Kamar #KMD09', 'Pembayaran', 'GOPAY', 'Success', '2021-06-24', 800000);

-- --------------------------------------------------------

--
-- Table structure for table `penghuni`
--

CREATE TABLE `penghuni` (
  `id_penghuni` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('Inactive','New','Deactivated','Active') NOT NULL,
  `email` varchar(50) NOT NULL,
  `tgl_daftar` date DEFAULT NULL,
  `tgl_expired` date DEFAULT NULL,
  `id_kamar` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penghuni`
--

INSERT INTO `penghuni` (`id_penghuni`, `username`, `password`, `status`, `email`, `tgl_daftar`, `tgl_expired`, `id_kamar`) VALUES
(1, 'ridwan', '$2y$10$O36hQAVe.O07q47eMQeK7eIKtVVz7QBY4koFfe2WOq7fxdHjaL5aq', 'Active', 'admin@captrep.dev', '2020-05-07', '2021-08-07', 0),
(2, 'qw', '$2y$10$7uX9e25NQ9VoF.p/84Rq8u9G3fsRqsDowrd5AYEhQ9vlkcbM8jhay', 'Deactivated', '32', '2020-05-03', '2020-05-07', 0),
(6, 'dovi', '$2y$10$DVpBNHKB8v/qQT4.j4nwxe/262OkhnS0X1HmQpLMYZUpCX2DfSLDy', 'Deactivated', 'dovi@gmail.com', '2020-06-04', '2020-06-26', 1),
(7, 'toms', '$2y$10$D4.DJ0eoz.Tk1YA0zr1G8enhIOhLoE.R42/oPLnTJkbEeUXlBLJ.y', 'Active', 'toms@gmail.com', '2020-06-05', '2021-08-05', 3);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `username`, `nama`, `isi`, `foto`) VALUES
(1, 'ridwan', 'Ridduwan Ekaputra', 'Walaupun saya bapak kostnya tapi saya juga ngekost disini. Lucu kan lucu dong? ', '849-tommy.jpg'),
(3, 'toms', 'Ahmat Elon Mosque', 'Cozy banget sih kosannya, udah gitu emang bener banyak banget mamah muda dilingkungan kostnya', '592-elon.jpg'),
(4, 'dovi', 'Ahmad Mark Zuckerberg Putra', 'Walaupun kamar sebelah kasurnya suka berisik aku sih tetep santuy', '469-mark.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id_ticket` int(3) NOT NULL,
  `subjek` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `pembuat` varchar(50) NOT NULL,
  `status` enum('Opened','Closed') NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id_ticket`, `subjek`, `isi`, `pembuat`, `status`, `tanggal`, `jam`, `foto`) VALUES
(1, 'Testing', 'Testing', 'ridwan', 'Closed', '2020-06-11', '15:31:35', '849-tommy.jpg'),
(4, 'Testing dari user berbeda', 'Ini pesannya ', 'dovi', 'Closed', '2020-06-11', '16:52:47', '469-mark.jpg'),
(5, 'Konfirmasi tes', 'tes', 'toms', 'Opened', '2021-06-24', '11:28:17', '521-56338b7b-7f3b-47ae-9d2a-a43cd8eb1c94.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_reply`
--

CREATE TABLE `ticket_reply` (
  `id` int(3) NOT NULL,
  `id_ticket` int(3) NOT NULL,
  `reply` text NOT NULL,
  `pembalas` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket_reply`
--

INSERT INTO `ticket_reply` (`id`, `id_ticket`, `reply`, `pembalas`, `date`, `time`, `gambar`) VALUES
(2, 1, 'test', 'Ridduwan Ekaputra', '2020-06-11', '16:23:51', 'img/tommy.jpg'),
(3, 1, 'test balas user', 'ridwan', '2020-06-11', '16:38:40', '849-tommy.jpg'),
(4, 1, 'ini admin yang bls', 'Ridduwan Ekaputra', '2020-06-11', '16:46:15', 'img/tommy.jpg'),
(5, 4, 'Oke masuk cuy', 'Ridduwan Ekaputra', '2020-06-11', '16:53:05', 'img/tommy.jpg'),
(6, 4, 'tes bales lagi dari admin', 'Ridduwan Ekaputra', '2020-06-11', '16:58:14', 'img/tommy.jpg'),
(7, 4, 'tambahin tanggal sama jam ', 'Ridduwan Ekaputra', '2020-06-11', '17:20:15', 'img/tommy.jpg'),
(9, 4, 'tes balas tiket dari user', 'dovi', '2020-06-11', '20:48:56', '469-mark.jpg'),
(10, 1, 'ini test user yg bls', 'ridwan', '2020-06-11', '20:49:40', '849-tommy.jpg'),
(11, 5, 'tes', 'Ridduwan Ekaputra', '2021-06-24', '11:30:56', 'img/tommy.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `method`
--
ALTER TABLE `method`
  ADD PRIMARY KEY (`id_method`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `penghuni`
--
ALTER TABLE `penghuni`
  ADD PRIMARY KEY (`id_penghuni`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id_ticket`);

--
-- Indexes for table `ticket_reply`
--
ALTER TABLE `ticket_reply`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id_identitas` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `method`
--
ALTER TABLE `method`
  MODIFY `id_method` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `penghuni`
--
ALTER TABLE `penghuni`
  MODIFY `id_penghuni` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id_ticket` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ticket_reply`
--
ALTER TABLE `ticket_reply`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
