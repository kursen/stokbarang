<?php
require("../Model/session.php");
require("../Model/config.php");
$Id = $_POST['Id'];
$kodebrg = $_POST['kode_barang'];
$namabrg = $_POST['nama_barang'];
$satuan = $_POST['satuan'];
$ket = $_POST['keterangan'];
$query='';
if($Id==0){
	$query = "insert into masterbarang(kode_barang,nama_barang,satuan,keterangan) values ('$kodebrg','$namabrg','$satuan','$ket')";
}else{
	$query="update masterbarang set nama_barang='$namabrg',
	kode_barang='$kodebrg',
	satuan='$satuan',
	keterangan='$ket'
	where Id=$Id";
}
$action = mysqli_query($connection,$query);
if($action){
	print "<script>
	var conf=confirm('Data Berhasil Disimpan!');
	if(conf==true){
		document.location.href='../View/mstbrg.php';
	}
	</script>";
}
?>