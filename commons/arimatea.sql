-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Nov 2022 pada 17.41
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arimatea`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `coffins`
--

CREATE TABLE `coffins` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bahan` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `path` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `coffins`
--

INSERT INTO `coffins` (`id`, `nama`, `bahan`, `deskripsi`, `path`) VALUES
(21, 'Peti Jati', 'Bukan Jati', 'test', ''),
(26, 'Verona Coklat 8 Dewa', '', '', ''),
(27, 'Verona Coklat Polos', '', '', ''),
(28, 'Verona Putih Salib Perjamuan', '', '', ''),
(29, 'Yokohama Coklat 8 Dewa Kaca', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `pesan` text NOT NULL,
  `tanggal_kirim` datetime DEFAULT current_timestamp(),
  `nohp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `contacts`
--

INSERT INTO `contacts` (`id`, `nama`, `pesan`, `tanggal_kirim`, `nohp`) VALUES
(1, 'test', 'test', '2022-11-10 09:51:20', 'test'),
(2, 'test', 'test', '2022-11-10 09:51:23', 'test'),
(3, 'test', 'test', '2022-11-10 09:51:37', 'test'),
(4, 'Rio', 'hello', '2022-11-11 04:04:57', '0000000000'),
(5, 'Rio', 'hello', '2022-11-11 04:05:15', '0000000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `faq`
--

INSERT INTO `faq` (`id`, `pertanyaan`, `jawaban`) VALUES
(3, 'test', 'testtttt');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `path` text NOT NULL,
  `id_Parent_Coffins` int(11) DEFAULT NULL,
  `id_Parent_Services` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pictures`
--

INSERT INTO `pictures` (`id`, `path`, `id_Parent_Coffins`, `id_Parent_Services`) VALUES
(12, '../assets/img/peti_jati.png', 20, 0),
(14, '../assets/img/peti_jati.png', 21, 0),
(15, '../assets/img/146865_620.jpg', 22, 0),
(16, '../assets/img/146865_620.jpg', 0, 7),
(17, '../assets/img/bg tionghoa iwan.jpg', 0, 7),
(19, '../assets/img/146865_620.jpg', 0, 8),
(22, '../assets/img/ambulanArimatea.jpeg', 0, 10),
(29, '../assets/img/dekor1.jpg', 0, 13),
(30, '../assets/img/dekor2.jpg', 0, 13),
(35, '../assets/img/verona_coklat_8_dewa-removebg-preview.png', 26, 0),
(36, '../assets/img/verona_peti_coklat_polos-removebg-preview.png', 27, 0),
(37, '../assets/img/verona_putih_salib_perjamuan-removebg-preview.png', 28, 0),
(38, '../assets/img/yokohama_coklat_8_dewa_kaca-removebg-preview.png', 29, 0),
(39, '../assets/img/pemakaman_arimatea.jpeg', 0, 17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `privileges`
--

CREATE TABLE `privileges` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `privileges`
--

INSERT INTO `privileges` (`id`, `name`) VALUES
(1, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `path1` text DEFAULT NULL,
  `path2` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `services`
--

INSERT INTO `services` (`id`, `judul`, `deskripsi`, `path1`, `path2`) VALUES
(10, 'Ambulan Antar dan Jemput Jenasah', 'Ambulan Arimatea dapat menjemput dan mengantar jenasah, dalam dan luar kota seputar Jawa Tengah', '', ''),
(12, 'Pengiriman Jenasah dalam dan Luar Negeri', 'Arimatea secara profesional dapat melakukan dekor terhadap rumah tempat persinggahan terakhir jenasah', '', ''),
(13, 'Dekor', 'Arimatea secara profesional dapat melakukan dekor terhadap rumah tempat persinggahan terakhir jenasah', '../assets/img/dekor1.jpg', '../assets/img/dekor2.jpg'),
(16, 'Krematorium', 'Arimatea bekerjasama dengan krematorium _________, sehingga Arimatea dapat dengan mudah membantu anda memesan ruang kremasi apabila membutuhkan.', '', ''),
(17, 'Taman Pemakaman', 'Arimatea menyediakan tempat peristirahatan penuh damai. Lokasi strategis di perbukitan Kedungmundu dengan pemandangan menghadapt laut.', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_depan` varchar(255) NOT NULL,
  `nama_belakang` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `privilege_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama_depan`, `nama_belakang`, `no_hp`, `privilege_id`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'nama', 'lengkap', '0000000000', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `coffins`
--
ALTER TABLE `coffins`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_parent_gambar_service` (`id_Parent_Coffins`),
  ADD KEY `fk_parent_service` (`id_Parent_Services`);

--
-- Indeks untuk tabel `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `privilege_key` (`privilege_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `coffins`
--
ALTER TABLE `coffins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `privileges`
--
ALTER TABLE `privileges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `privilege_key` FOREIGN KEY (`privilege_id`) REFERENCES `privileges` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
