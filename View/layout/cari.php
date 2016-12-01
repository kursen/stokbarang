<?php
if(isset($_POST['search')){
	$cari = $_POST['search'];
	require '../Model/config.php';
	$querysearch="select masterbarang.kode_barang,masterbarang.nama_barang,ifnull(penerimaan_barang.jumlah,0) as jumlahmasuk,ifnull(penjualan_barang.jumlah,0) as jumlahkeluar,
ifnull(retur_barang.jumlah_retur,0) as jumlahretur,ifnull(ifnull(penerimaan_barang.jumlah,0)-ifnull(penjualan_barang.jumlah,0),0) as saldo from masterbarang left join 
penerimaan_barang on 
masterbarang.kode_barang = penerimaan_barang.kode_barang 
left join penjualan_barang on masterbarang.kode_barang = penjualan_barang.kode_barang 
left join retur_barang on masterbarang.kode_barang = retur_barang.kode_barang where masterbarang.nama_barang like '%$cari%'";

$execute = mysqli_query($connection,$querysearch);
$data=array();

if(!$execute){
	
}else{
	print mysqli_error($connection);
}

}else{
	print "Data Kosong";
}