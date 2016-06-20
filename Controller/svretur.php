<?php
require("../Model/session.php");
require("../Model/config.php");
$no_transaksi = $_POST['no_transaksi'];
$kodebrg = $_POST['kode_barang'];
$tgl = $_POST['tanggal_penjualan'];
$harga = $_POST['harga_satuan'];
$jumlah = $_POST['jumlah'];
$ket = $_POST['keterangan'];
$query='';

/*$checkkodebrang = mysqli_query($connection,"select nullif(jumlah_retur,0) as jumlah_retur from retur_barang where kode_barang='$kodebr'");
$jumlah_retur = mysqli_fetch_assoc($checkkodebrang);*/
//get stok lama
$query_stoklama = mysqli_query($connection,"select (sum(penerimaan_barang.jumlah)-sum(penjualan_barang.jumlah)) as saldo from penerimaan_barang inner join penjualan_barang on penerimaan_barang.kode_barang=penjualan_barang.kode_barang where penerimaan_barang.kode_barang='$kodebrg' group by penerimaan_barang.kode_barang");
$nilai_stoklama = mysqli_fetch_assoc($query_stoklama);
$nilai_stokbaru=$nilai_stoklama['saldo']+$jumlah;
if($no_transaksi==0){
	$query = "insert into retur_barang(kode_barang,harga_satuan,tanggal_penjualan,jumlah_stoklama,jumlah_retur,jumlah_stokbaru,keterangan) values ('$kodebrg','$harga','$tgl','$nilai_stoklama[saldo]','$jumlah','$nilai_stokbaru','$ket')";
}else{
	$query="update retur_barang set	tanggal_penjualan='$tgl',
	harga_satuan='$harga',
	jumlah_stoklama='$nilai_stoklama[saldo]',
	jumlah_retur = '$jumlah',
	jumlah_stokbaru = '$nilai_stokbaru',
	keterangan ='$ket',
	kode_barang = '$kodebrg'
	where no_transaksi=$no_transaksi";
}

$action = mysqli_query($connection,$query);
if($action){
	print "<script>
	var conf=confirm('Data Berhasil Disimpan!');
	if(conf==true){
		document.location.href='../View/barangretur.php';
	}
	</script>";
}
?>