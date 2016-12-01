<?php
require("../Model/session.php");
require("../Model/config.php");
//$notransaksi = $_POST['no_transaksi'];
//array data
$kodebrg = $_POST['kode_barang'];
$harga = $_POST['harga_penjualan'];
$jumlah = $_POST['jumlah'];
//not array data
$tgl = $_POST['tanggal_penjualan'];
$costumer = $_POST['costumer'];
$query='';
for($count=0;$count<count($kodebrg);$count++){
	$query = "insert into penjualan_barang(kode_barang,harga_penjualan,tanggal_penjualan,jumlah,costumer) values ('$kodebrg[$count]','$harga[$count]','$tgl','$jumlah[$count]','$costumer')";
	$action = mysqli_query($connection,$query);
}
if($action){
	print "1";
}
/*
if($notransaksi==0){
	
}else{
	$query="update penjualan_barang set kode_barang='$kodebrg',
	tanggal_penjualan='$tgl',
	harga_penjualan='$harga',
	jumlah='$jumlah',
	pelanggan ='$costumer'
	where no_transaksipenjualan=$notransaksi";
}

if($action){
	print "<script>
	var conf=confirm('Data Berhasil Disimpan!');
	if(conf==true){
		document.location.href='../View/brgkeluar.php';
	}
	</script>";
}*/
?>