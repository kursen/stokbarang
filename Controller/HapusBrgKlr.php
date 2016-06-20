<?php
require("../Model/session.php");
//cek dahulu, apakah benar URL sudah ada GET id -> hapus.php?id=siswa_id
if(isset($_GET['id'])){
require("../Model/config.php");
//membuat variabel $id yg bernilai dari URL GET id -> hapus.php?id=siswa_id
$id = $_GET['id'];
//cek ke database apakah ada data siswa dengan siswa_id='$id'
$del = mysqli_query($connection,"DELETE FROM penjualan_barang WHERE no_transaksipenjualan=$id");
if($del){
	print "<script>
	var conf=confirm('Data Berhasil Dihapus!');
	if(conf==true){
		document.location.href='../View/brgkeluar.php';
	}
	</script>";
}
}
?>