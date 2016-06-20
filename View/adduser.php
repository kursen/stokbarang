<?php
require("../Model/session.php");
require("../Model/config.php");
$Id = $_POST['Id'];
$username = $_POST['username'];
$password = $_POST['password'];
$status = $_POST['status'];
$query='';
if($Id==0){
	$query = "insert into user_login(username,password,status) values ('$username','$password','$status')";
}else{
	$query="update user_login set username='$username',
	password='$password',
	status='$status'
	where Id=$Id";
}
$action = mysqli_query($connection,$query);
if($action){
	print "<script>
	var conf=confirm('Data Berhasil Disimpan!');
	if(conf==true){
		document.location.href='User.php';
	}
	</script>";
}
?>