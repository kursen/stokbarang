<?php
require("../Model/session.php");
require("../Model/config.php");
$notransaksi = $_POST['no_transaksi'];
$kodebrg = $_POST['kode_barang'];
$tgl = $_POST['tanggal_penjualan'];
$harga = $_POST['harga_penjualan'];
$jumlah = $_POST['jumlah'];
$pelanggan = $_POST['pelanggan'];
$query='';
if($notransaksi==0){
	$query = "insert into penjualan_barang(kode_barang,harga_penjualan,tanggal_penjualan,jumlah,pelanggan) values ('$kodebrg','$harga','$tgl','$jumlah','$pelanggan')";
}else{
	$query="update penjualan_barang set kode_barang='$kodebrg',
	tanggal_penjualan='$tgl',
	harga_penjualan='$harga',
	jumlah='$jumlah',
	pelanggan ='$pelanggan'
	where no_transaksipenjualan=$notransaksi";
}
$action = mysqli_query($connection,$query);
if($action){
	print "<script>
	var conf=confirm('Data Berhasil Disimpan!');
	if(conf==true){
		document.location.href='../View/brgkeluar.php';
	}
	</script>";
}
?>