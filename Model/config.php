<?php
$hostname ='localhost';//hostname
$dbname ='stokbarang';
$username='root';
$password='';
//koneksi ke database
$connection=mysqli_connect($hostname,$username,$password,$dbname) or DIE('Koneksi ke Server Gagal');
//koneksi ke database
mysqli_select_db($connection,$dbname) or DIE('Database Tidak Tersedia');
?>