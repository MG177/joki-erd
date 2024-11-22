-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Nov 2024 pada 08.26
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bagian`
--

CREATE TABLE `tbl_bagian` (
  `id_bagian` int(10) NOT NULL,
  `bagian_nama` varchar(255) DEFAULT NULL,
  `lembaga_id` varchar(255) NOT NULL,
  `bagian_create` datetime DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_bagian`
--

INSERT INTO `tbl_bagian` (`id_bagian`, `bagian_nama`, `lembaga_id`, `bagian_create`, `user_id`) VALUES
(1, 'Pemimpin', 'XcArz9NxDaKYwZBkUiSkGNxopPrBPzTUXPRxF6h3e1l6oRmmOut9FZsCxmz68NDRbCnaYFQivSO2ZWdQTaDWHEFcBqXuIbeuK3lJfPINm3wneQ77O8Qgf2QRs0WTKpI28KX/7IHyFL8aihAQSnSnFWTlh2cufbiiNKvuT0', '2024-11-16 23:30:25', 2023010100001),
(2, 'Dept. Pelayanan Umum', 'XcArz9NxDaKYwZBkUiSkGNxopPrBPzTUXPRxF6h3e1l6oRmmOut9FZsCxmz68NDRbCnaYFQivSO2ZWdQTaDWHEFcBqXuIbeuK3lJfPINm3wneQ77O8Qgf2QRs0WTKpI28KX/7IHyFL8aihAQSnSnFWTlh2cufbiiNKvuT0', '2024-11-17 18:57:48', 2023010100001),
(3, 'Dept. Aset Fisik', 'XcArz9NxDaKYwZBkUiSkGNxopPrBPzTUXPRxF6h3e1l6oRmmOut9FZsCxmz68NDRbCnaYFQivSO2ZWdQTaDWHEFcBqXuIbeuK3lJfPINm3wneQ77O8Qgf2QRs0WTKpI28KX/7IHyFL8aihAQSnSnFWTlh2cufbiiNKvuT0', '2024-11-17 19:06:15', 2023010100001),
(205, 'Checker', 'XcArz9NxDaKYwZBkUiSkGNxopPrBPzTUXPRxF6h3e1l6oRmmOut9FZsCxmz68NDRbCnaYFQivSO2ZWdQTaDWHEFcBqXuIbeuK3lJfPINm3wneQ77O8Qgf2QRs0WTKpI28KX/7IHyFL8aihAQSnSnFWTlh2cufbiiNKvuT0', '2024-11-17 19:42:55', 2023010100007),
(5, 'Admin', 'XcArz9NxDaKYwZBkUiSkGNxopPrBPzTUXPRxF6h3e1l6oRmmOut9FZsCxmz68NDRbCnaYFQivSO2ZWdQTaDWHEFcBqXuIbeuK3lJfPINm3wneQ77O8Qgf2QRs0WTKpI28KX/7IHyFL8aihAQSnSnFWTlh2cufbiiNKvuT0', '2024-11-17 19:07:02', 2023010100001),
(6, 'Verifikator', 'XcArz9NxDaKYwZBkUiSkGNxopPrBPzTUXPRxF6h3e1l6oRmmOut9FZsCxmz68NDRbCnaYFQivSO2ZWdQTaDWHEFcBqXuIbeuK3lJfPINm3wneQ77O8Qgf2QRs0WTKpI28KX/7IHyFL8aihAQSnSnFWTlh2cufbiiNKvuT0', '2024-11-17 19:07:48', 2023010100001),
(204, 'Dept. Pengadaan', 'XcArz9NxDaKYwZBkUiSkGNxopPrBPzTUXPRxF6h3e1l6oRmmOut9FZsCxmz68NDRbCnaYFQivSO2ZWdQTaDWHEFcBqXuIbeuK3lJfPINm3wneQ77O8Qgf2QRs0WTKpI28KX/7IHyFL8aihAQSnSnFWTlh2cufbiiNKvuT0', '2024-11-17 19:08:05', 2023010100007);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lampiran`
--

CREATE TABLE `tbl_lampiran` (
  `id_lampiran` int(10) NOT NULL,
  `token_lampiran` varchar(100) NOT NULL,
  `nama_berkas` text,
  `ukuran` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_lampiran`
--

INSERT INTO `tbl_lampiran` (`id_lampiran`, `token_lampiran`, `nama_berkas`, `ukuran`) VALUES
(1, '26fb8130a1bf70931c4961ca56930914', '2024-11-16_SM_1731773073docx.docx', '710.44'),
(2, '1b1be36bbf2d1656d599f9d8912a6baa', '2024-11-17_SM_1731822570docx.docx', '710.44'),
(3, '6429346a790c3d592c6828bd9558234d', '2024-11-17_SM_1731845614pdf.pdf', '182.1'),
(4, 'f620bbb44fb59dfa9bb3f2bc0ed15dbf', '2024-11-17_SM_1731846754docx.docx', '750.33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lembaga`
--

CREATE TABLE `tbl_lembaga` (
  `id` int(2) NOT NULL,
  `id_lembaga` varchar(255) NOT NULL,
  `nm_lembaga` varchar(255) DEFAULT NULL,
  `telp` text,
  `alamat` text,
  `website` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tahun` int(4) DEFAULT NULL,
  `kabupaten` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `nm_kepala` varchar(255) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `lembaga_status` int(1) NOT NULL,
  `kop_1` text,
  `kop_2` text,
  `foto` varchar(255) DEFAULT NULL,
  `id_user` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_lembaga`
--

INSERT INTO `tbl_lembaga` (`id`, `id_lembaga`, `nm_lembaga`, `telp`, `alamat`, `website`, `email`, `tahun`, `kabupaten`, `provinsi`, `nm_kepala`, `nip`, `jabatan`, `lembaga_status`, `kop_1`, `kop_2`, `foto`, `id_user`) VALUES
(1, 'XcArz9NxDaKYwZBkUiSkGNxopPrBPzTUXPRxF6h3e1l6oRmmOut9FZsCxmz68NDRbCnaYFQivSO2ZWdQTaDWHEFcBqXuIbeuK3lJfPINm3wneQ77O8Qgf2QRs0WTKpI28KX/7IHyFL8aihAQSnSnFWTlh2cufbiiNKvuT0', 'Kantor Pusat PT. Bank SulutGo', 'Telp (0431) 888659', 'Jl. Pierre Tendean No. 100 Manado 95111 Sulawesi Utara, Indonesia', 'www.banksulutgo.co.id', 'customercare@banksulutgo.co.id', 2024, 'Manado', 'Sulawesi Utara', 'Noldy Dandel', '1', 'Pemimpin Divisi', 1, 'KANTOR PUSAT PT. BANK SULUTGO', 'PT. BANK SULUTGO', 'logobsg.png', 2023010100007);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ska`
--

CREATE TABLE `tbl_ska` (
  `id_ska` int(11) NOT NULL,
  `ska_no_awal` varchar(10255) DEFAULT NULL,
  `ska_no_urut` varchar(255) DEFAULT NULL,
  `ska_no_surat` varchar(255) DEFAULT NULL,
  `ska_lampiran` varchar(255) DEFAULT NULL,
  `ska_sifat` varchar(255) DEFAULT NULL,
  `ska_hal` varchar(255) DEFAULT NULL,
  `ska_tanggal` date DEFAULT NULL,
  `ska_kpd` text,
  `ska_text_pembuka` text,
  `ska_isi` text,
  `ska_text_penutup` text,
  `ska_tembusan` text,
  `ska_jenis` int(11) DEFAULT NULL,
  `ska_bagian` int(11) DEFAULT NULL,
  `ska_dibaca` int(1) DEFAULT NULL,
  `ska_tgl_kasi` date DEFAULT NULL,
  `ska_tgl_ktu` date DEFAULT NULL,
  `ska_tgl_kepala` date DEFAULT NULL,
  `ska_kasi_ctt` text,
  `ska_ktu_ctt` text,
  `ska_kepala_ctt` text,
  `ska_create` datetime DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ska`
--

INSERT INTO `tbl_ska` (`id_ska`, `ska_no_awal`, `ska_no_urut`, `ska_no_surat`, `ska_lampiran`, `ska_sifat`, `ska_hal`, `ska_tanggal`, `ska_kpd`, `ska_text_pembuka`, `ska_isi`, `ska_text_penutup`, `ska_tembusan`, `ska_jenis`, `ska_bagian`, `ska_dibaca`, `ska_tgl_kasi`, `ska_tgl_ktu`, `ska_tgl_kepala`, `ska_kasi_ctt`, `ska_ktu_ctt`, `ska_kepala_ctt`, `ska_create`, `user_id`) VALUES
(1, '17', '001', '2', '1', 'penting', 'Pemberitahuan', '2024-11-17', 'Pemimpin Cab. Ratahan', NULL, '<p>1</p>\r\n\r\n<p>1</p>\r\n\r\n<p>1</p>\r\n\r\n<p>1</p>\r\n\r\n<p>1</p>\r\n', NULL, '-', 2, 2, 1, '2024-11-17', '2024-11-17', '2024-11-17', 'TL', 'izin pak, ini pemberitahuan ttg ITE', '', '2024-11-17 19:36:47', 2023010100026);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sm`
--

CREATE TABLE `tbl_sm` (
  `id_sm` bigint(20) NOT NULL,
  `sm_no_urut` text,
  `sm_penerima` text,
  `sm_tgl_diterima` date DEFAULT NULL,
  `sm_sifat` varchar(255) DEFAULT NULL,
  `sm_no_surat_asal` text,
  `sm_tgl_surat` date DEFAULT NULL,
  `sm_pengirim` text,
  `sm_perihal` text,
  `sm_lampiran` varchar(255) DEFAULT NULL,
  `sm_status` varchar(255) DEFAULT NULL,
  `token_lampiran` varchar(255) DEFAULT NULL,
  `sm_tgl_ajuan` date DEFAULT NULL,
  `sm_ktu_ctt` text,
  `sm_segera` text,
  `sm_biasa` text,
  `sm_catatan` text,
  `sm_bagian` int(2) DEFAULT NULL,
  `sm_tgl_kepala` date DEFAULT NULL,
  `sm_tgl_disposisi` date DEFAULT NULL,
  `sm_disposisi` text,
  `sm_kasi_ctt` text,
  `sm_dibaca` int(1) DEFAULT NULL,
  `sm_create` datetime NOT NULL,
  `user_id` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_sm`
--

INSERT INTO `tbl_sm` (`id_sm`, `sm_no_urut`, `sm_penerima`, `sm_tgl_diterima`, `sm_sifat`, `sm_no_surat_asal`, `sm_tgl_surat`, `sm_pengirim`, `sm_perihal`, `sm_lampiran`, `sm_status`, `token_lampiran`, `sm_tgl_ajuan`, `sm_ktu_ctt`, `sm_segera`, `sm_biasa`, `sm_catatan`, `sm_bagian`, `sm_tgl_kepala`, `sm_tgl_disposisi`, `sm_disposisi`, `sm_kasi_ctt`, `sm_dibaca`, `sm_create`, `user_id`) VALUES
(3, '1', 'Internal', '2024-11-15', 'Segera', '001', '2024-11-15', 'Dept Aset Fisik', 'Permohonan Pembayaran Pajak Bumi ', '1 lampiran', 'Asli', '6429346a790c3d592c6828bd9558234d', '2024-11-17', '', 'Selesaikan', 'Ingat', 'segera bayar!', 2, '2024-11-17', '2024-11-17', '2023010100022;2023010100023;2023010100026', 'segara, P1', 4, '2024-11-17 19:11:34', 2023010100022),
(4, '2', 'Divisi', '2024-11-17', 'Segera', '12', '2024-11-16', 'Div. Human Capital', 'Peminjaman Kendaraan', '1 lampiran', 'Asli', 'f620bbb44fb59dfa9bb3f2bc0ed15dbf', '2024-11-17', '', 'Tindak lanjuti', 'Bicarakan bersama', 'avanza saja', 2, '2024-11-17', '2024-11-17', '2023010100028', '', 4, '2024-11-17 19:11:34', 2023010100022);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` bigint(20) NOT NULL,
  `lembaga_id` varchar(255) NOT NULL,
  `pegawai_nama` varchar(255) DEFAULT NULL,
  `pegawai_tempat_lahir` varchar(255) DEFAULT NULL,
  `pegawai_tanggal_lahir` date DEFAULT NULL,
  `pegawai_jk` varchar(1) DEFAULT NULL,
  `pegawai_pdd` varchar(255) DEFAULT NULL,
  `pegawai_telp` varchar(13) DEFAULT NULL,
  `pegawai_email` varchar(255) DEFAULT NULL,
  `pegawai_foto` varchar(255) DEFAULT NULL,
  `pegawai_alamat` text,
  `pegawai_jenis` int(1) DEFAULT NULL,
  `pegawai_pangkat` varchar(255) DEFAULT NULL,
  `pegawai_nip` varchar(255) DEFAULT NULL,
  `pegawai_password` text NOT NULL,
  `pegawai_level` enum('admin','petugas','ktu','kepala','kasi','staf','jfu') DEFAULT NULL,
  `pegawai_status` int(1) DEFAULT NULL,
  `pegawai_create` datetime DEFAULT NULL,
  `pegawai_login` datetime DEFAULT NULL,
  `bagian_id` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `lembaga_id`, `pegawai_nama`, `pegawai_tempat_lahir`, `pegawai_tanggal_lahir`, `pegawai_jk`, `pegawai_pdd`, `pegawai_telp`, `pegawai_email`, `pegawai_foto`, `pegawai_alamat`, `pegawai_jenis`, `pegawai_pangkat`, `pegawai_nip`, `pegawai_password`, `pegawai_level`, `pegawai_status`, `pegawai_create`, `pegawai_login`, `bagian_id`) VALUES
(2023010100007, '', 'Admin', 'Manado', '1995-01-10', 'L', '10', NULL, 'admin@admin.com', NULL, NULL, 1, '17', '1', '356a192b7913b04c54574d18c28d46e6395428ab', 'admin', 1, '2023-01-22 21:50:57', '2024-11-19 14:08:18', 200),
(2023010100022, 'XcArz9NxDaKYwZBkUiSkGNxopPrBPzTUXPRxF6h3e1l6oRmmOut9FZsCxmz68NDRbCnaYFQivSO2ZWdQTaDWHEFcBqXuIbeuK3lJfPINm3wneQ77O8Qgf2QRs0WTKpI28KX/7IHyFL8aihAQSnSnFWTlh2cufbiiNKvuT0', 'Utu Ass. Ops', 'Manado', '1986-03-19', 'L', '9', '0812312321', 'utu@gmail.com', NULL, 'Dalam Goa, Utang', 1, '1', '4080139001', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'petugas', 1, '2024-11-16 23:35:41', '2024-11-17 19:53:45', 5),
(2023010100023, 'XcArz9NxDaKYwZBkUiSkGNxopPrBPzTUXPRxF6h3e1l6oRmmOut9FZsCxmz68NDRbCnaYFQivSO2ZWdQTaDWHEFcBqXuIbeuK3lJfPINm3wneQ77O8Qgf2QRs0WTKpI28KX/7IHyFL8aihAQSnSnFWTlh2cufbiiNKvuT0', 'Mince Sekretaris', 'Kotamobagu', '1988-01-02', 'P', '10', '0823423421', 'mince@gmail.com', NULL, 'Tengah Utang, Elim', 1, '1', '4080139002', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'ktu', 1, '2024-11-17 19:45:46', '2024-11-17 19:53:04', 6),
(2023010100024, 'XcArz9NxDaKYwZBkUiSkGNxopPrBPzTUXPRxF6h3e1l6oRmmOut9FZsCxmz68NDRbCnaYFQivSO2ZWdQTaDWHEFcBqXuIbeuK3lJfPINm3wneQ77O8Qgf2QRs0WTKpI28KX/7IHyFL8aihAQSnSnFWTlh2cufbiiNKvuT0', 'Oskar Pemimpin', 'Tomohon', '1977-12-03', 'L', '10', '0899978721', 'oskar@gmail.com', NULL, 'Dekat Rumah, Impian', 1, '1', '4080139003', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'kepala', 1, '2024-11-16 23:35:51', '2024-11-17 22:02:49', 1),
(2023010100025, 'XcArz9NxDaKYwZBkUiSkGNxopPrBPzTUXPRxF6h3e1l6oRmmOut9FZsCxmz68NDRbCnaYFQivSO2ZWdQTaDWHEFcBqXuIbeuK3lJfPINm3wneQ77O8Qgf2QRs0WTKpI28KX/7IHyFL8aihAQSnSnFWTlh2cufbiiNKvuT0', 'Spreko si Pemimpin Departmen', 'Manado', '1989-03-03', 'L', '9', '0823243422', 'spreko@gmail.com', NULL, '', 1, '1', '4080139004', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'kasi', 1, '2024-11-17 19:09:29', '2024-11-17 19:55:12', 2),
(2023010100026, 'XcArz9NxDaKYwZBkUiSkGNxopPrBPzTUXPRxF6h3e1l6oRmmOut9FZsCxmz68NDRbCnaYFQivSO2ZWdQTaDWHEFcBqXuIbeuK3lJfPINm3wneQ77O8Qgf2QRs0WTKpI28KX/7IHyFL8aihAQSnSnFWTlh2cufbiiNKvuT0', 'Elzio Pegawai', 'Manado', '1996-11-09', 'L', '8', '0892832324', 'elzio@gmail.com', NULL, 'Dekat Keyboard, Kunci', 1, '1', '4080139005', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'staf', 1, '2024-11-17 19:08:56', '2024-11-17 20:51:26', 2),
(2023010100028, 'XcArz9NxDaKYwZBkUiSkGNxopPrBPzTUXPRxF6h3e1l6oRmmOut9FZsCxmz68NDRbCnaYFQivSO2ZWdQTaDWHEFcBqXuIbeuK3lJfPINm3wneQ77O8Qgf2QRs0WTKpI28KX/7IHyFL8aihAQSnSnFWTlh2cufbiiNKvuT0', 'Ceni Analis', 'Tomohon', '1989-11-05', 'P', '10', '0829000032', 'ceni@gmail.com', NULL, 'Hutan Angker, Kelo', 1, '1', '4080139006', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'jfu', 1, '2024-11-17 19:43:05', '2024-11-17 20:37:16', 205);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_bagian`
--
ALTER TABLE `tbl_bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indeks untuk tabel `tbl_lampiran`
--
ALTER TABLE `tbl_lampiran`
  ADD PRIMARY KEY (`id_lampiran`);

--
-- Indeks untuk tabel `tbl_lembaga`
--
ALTER TABLE `tbl_lembaga`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_ska`
--
ALTER TABLE `tbl_ska`
  ADD PRIMARY KEY (`id_ska`);

--
-- Indeks untuk tabel `tbl_sm`
--
ALTER TABLE `tbl_sm`
  ADD PRIMARY KEY (`id_sm`);

--
-- Indeks untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_bagian`
--
ALTER TABLE `tbl_bagian`
  MODIFY `id_bagian` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT untuk tabel `tbl_lampiran`
--
ALTER TABLE `tbl_lampiran`
  MODIFY `id_lampiran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_lembaga`
--
ALTER TABLE `tbl_lembaga`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_ska`
--
ALTER TABLE `tbl_ska`
  MODIFY `id_ska` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_sm`
--
ALTER TABLE `tbl_sm`
  MODIFY `id_sm` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2023010100029;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
