/*
MySQL Backup
Source Server Version: 5.5.5
Source Database: stokbarang
Date: 6/26/2016 14:14:56
*/


-- ----------------------------
--  Table structure for `masterbarang`
-- ----------------------------
DROP TABLE IF EXISTS `masterbarang`;
CREATE TABLE `masterbarang` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `satuan` varchar(50) DEFAULT 'buah',
  `keterangan` text,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `penerimaan_barang`
-- ----------------------------
DROP TABLE IF EXISTS `penerimaan_barang`;
CREATE TABLE `penerimaan_barang` (
  `no_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `penerima` varchar(50) NOT NULL DEFAULT 'Kosong',
  `kode_barang` varchar(5) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `tanggal_penerimaan` datetime NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`no_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `penjualan_barang`
-- ----------------------------
DROP TABLE IF EXISTS `penjualan_barang`;
CREATE TABLE `penjualan_barang` (
  `no_transaksipenjualan` int(11) NOT NULL AUTO_INCREMENT,
  `pelanggan` varchar(50) NOT NULL DEFAULT 'Kosong',
  `kode_barang` varchar(5) NOT NULL,
  `harga_penjualan` int(11) NOT NULL,
  `tanggal_penjualan` datetime NOT NULL,
  `jumlah` int(11) NOT NULL,
  `costumer` varchar(50) NOT NULL DEFAULT 'Kosong',
  PRIMARY KEY (`no_transaksipenjualan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `retur_barang`
-- ----------------------------
DROP TABLE IF EXISTS `retur_barang`;
CREATE TABLE `retur_barang` (
  `no_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(255) NOT NULL,
  `penerima` varchar(50) NOT NULL DEFAULT 'Kosong',
  `pelanggan` varchar(50) NOT NULL DEFAULT 'Kosong',
  `harga_satuan` int(11) NOT NULL,
  `tanggal_penjualan` datetime NOT NULL,
  `jumlah_stoklama` int(11) NOT NULL,
  `jumlah_retur` int(11) NOT NULL,
  `jumlah_stokbaru` int(11) NOT NULL,
  `keterangan` text,
  PRIMARY KEY (`no_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `test`
-- ----------------------------
DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  ` Id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `nilai` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (` Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `user_login`
-- ----------------------------
DROP TABLE IF EXISTS `user_login`;
CREATE TABLE `user_login` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `masterbarang` VALUES ('2','100cy','charger hape','buah','test'),  ('3','bb100','casing black berry','buah','test'),  ('4','ko100','kondom hape','buah','kodomm hape\r\n'),  ('5','a1002','antigores','buah','antigores laptop');
INSERT INTO `penerimaan_barang` VALUES ('1','Kosong','100cy','10000','2016-08-09 00:00:00','10'),  ('2','Kosong','bb100','12000','2016-08-09 00:00:00','15'),  ('3','Kosong','ko100','8000','2016-08-09 00:00:00','30'),  ('4','wahyu','a1002','40000','2016-06-27 00:00:00','10');
INSERT INTO `penjualan_barang` VALUES ('2','Kosong','ko100','9000','2016-05-25 00:00:00','7','Kosong'),  ('3','toko testing','100cy','20000','2016-06-26 00:00:00','2','toko testing'),  ('4','Kosong','a1002','50000','2016-06-29 00:00:00','6','toko nanang');
INSERT INTO `test` VALUES ('1','basri','12'),  ('2','nurul','10'),  ('3','bowo','33'),  ('4','basri','32'),  ('5','joko','45'),  ('6','basri','55');
INSERT INTO `user_login` VALUES ('1','admin','admin','administrator');
