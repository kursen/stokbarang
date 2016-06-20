<?php 
require("../Model/session.php");
require("../Model/config.php");
$id=$_GET['id'];
$qry= mysql_query ("delete from kontak where id=$id") or die (mysql_error());

if ($qry)
header ("location:../View/Kontak.php");

?>
