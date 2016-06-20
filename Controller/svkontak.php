<?php
require("../Model/config.php");
$nama = $_POST['nama'];
$namaperu = $_POST['namaperu'];
$alamat = $_POST['alamat'];
$notelp = $_POST['notel'];
$email = $_POST['email'];
$remarks = $_POST['remarks'];

$query = "insert into kontak(nama,namaperu,alamat,notel,email,remarks) values ('$nama','$namaperu','$alamat','$notelp','$email','$remarks')";
$action = mysql_query($query) or Die("Gagal Menginput Data". mysql_error());
if($action){
	print "<script type='text/javascript'>alert('Kontak Berhasil Diikirim');</script";
		header("location:../Kontak.html");
}
?>