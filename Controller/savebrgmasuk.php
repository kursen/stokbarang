<?php
require("../Model/session.php");
require("../Model/config.php");
$no_transaksi = $_POST['no_transaksi'];
$kodebrg = $_POST['kode_barang'];
$tgl = $_POST['tanggal_penerimaan'];
$harga = $_POST['harga_satuan'];
$jumlah = $_POST['jumlah'];
$penerima = $_POST['penerima'];
$query='';
if($no_transaksi==0){
	$query = "insert into penerimaan_barang(kode_barang,tanggal_penerimaan,harga_satuan,jumlah,penerima) values ('$kodebrg','$tgl','$harga','$jumlah','$penerima')";
}else{
	$query="update penerimaan_barang set kode_barang='$kodebrg',
	tanggal_penerimaan='$tgl',
	harga_satuan='$harga',
	jumlah='$jumlah',
	penerima ='$penerima'
	where no_transaksi=$no_transaksi";
}
$action = mysqli_query($connection,$query);
if($action){
	print "<script>
	var conf=confirm('Data Berhasil Disimpan!');
	if(conf==true){
		document.location.href='../View/brgmasuk.php';
	}
	</script>";
}
?>