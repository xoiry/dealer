-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 02. Januari 2006 jam 10:17
-- Versi Server: 5.1.30
-- Versi PHP: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dealer`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bayar_cicil`
--

CREATE TABLE IF NOT EXISTS `bayar_cicil` (
  `no_bayar` varchar(5) NOT NULL,
  `tgl` date NOT NULL,
  `kd_kredit` varchar(5) NOT NULL,
  `angsuranke` int(4) NOT NULL,
  `jml_cicil` varchar(9) NOT NULL,
  `ket.` varchar(15) NOT NULL,
  PRIMARY KEY (`no_bayar`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bayar_cicil`
--

INSERT INTO `bayar_cicil` (`no_bayar`, `tgl`, `kd_kredit`, `angsuranke`, `jml_cicil`, `ket.`) VALUES
('2', '2012-02-15', 'k003', 1, '840000', '1'),
('1', '2012-02-15', 'k001', 1, '1443750', '1'),
('245', '2012-02-15', 'k001', 2, '1443750', '2'),
('b001', '2012-02-15', 'k002', 1, '990000', '1'),
('b002', '2012-02-15', 'k002', 2, '990000', '2'),
('b003', '2012-02-15', 'k002', 3, '990000', '3'),
('b004', '2012-02-15', 'k002', 4, '990000', '4'),
('b005', '2012-02-15', 'k002', 5, '990000', '5'),
('b006', '2012-02-15', 'k002', 6, '990000', '6'),
('b007', '2012-02-15', 'k002', 7, '990000', '7'),
('b008', '2012-02-15', 'k002', 8, '990000', '8'),
('b009', '2012-02-15', 'k002', 9, '990000', '9'),
('b010', '2012-02-15', 'k002', 10, '990000', '10'),
('b011', '2012-02-15', 'k002', 11, '990000', '11'),
('b012', '2012-02-15', 'k002', 12, '990000', '12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `beli_cash`
--

CREATE TABLE IF NOT EXISTS `beli_cash` (
  `kd_cash` varchar(10) NOT NULL,
  `tgl` varchar(10) NOT NULL,
  `kd_cust` varchar(10) NOT NULL,
  `total_bayar` varchar(10) NOT NULL,
  `ket` varchar(15) NOT NULL,
  PRIMARY KEY (`kd_cash`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `beli_cash`
--

INSERT INTO `beli_cash` (`kd_cash`, `tgl`, `kd_cust`, `total_bayar`, `ket`) VALUES
('c001', '2012-02-10', 'p001', '16.000.000', 'Lunas'),
('c002', '2012-02-11', 'p002', '35.000.000', 'Lunas'),
('c003', '2012-02-12', 'p003', '32.000.000', 'Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `beli_kredit`
--

CREATE TABLE IF NOT EXISTS `beli_kredit` (
  `kd_kredit` varchar(5) NOT NULL,
  `tgl` date NOT NULL,
  `kd_cust` varchar(5) NOT NULL,
  `kd_motor` varchar(5) NOT NULL,
  `lama_cicil` int(11) NOT NULL,
  `uang_muka` int(9) NOT NULL,
  `bunga` int(5) NOT NULL,
  `cicilan` varchar(10) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_kredit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `beli_kredit`
--

INSERT INTO `beli_kredit` (`kd_kredit`, `tgl`, `kd_cust`, `kd_motor`, `lama_cicil`, `uang_muka`, `bunga`, `cicilan`, `keterangan`) VALUES
('k001', '2011-08-26', 'p001', 'm006', 48, 3500000, 30, '1443750', '-'),
('k003', '2012-02-15', 'p003', 'm001', 24, 1600000, 20, '840000', 'Jaminan sertifikat tanah'),
('k002', '2012-02-15', 'p002', 'm002', 12, 1200000, 10, '990000', 'gjhgjh'),
('k004', '2006-01-02', 'p004', 'm005', 12, 1400000, 10, '1155000', 'Jaminan Sertifikat tanah'),
('k005', '2006-01-02', 'p005', 'm006', 48, 3500000, 30, '1443750', 'Jaminan Surat kepemilikan rumah'),
('k006', '2006-01-02', 'p006', 'm001', 24, 1600000, 20, '840000', 'Jaminan BPKB Mobil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `det_cash`
--

CREATE TABLE IF NOT EXISTS `det_cash` (
  `kd_det` int(11) NOT NULL AUTO_INCREMENT,
  `kd_cash` varchar(5) NOT NULL,
  `kd_motor` varchar(5) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  PRIMARY KEY (`kd_det`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=115 ;

--
-- Dumping data untuk tabel `det_cash`
--

INSERT INTO `det_cash` (`kd_det`, `kd_cash`, `kd_motor`, `jumlah`, `sub_total`) VALUES
(114, 'c003', 'm001', 2, 32000000),
(113, 'c002', 'm006', 1, 35000000),
(112, 'c001', 'm001', 1, 16000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `motor`
--

CREATE TABLE IF NOT EXISTS `motor` (
  `kd_motor` varchar(5) NOT NULL,
  `merk` varchar(15) NOT NULL,
  `warna` varchar(10) NOT NULL,
  `harga` int(9) NOT NULL,
  PRIMARY KEY (`kd_motor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `motor`
--

INSERT INTO `motor` (`kd_motor`, `merk`, `warna`, `harga`) VALUES
('m001', 'Supra x 125', 'Hitam', 16000000),
('m002', 'Beat', 'Hitam', 12000000),
('m003', 'Revo', 'biru', 13000000),
('m004', 'Spacy', 'Merah', 13500000),
('m005', 'PCX', 'putih', 14000000),
('m006', 'CBR 150 R', 'Putih mera', 35000000),
('m007', 'CBR 250 R', 'Hitam', 45000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `kd_cust` varchar(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `hp` varchar(12) NOT NULL,
  `no_ktp` varchar(15) NOT NULL,
  `kk` varchar(15) NOT NULL,
  `slp_gaji` varchar(20) NOT NULL,
  `ket` varchar(30) NOT NULL,
  PRIMARY KEY (`kd_cust`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`kd_cust`, `nama`, `alamat`, `telepon`, `hp`, `no_ktp`, `kk`, `slp_gaji`, `ket`) VALUES
('p001', 'Sabrina', 'Sleman', '-', '081904255901', '-', '-', '-', '-'),
('p002', 'Doni', 'Seyegan , Sleman', '-', '085292456156', '745445', '-', '-', '-'),
('p003', 'Khoiri', 'Sleman', '-', '087838718416', '-', '-', '-', '-'),
('p004', 'Fajar', 'Kulonprogo', '-', '085292292564', '-', '-', '-', 'Gaji Rp. 1000.000 per bulan'),
('p005', 'Jamiel', 'Kulonprogo', '-', '087838718456', '-', '-', '-', '-'),
('p006', 'Zainal', 'Wonosari', '-', '085292789256', '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `level` varchar(30) NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user`, `pass`, `level`) VALUES
('', '', 'admin'),
('user', 'useru', 'user');
