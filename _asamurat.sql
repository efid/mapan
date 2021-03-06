# --------------------------------------------------------
# Host:                         127.0.0.1
# Server version:               5.6.20
# Server OS:                    Win32
# HeidiSQL version:             6.0.0.3603
# Date/time:                    2017-11-24 20:00:31
# --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

# Dumping structure for table asamurat.ref_klasifikasi
CREATE TABLE IF NOT EXISTS `ref_klasifikasi` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `uraian` mediumtext NOT NULL,
  `format` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

# Dumping data for table asamurat.ref_klasifikasi: ~8 rows (approximately)
/*!40000 ALTER TABLE `ref_klasifikasi` DISABLE KEYS */;
INSERT INTO `ref_klasifikasi` (`id`, `kode`, `nama`, `uraian`, `format`) VALUES
	(1, '11', 'NOTA DINAS', 'Digunakan untuk mencatat Nota Dinas ', 'WPB.15/KP.01/2017'),
	(2, '12', 'SURAT', 'Digunakan untuk mencatat Surat masuk dan keluar', 'WPB.15/KP.01/2017'),
	(3, '13', 'SURAT TUGAS', 'Surat Tugas yang diterima dan dikeluarkan oleh KPPN', 'WPB.15/KP.01/2017'),
	(4, '14', 'SURAT PENGANTAR', 'Digunakan untuk mencatat Surat Pengantar', 'WPB.15/KP.01/2017'),
	(5, '15', 'UNDANGAN', 'Undangan yang dikirim dan diterima oleh KPPN', 'WPB.15/KP.01/2017'),
	(6, '16', 'SURAT RAHASIA', 'Surat yang bersifat Rahasia', 'WPB.15/KP.01/2017'),
	(7, '17', 'TAGIHAN', 'Tagihan yang diterima dan dikirim oleh instansi', 'WPB.15/KP.01/2017'),
	(8, '18', 'PENAWARAN', 'Penawaran yang diterima dan dikirim oleh instansi', 'WPB.15/KP.01/2017');
/*!40000 ALTER TABLE `ref_klasifikasi` ENABLE KEYS */;


# Dumping structure for table asamurat.tr_instansi
CREATE TABLE IF NOT EXISTS `tr_instansi` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kepsek` varchar(100) NOT NULL,
  `nip_kepsek` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

# Dumping data for table asamurat.tr_instansi: ~0 rows (approximately)
/*!40000 ALTER TABLE `tr_instansi` DISABLE KEYS */;
INSERT INTO `tr_instansi` (`id`, `nama`, `alamat`, `kepsek`, `nip_kepsek`, `logo`) VALUES
	(1, 'Kantor Pelayanan Perbendaharaan Negara Manna', 'Jl. Raya Manna No. 76, Kec. Kota Manna, Kab. Bengkulu Selatan, BENGKULU', 'Drs. Iman Santosa', '198508252006021002', 'logo2Bdepkeu2Bsparasi1.jpg');
/*!40000 ALTER TABLE `tr_instansi` ENABLE KEYS */;


# Dumping structure for table asamurat.t_admin
CREATE TABLE IF NOT EXISTS `t_admin` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(75) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `level` enum('Super Admin','KK','Kasi','Staf','Umum') NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

# Dumping data for table asamurat.t_admin: ~11 rows (approximately)
/*!40000 ALTER TABLE `t_admin` DISABLE KEYS */;
INSERT INTO `t_admin` (`id`, `username`, `password`, `nip`, `level`, `created_date`, `deleted`) VALUES
	(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '198508252006021001', 'Super Admin', '2017-11-06 17:02:08', '0'),
	(2, 'umum', 'adfab9c56b8b16d6c067f8d3cff8818e', '198508252006021002', 'Umum', '2017-11-06 17:02:08', '0'),
	(3, 'kasi2', 'e00cf25ad42683b3df678c61f42c6bda', '198508252006021003', 'Kasi', '2017-11-06 17:02:08', '0'),
	(4, 'kk', 'dc468c70fb574ebd07287b38d0d0676d', '198508252006021004', 'KK', '2017-11-06 17:02:08', '0'),
	(7, 'kasi3', 'e00cf25ad42683b3df678c61f42c6bda', '198508252006021005', 'Kasi', '2017-11-06 17:02:08', '0'),
	(8, 'kasi4', '111226c6a6cb6658833b6ad023e4d0e0', '198508252006021006', 'Kasi', '2017-11-06 17:02:08', '0'),
	(9, 'kasubbag', '341ae348cafae81f3647b0de71eed9e3', '198508252006021007', 'Kasi', '2017-11-06 17:02:08', '0'),
	(10, 'wijanarko', '49474fbb6b0cbed7d6cc801985241634', '198508252006021008', 'Staf', '2017-11-06 17:02:08', '0'),
	(11, 'efid', '1e3235258d1aa505a2572af2b7877ebf', '198508252006021001', 'Staf', '2017-11-06 17:10:33', '0'),
	(12, 'vera', '4341dfaa7259082022147afd371b69c3', '198508252006021010', 'Staf', '2017-11-07 14:33:16', '1'),
	(13, 'vera', '4341dfaa7259082022147afd371b69c3', '198508252006021010', 'Staf', '2017-11-07 14:54:22', '0'),
	(14, 'jamil', '0e2cc23df7e37a854499f9d918b0219d', 'jamil', 'Umum', '2017-11-07 16:07:55', '1'),
	(15, 'jamil', '0e2cc23df7e37a854499f9d918b0219d', '198508252006021003', 'Umum', '2017-11-07 16:10:01', '0');
/*!40000 ALTER TABLE `t_admin` ENABLE KEYS */;


# Dumping structure for table asamurat.t_disposisi
CREATE TABLE IF NOT EXISTS `t_disposisi` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `id_surat` int(6) NOT NULL,
  `kpd_yth` varchar(250) NOT NULL,
  `isi_disposisi` varchar(250) NOT NULL,
  `tgl_disposisi1` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sifat` enum('Biasa','Segera','Perlu Perhatian Khusus','Perhatian Batas Waktu') NOT NULL,
  `batas_waktu` date NOT NULL,
  `catatan` varchar(250) NOT NULL,
  `nip_pelaksana` varchar(250) NOT NULL,
  `tgl_disposisi2` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tgl_selesai` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `selesai` varchar(250) NOT NULL,
  `deleted` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

# Dumping data for table asamurat.t_disposisi: ~27 rows (approximately)
/*!40000 ALTER TABLE `t_disposisi` DISABLE KEYS */;
INSERT INTO `t_disposisi` (`id`, `id_surat`, `kpd_yth`, `isi_disposisi`, `tgl_disposisi1`, `sifat`, `batas_waktu`, `catatan`, `nip_pelaksana`, `tgl_disposisi2`, `tgl_selesai`, `selesai`, `deleted`) VALUES
	(1, 1, 'Seksi Verifikasi dan Akuntansi', 'ditindaklanjuti', '2017-11-22 10:22:53', 'Biasa', '2017-01-30', '', '198508252006021011', '2017-01-30 14:49:33', '2017-01-30 14:49:33', 'dedede', '0'),
	(2, 2, 'Seksi Perbendaharaan', 'Selesaikan', '2017-11-22 10:14:57', 'Biasa', '2017-01-22', '', '198508252006021012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0'),
	(3, 2, 'Seksi Perbendaharaan', 'Selesaikan', '2017-11-22 10:14:58', 'Biasa', '2017-01-22', '', '198508252006021011', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0'),
	(4, 3, 'Seksi Perbendaharaan', 'Segera Rapatkan', '2017-11-22 10:15:18', 'Segera', '2017-01-22', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0'),
	(5, 2, 'Seksi Bank Giro Pos', '2asd', '2017-11-22 10:15:19', 'Biasa', '2017-01-22', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0'),
	(6, 14, 'Sub Bagian Umum', 'Selesaikan', '2017-11-22 10:26:11', 'Biasa', '2017-04-22', 'laksanakan', '198508252006021011', '2017-04-22 09:23:19', '2017-04-23 09:23:19', 'sudah diselesaikan', '0'),
	(7, 7, 'Sub Bagian Umum', 'Selesaikan', '2017-11-22 10:25:56', 'Biasa', '2017-02-22', '', '198508252006021009', '2017-02-23 15:44:24', '2017-02-23 15:44:24', 'Sudah ditindaklanjuti', '0'),
	(8, 14, 'Seksi Perbendaharaan', 'masukkan', '2017-11-22 10:17:17', 'Segera', '2017-04-22', 'tidak ada catatan', '198508252006021013', '2017-11-06 09:23:19', '0000-00-00 00:00:00', '', '0'),
	(9, 14, 'Seksi Verifikasi dan Akuntansi', 'diskusikan', '2017-11-22 10:17:18', 'Perlu Perhatian Khusus', '2017-04-22', 'belum ada', '198508252006021012', '2017-11-06 09:23:19', '0000-00-00 00:00:00', '', '0'),
	(10, 13, 'Sub Bagian Umum', 'sa', '2017-11-22 10:26:01', 'Biasa', '2017-04-22', 'asasa', '198508252006021002', '2017-04-23 09:23:19', '2017-04-23 09:23:19', 'Sudah dibalas dengan surat tanggal xxx', '0'),
	(11, 16, 'Sub Bagian Umum', 'Diskusikan', '2017-11-22 10:23:27', 'Biasa', '2017-06-22', '', '198508252006021008', '2017-06-23 16:33:23', '2017-06-23 16:33:23', 'Sudah disampaikan kepada Satuan Kerja', '0'),
	(12, 18, 'Seksi Perbendaharaan', 'Selesaikan', '2017-11-22 10:23:36', 'Biasa', '2017-06-22', '', '198508252006021008', '2017-06-23 16:33:23', '2017-06-23 16:33:23', 'sudah diselesaikan', '0'),
	(13, 18, 'Seksi Verifikasi dan Akuntansi', 'Lanjutkan', '2017-11-22 10:23:43', 'Segera', '2017-06-22', '', '198508252006021008', '2017-06-22 16:33:23', '2017-06-22 16:33:23', 'sudah diselesaikan', '0'),
	(14, 18, 'Seksi Verifikasi dan Akuntansi', 'Beri Penjelasan', '2017-11-22 10:24:02', 'Segera', '2017-06-22', '', '198508252006021008', '2017-06-22 16:33:23', '2017-06-22 16:33:23', 'sudah diselesaikan', '0'),
	(15, 19, 'Sub Bagian Umum', 'Beri penjelasan', '2017-11-22 10:24:03', 'Biasa', '2017-06-22', '', '198508252006021008', '2017-06-22 16:33:23', '2017-06-22 16:33:23', 'sudah diselesaikan', '0'),
	(16, 20, 'Seksi Bank Giro Pos', 'Lanjutkan', '2017-11-22 10:23:55', 'Biasa', '2017-07-22', '', '198508252006021008', '2017-07-22 16:33:23', '2017-07-22 16:33:23', 'sudah diselesaikan', '0'),
	(17, 31, 'Seksi Verifikasi dan Akuntansi', 'lanjutkan', '2017-11-22 10:20:58', 'Biasa', '2017-09-17', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '1'),
	(18, 31, 'Seksi Perbendaharaan', 'Koordinasikan', '2017-11-22 10:20:59', 'Segera', '2017-09-17', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '1'),
	(19, 31, 'Seksi Perbendaharaan', 'lanjutkan', '2017-11-22 10:20:59', 'Segera', '2017-09-17', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '1'),
	(20, 31, 'Seksi Perbendaharaan', 'laksanakan', '2017-11-22 10:20:59', 'Segera', '2017-09-17', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '1'),
	(21, 31, 'Seksi Perbendaharaan', 'laksanakan bro', '2017-11-22 10:21:00', 'Segera', '2017-09-17', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0'),
	(22, 31, 'Sub Bagian Umum', 'Sesuaikan', '2017-11-22 10:21:00', 'Perlu Perhatian Khusus', '2017-09-17', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '1'),
	(23, 31, 'Sub Bagian Umum', 'Koordinasikan dengan Kepala Seksi Bank Giro Pos', '2017-11-22 10:24:16', 'Perlu Perhatian Khusus', '2017-09-17', '', '198508252006021001', '2017-09-20 14:42:58', '2017-09-20 14:42:58', '', '0'),
	(24, 31, 'Seksi Perbendaharaan', 'Lasanakan segera', '2017-11-22 10:21:01', 'Segera', '2017-09-17', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0'),
	(25, 31, 'Seksi Bank Giro Pos', 'Lanjutkan', '2017-11-22 10:21:02', 'Segera', '2017-09-17', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0'),
	(26, 30, 'Seksi Perbendaharaan', 'Konsultasikan dengan subbag umum', '2017-11-22 10:20:21', 'Perlu Perhatian Khusus', '2017-09-17', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0'),
	(27, 29, 'Seksi Perbendaharaan', 'Koordinasikan', '2017-11-22 10:18:55', 'Segera', '2017-08-22', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0'),
	(28, 32, 'Sub Bagian Umum', 'Tugaskan pegawai an efid dwi agustono', '2017-11-22 10:24:25', 'Segera', '2017-10-17', '', '198508252006021001', '2017-07-20 14:50:45', '0000-00-00 00:00:00', '', '0'),
	(29, 33, 'Sub Bagian Umum', 'Koordinasikan dengan seksi vera', '2017-11-22 09:59:25', 'Biasa', '2017-11-24', '', '198508252006021001', '2017-11-21 06:12:13', '2017-11-22 09:59:25', 'ok', '0'),
	(30, 33, 'Seksi Perbendaharaan', 'Laksanakan', '2017-11-21 06:09:21', 'Segera', '2017-11-20', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0'),
	(31, 33, 'Seksi Bank Giro Pos', 'adsda', '2017-11-22 09:34:06', 'Biasa', '2017-11-21', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0'),
	(32, 30, 'Seksi Verifikasi dan Akuntansi', 'asdasda', '2017-11-22 10:20:22', 'Perlu Perhatian Khusus', '2017-09-17', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0'),
	(33, 34, 'Sub Bagian Umum', 'Sampaikan data', '2017-11-22 10:35:04', 'Segera', '2017-11-20', '', '198508252006021001', '2017-11-22 10:34:31', '2017-11-22 10:35:04', 'Sudah ditindaklanjuti dengan surat balasan', '0'),
	(34, 36, 'Sub Bagian Umum', 'Siapkan laporan dimaksud', '2017-11-24 19:54:40', 'Segera', '2017-11-25', '', '198508252006021001', '2017-11-24 19:53:00', '2017-11-24 19:54:40', 'Sudah dilaporkan dengan', '0');
/*!40000 ALTER TABLE `t_disposisi` ENABLE KEYS */;


# Dumping structure for table asamurat.t_golongan
CREATE TABLE IF NOT EXISTS `t_golongan` (
  `kdgol` varchar(2) NOT NULL DEFAULT '',
  `nmgol1` varchar(5) NOT NULL DEFAULT '',
  `nmgol2` varchar(60) NOT NULL DEFAULT '',
  `kdkelgapok` varchar(2) NOT NULL DEFAULT '',
  KEY `T_GOL1` (`kdgol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table asamurat.t_golongan: ~34 rows (approximately)
/*!40000 ALTER TABLE `t_golongan` DISABLE KEYS */;
INSERT INTO `t_golongan` (`kdgol`, `nmgol1`, `nmgol2`, `kdkelgapok`) VALUES
	('11', 'I/a', 'Juru Muda', '1A'),
	('12', '1/b', 'Juru Muda Tk.I', '1B'),
	('13', 'I/c', 'Juru', '1C'),
	('14', 'I/d', 'Juru Tingkat I', '1D'),
	('21', 'II/a', 'Pengatur Muda', '2A'),
	('22', 'II/b', 'Pengatur Muda Tk.I', '2B'),
	('23', 'II/c', 'Pengatur', '2C'),
	('24', 'II/d', 'Pengatur Tk.I', '2D'),
	('31', 'III/a', 'Penata Muda', '3A'),
	('32', 'III/b', 'Penata Muda Tk.I', '3B'),
	('33', 'III/c', 'Penata', '3C'),
	('34', 'III/d', 'Penata Tk.I', '3D'),
	('41', 'IV/a', 'Pembina', '4A'),
	('42', 'IV/b', 'Pembina Tk.I', '4B'),
	('43', 'IV/c', 'Pembina Utama Muda', '4C'),
	('44', 'IV/d', 'Pembina Utama Madya', '4D'),
	('45', 'IV/e', 'Pembina Utama', '4E'),
	('11', 'I/a', 'Juru Muda', '1A'),
	('12', '1/b', 'Juru Muda Tk.I', '1B'),
	('13', 'I/c', 'Juru', '1C'),
	('14', 'I/d', 'Juru Tingkat I', '1D'),
	('21', 'II/a', 'Pengatur Muda', '2A'),
	('22', 'II/b', 'Pengatur Muda Tk.I', '2B'),
	('23', 'II/c', 'Pengatur', '2C'),
	('24', 'II/d', 'Pengatur Tk.I', '2D'),
	('31', 'III/a', 'Penata Muda', '3A'),
	('32', 'III/b', 'Penata Muda Tk.I', '3B'),
	('33', 'III/c', 'Penata', '3C'),
	('34', 'III/d', 'Penata Tk.I', '3D'),
	('41', 'IV/a', 'Pembina', '4A'),
	('42', 'IV/b', 'Pembina Tk.I', '4B'),
	('43', 'IV/c', 'Pembina Utama Muda', '4C'),
	('44', 'IV/d', 'Pembina Utama Madya', '4D'),
	('45', 'IV/e', 'Pembina Utama', '4E');
/*!40000 ALTER TABLE `t_golongan` ENABLE KEYS */;


# Dumping structure for table asamurat.t_jabatan
CREATE TABLE IF NOT EXISTS `t_jabatan` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `kd_jabatan` varchar(15) NOT NULL,
  `nm_jabatan` varchar(75) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

# Dumping data for table asamurat.t_jabatan: ~3 rows (approximately)
/*!40000 ALTER TABLE `t_jabatan` DISABLE KEYS */;
INSERT INTO `t_jabatan` (`id`, `kd_jabatan`, `nm_jabatan`) VALUES
	(1, '0', 'Kepala Kantor'),
	(2, '1', 'Kepala Seksi'),
	(6, '2', 'Pelaksana');
/*!40000 ALTER TABLE `t_jabatan` ENABLE KEYS */;


# Dumping structure for table asamurat.t_pegawai
CREATE TABLE IF NOT EXISTS `t_pegawai` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `seksi` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `eselon` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

# Dumping data for table asamurat.t_pegawai: ~10 rows (approximately)
/*!40000 ALTER TABLE `t_pegawai` DISABLE KEYS */;
INSERT INTO `t_pegawai` (`id`, `nama`, `nip`, `seksi`, `jabatan`, `eselon`, `email`, `create_date`, `deleted`) VALUES
	(2, 'Efid Dwi Agustono', '198508252006021001', 'Sub Bagian Umum', 'Pelaksana', '0', 'efid.agustono@gmail.com', '2017-11-24 11:24:43', '0'),
	(3, 'Anton Wibowo', '198508252006021002', 'Sub Bagian Umum', 'Pelaksana', '0', 'dafidxxx@gmail.com', '2017-11-21 05:51:20', '0'),
	(4, 'Susi Pujiana', '198508252006021003', 'Seksi Perbendaharaan', 'Kepala Seksi', '4', 'efid.agustono@gmail.com', '2017-11-15 13:25:48', '0'),
	(5, 'Intan Nuraini', '198508252006021004', 'Kepala Kantor', 'Kepala Kantor', '3', 'dafid@jalanhidup.com', '2017-11-15 09:47:17', '0'),
	(6, 'Sigit Wicaksono', '198508252006021005', 'Seksi Verifikasi dan Akuntansi', 'Kepala Seksi', '4', 'blogiouss@gmail.com', '2017-11-15 09:47:13', '0'),
	(7, 'Susi Susanti', '198508252006021006', 'Seksi Bank Giro Pos', 'Kepala Seksi', '4', 'blogiouss@gmail.com', '2017-11-15 13:25:40', '0'),
	(8, 'Dedi Kurnawan', '198508252006021007', 'Sub Bagian Umum', 'Kasubbag Umum', '4', 'dafidxxx@gmail.com', '2017-11-15 13:25:57', '0'),
	(9, 'Fathir Hidayat', '198508252006021008', 'Sub Bagian Umum', 'Pelaksana', '0', 'efiddag@gmail.com', '2017-11-24 11:25:47', '0'),
	(10, 'Eko Sudono', '198508252006021009', 'Sub Bagian Umum', 'Pelaksana', '0', 'mustikaweb@gmail.com', '2017-11-24 11:24:49', '0'),
	(11, 'Vera Zunawati', '198508252006021010', 'Seksi Verifikasi dan Akuntansi', 'Pelaksana', '0', 'efid.agustono@gmail.com', '2017-11-15 09:47:11', '0'),
	(12, 'Nurkholis', '1231243132131', 'Sub Bagian Umum', 'Pelaksana', '0', 'nur@asdas.co', '2017-11-21 06:01:03', '0'),
	(13, 'Nur Jamil', '198123231321', 'Sub Bagian Umum', 'Pelaksana', '0', 'efid.agustono@gmail.com', '2017-11-24 11:21:38', '0');
/*!40000 ALTER TABLE `t_pegawai` ENABLE KEYS */;


# Dumping structure for table asamurat.t_seksi
CREATE TABLE IF NOT EXISTS `t_seksi` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `kd_seksi` varchar(15) NOT NULL,
  `nm_seksi` varchar(75) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

# Dumping data for table asamurat.t_seksi: ~4 rows (approximately)
/*!40000 ALTER TABLE `t_seksi` DISABLE KEYS */;
INSERT INTO `t_seksi` (`id`, `kd_seksi`, `nm_seksi`) VALUES
	(1, '1', 'Sub Bagian Umum'),
	(2, '2', 'Seksi Perbendaharaan'),
	(3, '3', 'Seksi Verifikasi dan Akuntansi'),
	(4, '4', 'Seksi Bank Giro Pos'),
	(5, '0', '-');
/*!40000 ALTER TABLE `t_seksi` ENABLE KEYS */;


# Dumping structure for table asamurat.t_surat_keluar
CREATE TABLE IF NOT EXISTS `t_surat_keluar` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `kode` varchar(20) NOT NULL,
  `no_surat1` varchar(7) NOT NULL,
  `no_surat2` varchar(100) NOT NULL,
  `isi_ringkas` mediumtext NOT NULL,
  `tujuan` varchar(250) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_catat` date NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `file` varchar(200) NOT NULL,
  `seksi` varchar(200) NOT NULL,
  `nip` varchar(200) NOT NULL,
  `pengolah` int(11) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

# Dumping data for table asamurat.t_surat_keluar: ~9 rows (approximately)
/*!40000 ALTER TABLE `t_surat_keluar` DISABLE KEYS */;
INSERT INTO `t_surat_keluar` (`id`, `kode`, `no_surat1`, `no_surat2`, `isi_ringkas`, `tujuan`, `tgl_surat`, `tgl_catat`, `keterangan`, `file`, `seksi`, `nip`, `pengolah`, `deleted`, `created_date`) VALUES
	(1, '12', '0001', 'WPB.15/KP.01/2017', 'Permintaan data masjid bersejarah di Kota Yogyakarta', 'Kantor Kemenag Kota Yogyakartas', '2017-01-24', '2017-01-24', '', '', 'Seksi Perbendaharaan', '', 1, 0, '2017-11-02 20:38:24'),
	(2, '12', '0002', 'WPB.15/KP.01/2017', 'Undangan Sosialisasi Aplikasi SAS', 'KPPN Padang', '2017-02-01', '2017-02-01', 'Kunjungan Kerja', 'tahap1.jpg', 'Sub Bagian Umum', '', 2, 0, '2017-11-02 20:38:24'),
	(3, '11', '0003', 'WPB.15/KP.01/2017', 'Surat Tugas Pemantauan Dana Desa', 'Kandepag', '2017-02-01', '2017-02-01', 'Kunjungan Kerja', 'tahap1.jpg', 'Sub Bagian Umum', '198508252006021011', 2, 0, '2017-11-02 20:38:24'),
	(4, '12', '0004', 'WPB.15/KP.01/2017', 'Pemberitahuan Pemanfaatan Fasilitas', 'Kandepag', '2017-02-01', '2017-02-01', 'Kunjungan Kerja', 'tahap1.jpg', 'Sub Bagian Umum', '', 2, 0, '2017-11-02 20:38:24'),
	(5, '12', '0005', 'WPB.15/KP.01/2017', 'Surat Tugas Pemantauan Proyek', 'PT A', '2017-03-02', '2017-03-02', '', '', 'Seksi Bank Giro Pos', '', 2, 0, '0000-00-00 00:00:00'),
	(6, '11', '0006', 'WPB.15/KP.01/2017', 'Undangan Sosialisasi Aplikasi OMSPAN', 'Dinas Pariwisata DIY', '2017-03-01', '2017-03-01', '', 'favicon1.png', 'Seksi Verifikasi dan Akuntansi', '', 2, 0, '0000-00-00 00:00:00'),
	(7, '12', '0007', 'WPB.15/KP.01/2017', 'Penyampaian langkah-langkah akhir tahun', 'Dinas PAriwisata Jakarta', '2017-04-02', '2017-04-02', '', 'tahap1v1.jpg', 'Seksi Bank Giro Pos', '', 2, 0, '0000-00-00 00:00:00'),
	(8, '11', '0008', 'WPB.15/KP.01/2017', 'sdfsdf', 'Dinas Pariwisata DI Yogyakarta', '2017-04-07', '2017-04-07', 'd', '', 'Sub Bagian Umum', '198508252006021011', 10, 0, '2017-11-07 11:03:38'),
	(9, '11', '0009', 'WPB.15/KP.01/2017', 'sadas', 'Dinas Pariwisata DI Yogyakarta', '2017-04-07', '2017-04-07', 'asdas', '', 'Sub Bagian Umum', '198508252006021011', 10, 0, '2017-11-07 11:11:58'),
	(10, '12', '0010', 'WPB.15/KP.01/2017', 'Permintaan Penataan Jaringan', 'Kantor Pusat DJPBN', '2017-05-05', '2017-05-05', '', 'tahap11.jpg', 'Sub Bagian Umum', '198508252006021008', 10, 0, '2017-11-07 16:24:53'),
	(11, '12', '0011', 'WPB.15/KP.01/2017', 'Permintaan Penataan Jaringan', 'Kantor Pusat DJPBN', '2017-05-05', '2017-05-05', '', 'tahap11.jpg', 'Sub Bagian Umum', '198508252006021008', 10, 0, '2017-11-07 16:24:53'),
	(12, '12', '0012', 'WPB.15/KP.01/2017', 'Permintaan Penataan Jaringan', 'Kantor Pusat DJPBN', '2017-04-05', '2017-04-05', '', 'tahap11.jpg', 'Sub Bagian Umum', '198508252006021008', 10, 0, '2017-11-07 16:24:53'),
	(13, '12', '0013', 'WPB.15/KP.01/2017', 'Permintaan Penataan Jaringan', 'Kantor Pusat DJPBN', '2017-06-05', '2017-06-05', '', 'tahap11.jpg', 'Sub Bagian Umum', '198508252006021008', 10, 0, '2017-11-07 16:24:53'),
	(14, '12', '0014', 'WPB.15/KP.01/2017', 'Permintaan Penataan Jaringan', 'Kantor Pusat DJPBN', '2017-06-05', '2017-06-05', '', 'tahap11.jpg', 'Sub Bagian Umum', '198508252006021008', 10, 0, '2017-11-07 16:24:53'),
	(15, '12', '0015', 'WPB.15/KP.01/2017', 'Permintaan Penataan Jaringan', 'Kantor Pusat DJPBN', '2017-06-05', '2017-06-05', '', 'tahap11.jpg', 'Sub Bagian Umum', '198508252006021008', 10, 0, '2017-11-07 16:24:53'),
	(16, '12', '0016', 'WPB.15/KP.01/2017', 'Permintaan Penataan Jaringan', 'Kantor Pusat DJPBN', '2017-07-05', '2017-07-05', '', 'tahap11.jpg', 'Sub Bagian Umum', '198508252006021008', 10, 0, '2017-11-07 16:24:53'),
	(17, '12', '0017', 'WPB.15/KP.01/2017', 'Permintaan Penataan Jaringan', 'Kantor Pusat DJPBN', '2017-07-05', '2017-07-05', '', 'tahap11.jpg', 'Sub Bagian Umum', '198508252006021008', 10, 0, '2017-11-07 16:24:53'),
	(18, '12', '0018', 'WPB.15/KP.01/2017', 'Permintaan Penataan Jaringan', 'Kantor Pusat DJPBN', '2017-08-05', '2017-08-05', '', 'tahap11.jpg', 'Sub Bagian Umum', '198508252006021008', 10, 0, '2017-11-07 16:24:53'),
	(19, '12', '0019', 'WPB.15/KP.01/2017', 'Permintaan Penataan Jaringan', 'Kantor Pusat DJPBN', '2017-08-05', '2017-08-05', '', 'tahap11.jpg', 'Sub Bagian Umum', '198508252006021008', 10, 0, '2017-11-07 16:24:53'),
	(20, '12', '0020', 'WPB.15/KP.01/2017', 'Permintaan Penataan Jaringan', 'Kantor Pusat DJPBN', '2017-09-05', '2017-09-05', '', 'tahap11.jpg', 'Sub Bagian Umum', '198508252006021008', 10, 0, '2017-11-07 16:24:53'),
	(21, '12', '0021', 'WPB.15/KP.01/2017', 'Laporan bulanan', 'Dinas Pariwisata Manna', '2017-11-22', '2017-11-22', '', 'tahap1v2.jpg', 'Sub Bagian Umum', '198508252006021001', 11, 0, '2017-11-22 10:43:17'),
	(22, '12', '0022', 'WPB.15/KP.01/2017', 'Permintaan Penataan Jaringan', 'Kantor Pusat DJPBN', '2017-09-05', '2017-09-05', '', 'tahap11.jpg', 'Sub Bagian Umum', '198508252006021008', 10, 0, '2017-11-07 16:24:53'),
	(23, '12', '0023', 'WPB.15/KP.01/2017', 'Permintaan Penataan Jaringan', 'Kantor Pusat DJPBN', '2017-10-05', '2017-10-05', '', 'tahap11.jpg', 'Sub Bagian Umum', '198508252006021008', 10, 0, '2017-11-07 16:24:53'),
	(24, '12', '0024', 'WPB.15/KP.01/2017', 'Permintaan Penataan Jaringan', 'Kantor Pusat DJPBN', '2017-10-05', '2017-10-05', '', 'tahap11.jpg', 'Sub Bagian Umum', '198508252006021008', 10, 0, '2017-11-07 16:24:53'),
	(25, '12', '0025', 'WPB.15/KP.01/2017', 'Permintaan Penataan Jaringan', 'Kantor Pusat DJPBN', '2017-11-05', '2017-11-05', '', 'tahap11.jpg', 'Sub Bagian Umum', '198508252006021008', 10, 0, '2017-11-07 16:24:53'),
	(26, '12', '0026', 'WPB.15/KP.01/2017', 'Permintaan Penataan Jaringan', 'Kantor Pusat DJPBN', '2017-11-05', '2017-11-05', '', 'tahap11.jpg', 'Sub Bagian Umum', '198508252006021008', 10, 0, '2017-11-07 16:24:53'),
	(27, '12', '0027', 'WPB.15/KP.01/2017', 'Permintaan Penataan Jaringan', 'Kantor Pusat DJPBN', '2017-11-05', '2017-11-05', '', 'tahap11.jpg', 'Sub Bagian Umum', '198508252006021008', 10, 0, '2017-11-07 16:24:53');
/*!40000 ALTER TABLE `t_surat_keluar` ENABLE KEYS */;


# Dumping structure for table asamurat.t_surat_masuk
CREATE TABLE IF NOT EXISTS `t_surat_masuk` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) NOT NULL,
  `no_agenda` varchar(100) NOT NULL,
  `indek_berkas` varchar(100) NOT NULL,
  `isi_ringkas` mediumtext NOT NULL,
  `dari` varchar(250) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_diterima` date NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `file` varchar(200) NOT NULL,
  `pengolah` int(4) NOT NULL,
  `deleted` int(4) NOT NULL DEFAULT '0',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

# Dumping data for table asamurat.t_surat_masuk: ~23 rows (approximately)
/*!40000 ALTER TABLE `t_surat_masuk` DISABLE KEYS */;
INSERT INTO `t_surat_masuk` (`id`, `kode`, `no_agenda`, `indek_berkas`, `isi_ringkas`, `dari`, `no_surat`, `tgl_surat`, `tgl_diterima`, `keterangan`, `file`, `pengolah`, `deleted`, `create_date`) VALUES
	(1, '11', '	0001', 'data', 'Permintaan data kunjungan wisatawan semester 1 tahun 2015', 'Dinas Pariwisata DIY', 'Par/HM.01/100/2015', '2017-01-22', '2017-01-22', '', 'Tes_Upload_file1.docx', 1, 0, '2017-11-02 20:57:11'),
	(2, '12', '	0002', 'mmm', 'Permintaan Data Penyaluran', 'Dinas Pariwisata DIY', 'S-004/PB.15/2017', '2017-01-03', '2017-01-03', '', 'tahap1v.jpg', 2, 0, '2017-11-02 20:57:11'),
	(3, '13', '	0003', '', 'Penawaran barang', 'Dinas Tenaga Kerja Manna', '112/2017', '2017-01-01', '2017-01-01', '', 'banner.jpg', 2, 0, '2017-11-02 20:57:11'),
	(4, '14', '	0004', '', 'Permintaan Nara Sumber', 'Dinas Pariwisata DI Yogyakarta', '112/2017', '2017-02-01', '2017-02-01', '', 'banner.jpg', 2, 0, '2017-11-02 20:57:11'),
	(5, '14', '	0005', '', 'Undangan Diklat', 'Dinas PAriwisata Jakarta', '112/PM/2017', '2017-02-01', '2017-02-01', '', 'box1.jpg', 2, 0, '2017-11-02 20:57:11'),
	(6, '12', '	0006', '12312', 'Permintaan data kunjungan wisatawan semester 1 tahun 2015', 'Dinas PAriwisata Jakarta', 'Par/HM.01/100/2015', '2017-02-01', '2017-02-01', '', 'favicon2.png', 2, 0, '0000-00-00 00:00:00'),
	(7, '12', '	0007', 'a', 'Permintaan Nara Sumber', 'Dinas Tenaga Kerja Manna', 'S-004/PB.15/2017', '2017-02-01', '2017-02-01', 'surat undangan', 'box11.jpg', 2, 0, '0000-00-00 00:00:00'),
	(8, '14', '	0008', '12', 'Permintaan Data Penyaluran', 'Dinas Pariwisata DI Yogyakarta', 'Par/HM.01/100/2015', '2017-03-03', '2017-03-03', '', 'tahap1.jpg', 2, 0, '0000-00-00 00:00:00'),
	(10, '12', '0009', '', 'Surat Undangan Diklat', 'Dinas PAriwisata Jakarta', 'S-001/PB.15/2017', '2017-03-04', '2017-03-04', '', 'cc_danamon.pdf', 2, 0, '0000-00-00 00:00:00'),
	(11, '13', '0010', '', 'Permintaan Nara Sumber', 'Kantor Pariwisata', 'S-002/PB.15/2017', '2017-04-02', '2017-04-02', '', 'tahap11.jpg', 2, 0, '0000-00-00 00:00:00'),
	(12, '12', '0011', '', 'Permintaan Data Penyaluran', 'Dinas Pariwisata DIY', '119/PB.02/2017', '2017-04-02', '2017-04-02', '', 'tahap1v1.jpg', 2, 0, '0000-00-00 00:00:00'),
	(13, '11', '0012', '', 'Permintaan Nara Sumber', 'Dinas Pariwisata DI Yogyakarta', 'S-004/PB.15/2017', '2017-04-03', '2017-04-03', '', 'tahap13.jpg', 2, 0, '0000-00-00 00:00:00'),
	(14, '11', '0013', '', 'Surat Permintaan Nara Sumber Pelatihan Aplikasi', 'Dinas Pariwisata DIY', '119/PB.02/2017', '2017-05-02', '2017-05-02', '', 'tahap1v2.jpg', 2, 0, '0000-00-00 00:00:00'),
	(15, '15', '0014', '', 'Permintaan Nara Sumber', 'Dinas Tenaga Kerja Manna', '119/PB.02/2017', '2017-05-03', '2017-05-03', '', 'tahap1v3.jpg', 2, 0, '0000-00-00 00:00:00'),
	(16, '12', '0015', '', 'Pemberitahuan Maintenance OMSPAN', 'Kantor Pusat Dirjen Perbendaharaan', 'S-001/WPB.15/2017', '2017-06-05', '2017-06-05', '', 'cc_danamon2.pdf', 2, 0, '0000-00-00 00:00:00'),
	(18, '13', '0016', '', 'Permintaan Data Penyaluran', 'Dinas PAriwisata Jakarta', '119/PB.02/2017', '2017-06-08', '2017-06-08', '', 'tahap16.jpg', 2, 0, '0000-00-00 00:00:00'),
	(19, '11', '0017', '', 'Permintaan Data Penyaluran', 'Dinas PAriwisata Jakarta', 'S-012/PB.15/2017', '2017-06-14', '2017-06-14', '', 'tahap1v4.jpg', 2, 0, '0000-00-00 00:00:00'),
	(20, '11', '0018', '', 'Undangan Sosialisasi', 'KPP Padang', 'S1/21312/2017', '2017-07-13', '2017-07-14', '', 'tahap17.jpg', 2, 0, '0000-00-00 00:00:00'),
	(26, '12', '0019', '', 'Pemberitahuan Program', 'Dinas PAriwisata Jakarta Pusat', 'S-012/PB.15/2017', '2017-07-14', '2017-07-14', '', 'tahap18.jpg', 2, 0, '0000-00-00 00:00:00'),
	(27, '11', '0020', '', 'Permintaan Data Penyaluran', 'Dinas PAriwisata Jakarta', 'wweew', '2017-07-14', '2017-07-14', '', 'tahap19.jpg', 2, 0, '0000-00-00 00:00:00'),
	(28, '12', '0021', '', 'Permasalahan aplikasi', 'Dinas Tenaga Kerja Manna', 'S-0123/PB.15/2017', '2017-08-14', '2017-08-14', '', 'tahap110.jpg', 2, 0, '0000-00-00 00:00:00'),
	(29, '15', '0022', '', 'Undangan rapat', 'Kantor Pariwisata', 'S-01234/PB.15/2017', '2017-08-14', '2017-08-14', '', 'tahap111.jpg', 2, 0, '0000-00-00 00:00:00'),
	(30, '13', '0023', '', 'Permintaan Data Penyaluran', 'Dinas Tenaga Kerja Manna', 'S1/21312/2017', '2017-09-14', '2017-09-14', '', 'tahap112.jpg', 2, 0, '0000-00-00 00:00:00'),
	(31, '12', '0024', '', 'Permintaan nara Sumber aplikasi SAS', 'KPP Pratama Padang', 'S-0123/PB.15/2017', '2017-09-13', '2017-09-14', '', 'tahap1v5.jpg', 2, 0, '0000-00-00 00:00:00'),
	(32, '15', '0025', '', 'Undangan Rapat', 'KPP Pratama Manna', '112/PB.2/2017', '2017-10-13', '2017-10-13', '', 'tahap113.jpg', 2, 0, '0000-00-00 00:00:00'),
	(33, '15', '0026', '', 'Undangan Rapat Teknis', 'Dinas Tenaga Kerja Manna', 'S0213/2017', '2017-11-20', '2017-11-21', '', 'tahap1v6.jpg', 2, 0, '0000-00-00 00:00:00'),
	(34, '12', '0027', '', 'Permintaan Data Penyaluran', 'Kantor Pariwisata Manna', 'S-0123/PB.15/2017', '2017-11-21', '2017-11-21', '', 'tahap114.jpg', 2, 0, '0000-00-00 00:00:00'),
	(35, '15', '0028', '', 'Permintaan Data Penyaluran', 'Dinas PAriwisata Jakarta Pusat', 'S-012/PB.15/2017', '2017-11-21', '2017-11-21', '', 'tahap1v7.jpg', 2, 0, '0000-00-00 00:00:00'),
	(36, '12', '0029', '', 'Permintaan data laporan penyaluran dana desa', 'Kantor Pusat Ditjen perbendaharaan ', 'S-02/PB.2/2017', '2017-11-23', '2017-11-24', '', 'tahap115.jpg', 2, 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `t_surat_masuk` ENABLE KEYS */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
