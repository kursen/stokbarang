<?php
require("../Model/session.php");
require("../Model/config.php");
$id=$_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$notelp = $_POST['notelp'];
$query='';
if($id=='0'){
	$query = "insert into supplier(nama,alamat,notelp) values ('$nama','$alamat','$notelp')";
}else{
	$query="update supplier set nama='$nama',
	alamat='$alamat',
	notelp='$notelp'
	where kd_supplier=$id";
}
$action = mysql_query($query) or Die("Gagal Menginput Data");
if($action){
	print "<script>document.location.href='../View/supplier.php';</script>";
}
?>